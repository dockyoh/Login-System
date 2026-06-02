<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($myClass)
{
    $path = __DIR__ . '/../classes/';
    $extension = '.class.php';
    $fullPath = $path . $myClass . $extension;

    if (file_exists($fullPath)) {
        require_once $fullPath;
    } else {
        echo 'FILE PATH NOT FOUND!';
    }
}
