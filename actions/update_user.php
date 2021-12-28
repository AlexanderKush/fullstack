<?php

session_start();

$user = 'root';
$password = '';
$pdo = new Pdo('mysql:dbname=fullstack2;host=127.0.0.1', $user, $password);

$userId =$_POST['id'];
$name =$_POST['name'];
$login =$_POST['login'];

$query = "UPDATE users SET name = :name, login = :login WHERE id = :id";
$res = $pdo->prepare($query);
$status = $res->execute([
    ':id' => $userId,
    ':name' => $name,
    ':login' => $login,
]);

if (!$status) {
    $error = $res->errorInfo();
    $_SESSION['error'] = $error['2'];
} else {
    $_SESSION['good'] = '1';
}

header('Location: ../pages/user.php?id=' . $userId);