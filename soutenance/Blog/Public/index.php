<?php
session_start();
<<<<<<< HEAD
require '../vendor/autoload.php';
=======
require '../src/DAO/Database.php';
require '../Config/autoloader.php';
ini_set('display_errors','off');
App\Config\Autoloader::register();
>>>>>>> a596bdfe9d456a19bea6bd1697febd9872d8696a
$index = new App\Config\Router;
$index->run();
