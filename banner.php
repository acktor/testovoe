<?php

use Helpers\Image;

spl_autoload_register(function($className) {
    $file = __DIR__ . '\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (file_exists($file)) {
        include $file;
    }
});

header('Content-type: image/jpeg');

$image = new Image();

imagejpeg(imagecreatefromjpeg($image->getUrl()));
