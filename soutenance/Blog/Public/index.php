<?php
session_start();
require '../src/DAO/Database.php';
require '../Config/autoloader.php';
App\Config\Autoloader::register();
$index = new App\Config\Router;
$index->run();
