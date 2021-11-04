<?php

use Helpers\Image;
use Helpers\Model;

spl_autoload_register(function ($className) {
    $file = __DIR__ . '\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (file_exists($file)) {
        include $file;
    }
});

header('Content-type: text');

$image = new Image();

$banner = new Model('banners');

$attrubutes = ['ip_address' => 123];

$banner->where('ip_address', '=', $_SERVER['REMOTE_ADDR']);
$banner->where('user_agent', '=', $_SERVER['HTTP_USER_AGENT']);
$banner->where('page_url', '=', $_SERVER['HTTP_REFERER']);

$banner->first();

//var_dump($_SERVER['REQUEST_URI']);die;

if (empty($banner->id)) {
    $banner->ip_address = $_SERVER['REMOTE_ADDR'];
    $banner->user_agent = $_SERVER['HTTP_USER_AGENT'];
    $banner->page_url = $_SERVER['HTTP_REFERER'];
    $banner->views_count = 1;
} else {
    $banner->views_count = $banner->views_count+1;
}

$banner->view_date = date('Y-m-d H:i:s');

$banner->save();

//imagejpeg(imagecreatefromjpeg($image->getUrl()));
