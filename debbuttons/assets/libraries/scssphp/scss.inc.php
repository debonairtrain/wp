<?php


if (! class_exists('\DebButtons\ScssPhp\ScssPhp\Version')) {
    spl_autoload_register(function ($class) {
        if (0 !== strpos($class, 'DebButtons\ScssPhp\ScssPhp\\')) {
            // Not a ScssPhp class
            return;
        }

        $subClass = substr($class, strlen('DebButtons\ScssPhp\ScssPhp\\'));
        $path = __DIR__ . '/src/' . str_replace('\\', '/', $subClass) . '.php';

        if (file_exists($path)) {
            require $path;
        }
    });
}
