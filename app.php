<?php

use Database\PDODatabase;

mb_internal_encoding('UTF-8');

mb_http_output('UTF-8');


session_start(['cookie_httponly' => true]);

//Load all the classes
spl_autoload_register(function($class) {
   
    require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';  
});


// Signleton
$conn = PDODatabase::getInstance();
$db = $conn->getConnection();

$app = new \Core\Application();

define('DIR', '/');
define('DIRADMIN', '/admin/');
define('DIRADMINPANEL', '/admin_panel/');

define('DIRPUBLIC', '/public/');
define('DIRHEADIMG', '/public/uploads/head_image/');
define('DIRPROFILEIMAGES', '/public/uploads/profile_image/');
define('DIRGALLERY', '/public/uploads/gallery/');
define('DIRCARROUSEL', '/public/uploads/img/');
define('DIRCSS', '/public/css/');
define('PROJECTPATH', '/storage/ssd1/397/1921397');
/**
 * Path to Header-Image of the post
 */
define('DIRHEADIMAGE', __DIR__ . '/public/uploads/head_image/');
/**
 * Path to gallery  __DIR__ . '/public/uploads/gallery/'
 */
define('DIRGALLERYIMGS', __DIR__ . '/public/uploads/gallery/');
/**
 * Path to profile images  __DIR__ . '/public/uploads/profile_image/'
 */
define('DIRPROFILEIMG', __DIR__ . '/public/uploads/profile_image/');
