<?php
spl_autoload_register('autoLoaderClasses');
// spl_autoload_register('autoLoaderModules');
// spl_autoload_register('autoLoaderCtrl');

function autoLoaderClasses($className)
{
    $root = 'classes/';
    $file = str_replace('\\', '/', $className);
    $extension = '.php';
    $fullPath = $root . $file . $extension;

    if (!file_exists($fullPath)) {
        echo 'failed';
        return false;
    }

    include_once $fullPath;
}
