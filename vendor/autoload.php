<?php

// 类的自动加载
function loadClass($className) {
    $classMap = [
        "Zee\base" => __DIR__ . "/base/",
        "app\model" => __DIR__ . "/../app/model/",
    ];

    $parts = explode('\\', $className);
    $class = array_pop($parts);
    $namespace = implode('\\', $parts);

    $filename = '';
    foreach ($classMap as $ns => $dir) {
        if ($ns == $namespace) {
            $filename = $dir . $class . '.php';
        }
    }
    if (file_exists($filename)) {
        require_once $filename;
    }
}

spl_autoload_register('loadClass');

