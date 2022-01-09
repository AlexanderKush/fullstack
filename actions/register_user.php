<?php

require $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$name = $_POST['name'];
$login = $_POST['login'];
$password = md5($_POST['password']);
$repassword = md5($_POST['repassword']);
$city_id = $_POST['city_id'];

if ($password != $repassword) {
    $_SESSION['registerError'] = 'Пароли не совпадают';
    header('Location: ../pages/register.php');
    exit();
}

$query = "INSERT INTO users (name, login, password, city_id) VALUES(:name, :login, :password, :city_id)";
$res = $pdo->prepare($query);
$status = $res->execute([
    ':name' => $name,
    ':login' => $login,
    ':password' => $password,
    ':city_id' => $city_id,
]);

if ($status) {
    $query = 'SELECT * FROM users WHERE login = :login';
    $res = $pdo->prepare($query);
    $res->execute([
        ':login' => $login,
    ]);
    $user = $res->fetch();
    $_SESSION['user'] = $user;
}

header('Location: /');

?>