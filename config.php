<?php

define('PRODUCTS_IMAGE_PATH', '/images/products/');

session_start();

$user = 'root';
$password = '2Jyqfzu1jl';
$pdo = new Pdo('mysql:dbname=fullstack2;host=127.0.0.1', $user, $password);

$page = $_SERVER['PHP_SELF'];

?>