#!/usr/bin/env python3

import argparse
import fnmatch
import os
from pathlib import Path
from zipfile import ZIP_DEFLATED, ZipFile


# Files that should never be included.
SYSTEM_FILES = {
    ".DS_Store",
    "Thumbs.db",
    "desktop.ini",
}

# File patterns that should never be included.
SYSTEM_PATTERNS = {
    "._*",
    "*.log",
    "*.tmp",
    "*.swp",
    "*~",
}

# Add project-specific exclusions here.
EXCLUDED_PATHS = {
    ".git",
    ".github",
    ".gitignore",
    ".gitattributes",
    ".idea",
    ".vscode",
    "node_modules",
    "tests",
    "coverage",
    ".env",
    ".env.local",
    "phpunit.xml",
    "phpunit.xml.dist",
    "package-lock.json",
    "yarn.lock",
    "composer.lock",
    "README.md",
    "home-seed",
    "training-packages-seed",
    "html-seed"
}


def matches_pattern(name: str, patterns: set[str]) -> bool:
    """Return True when a filename matches any excluded pattern."""
    return any(fnmatch.fnmatch(name, pattern) for pattern in patterns)


def should_exclude(relative_path: Path, output_zip: Path) -> bool:
    """Determine whether a file or directory should be excluded."""

    # Exclude the output ZIP if it is created inside the plugin directory.
    try:
        if relative_path.resolve() == output_zip.resolve():
            return True
    except OSError:
        pass

    # Check every component so that everything inside an excluded folder
    # is also excluded.
    for part in relative_path.parts:
        if part in SYSTEM_FILES:
            return True

        if part in EXCLUDED_PATHS:
            return True

        if matches_pattern(part, SYSTEM_PATTERNS):
            return True

    # Supports explicit relative paths such as:
    # "resources/source", "assets/src/app.js", etc.
    relative_string = relative_path.as_posix()

    for excluded_path in EXCLUDED_PATHS:
        if relative_string == excluded_path:
            return True

        if relative_string.startswith(f"{excluded_path}/"):
            return True

    return False


def create_plugin_zip(plugin_directory: Path, output_zip: Path) -> None:
    """Create a production ZIP package for a WordPress plugin."""

    plugin_directory = plugin_directory.resolve()
    output_zip = output_zip.resolve()

    if not plugin_directory.exists():
        raise FileNotFoundError(
            f"Plugin directory does not exist: {plugin_directory}"
        )

    if not plugin_directory.is_dir():
        raise NotADirectoryError(
            f"Plugin path is not a directory: {plugin_directory}"
        )

    output_zip.parent.mkdir(parents=True, exist_ok=True)

    included_files = 0
    excluded_items = 0

    with ZipFile(output_zip, "w", compression=ZIP_DEFLATED) as zip_file:
        for root, directories, files in os.walk(plugin_directory):
            root_path = Path(root)

            # Prevent os.walk from entering excluded directories.
            allowed_directories = []

            for directory_name in directories:
                directory_path = root_path / directory_name
                relative_path = directory_path.relative_to(plugin_directory)

                if should_exclude(relative_path, output_zip):
                    excluded_items += 1
                    print(f"Excluded directory: {relative_path}")
                else:
                    allowed_directories.append(directory_name)

            directories[:] = allowed_directories

            for filename in files:
                source_path = root_path / filename
                relative_path = source_path.relative_to(plugin_directory)

                if should_exclude(relative_path, output_zip):
                    excluded_items += 1
                    print(f"Excluded file:      {relative_path}")
                    continue

                # Include the plugin root directory in the ZIP.
                archive_path = Path(plugin_directory.name) / relative_path

                zip_file.write(source_path, archive_path)
                included_files += 1
                print(f"Added:              {archive_path}")

    print()
    print(f"ZIP created: {output_zip}")
    print(f"Included files: {included_files}")
    print(f"Excluded items: {excluded_items}")


def parse_arguments() -> argparse.Namespace:
    parser = argparse.ArgumentParser(
        description="Create a clean ZIP package for a WordPress plugin."
    )

    parser.add_argument(
        "plugin_directory",
        type=Path,
        help="Path to the WordPress plugin directory.",
    )

    parser.add_argument(
        "-o",
        "--output",
        type=Path,
        help="Output ZIP path. Defaults to <plugin-name>.zip.",
    )

    return parser.parse_args()


def main() -> None:
    args = parse_arguments()

    plugin_directory = args.plugin_directory.expanduser()

    output_zip = (
        args.output.expanduser()
        if args.output
        else Path.cwd() / f"{plugin_directory.name}.zip"
    )

    try:
        create_plugin_zip(plugin_directory, output_zip)
    except (FileNotFoundError, NotADirectoryError, PermissionError) as error:
        raise SystemExit(f"Error: {error}") from error


if __name__ == "__main__":
    main()