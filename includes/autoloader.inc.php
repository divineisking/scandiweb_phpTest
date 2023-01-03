<?php
spl_autoload_register('autoLoaderConnections');
// spl_autoload_register('autoLoaderModules');
// spl_autoload_register('autoLoaderCtrl');

function autoLoaderConnections($className)
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

// function autoLoaderModules($className)
// {
//     $path = 'classes/ctrl/';
//     $extension = '.php';
//     $fullPath = $path . $className . $extension;

//     if (!file_exists($fullPath)) {
//         return false;
//     }

//     include_once $fullPath;
// }

// function autoLoaderCtrl($className)
// {
//     $path = 'classes/modules/';
//     $extension = '.php';
//     $fullPath = $path . $className . $extension;

//     if (!file_exists($fullPath)) {
//         return false;
//     }

//     include_once $fullPath;
// }
