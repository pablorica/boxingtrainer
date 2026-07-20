<?php

if (!class_exists('WP_CLI')) {
    class WP_CLI
    {
        /**
         * @param string $message
         */
        public static function log($message) {}

        /**
         * @param string $message
         */
        public static function success($message) {}

        /**
         * @param string $message
         */
        public static function warning($message) {}

        /**
         * @param string $message
         */
        public static function error($message) {}
    }
}