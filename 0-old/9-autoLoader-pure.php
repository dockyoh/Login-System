<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = __DIR__ . '/../classes/';
    $extension = '-class.php';
    $fullPath = $path . '9-' . $className . $extension;

    if (file_exists($fullPath)) {
        require_once $fullPath;
    } else {
        echo "FILE PATH NOT FOUND! " . $fullPath;
    }
}
