<?php

use Helpers\Image;

spl_autoload_register(function($className) {
    $file = __DIR__ . '\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (file_exists($file)) {
        include $file;
    }
});

//header('Content-type: text');

$image = new Image();

$banner = new \Helpers\Model('banners');

$attrubutes = ['ip_address' => 123];

$banner->get($attrubutes);

//$query = $db->query('SELECT * FROM banners
//                            where ip_address = ?
//                            and user_agent = ?
//                            and ')
//    ->numRows();



//var_dump($query);die;

//imagejpeg(imagecreatefromjpeg($image->getUrl()));
