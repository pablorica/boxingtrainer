# Plugin zipper

Here’s a small script that creates a `.zip` package of a WordPress plugin while:

* Removing unwanted system files such as `.DS_Store`.
* Excluding configurable files and folders.
* Keeping the plugin’s root folder inside the ZIP.
* Leaving the original plugin files untouched.
* Skipping the generated ZIP itself.

```text
package-plugin.py
```

### Example usage


Make it executable:

```bash
chmod +x package-plugin.py
```

Then run:

```bash
python3 package-plugin.py /path/to/wp-content/plugins/my-custom-plugin
```

This creates:

```text
my-custom-plugin.zip
```

You can choose the destination and filename with:

```bash
python3 package-plugin.py \
  /path/to/wp-content/plugins/my-custom-plugin \
  --output ./build/my-custom-plugin-1.2.0.zip
```

The ZIP structure will be:

```text
my-custom-plugin/
├── my-custom-plugin.php
├── includes/
├── assets/
└── ...
```

To exclude additional items, add them to `EXCLUDED_PATHS`. Both folder names and paths relative to the plugin directory are supported:

```python
EXCLUDED_PATHS = {
    ".git",
    "node_modules",
    "tests",
    "resources/source",
    "assets/js/development.js",
}
```

The script does not actually delete `.DS_Store` or other files from your working directory; it removes them from the final compressed package, which is generally safer.
