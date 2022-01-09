<?php

require $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$userId =$_POST['id'];
$name =$_POST['name'];
$login =$_POST['login'];
$cityId = $_POST['city_id'];

$query = "UPDATE users SET name = :name, city_id = :city_id, login = :login WHERE id = :id";
$res = $pdo->prepare($query);
$status = $res->execute([
    ':id' => $userId,
    ':name' => $name,
    ':login' => $login,
    ':city_id' => $cityId,
]);

if (!$status) {
    $error = $res->errorInfo();
    $_SESSION['error'] = $error['2'];
} else {
    $_SESSION['good'] = '1';
}

header('Location: ../pages/user.php?id=' . $userId);

?>