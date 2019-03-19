<?php
session_start();
require '../vendor/autoload.php';
$index = new App\Config\Router;
$index->run();
