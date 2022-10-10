<?php
spl_auto_register('autoLoader');

function autoLoader($className) {
    $path = 'classes/';
    $ext = '.class.php';
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath))
    {
        return false;
    }

    include_once $fullPath;
}
?>