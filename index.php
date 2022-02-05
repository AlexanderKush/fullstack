<?php

$title = 'Главная';

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$query = "SELECT * FROM categories";
$res = $pdo->query($query);
$categories = $res->fetchAll();

$cards = '';
foreach ($categories as $category) {
    $cards .=
        '
        <div class="col-3 mb-4">
            <div class="card">
                <img src="/images/categories/no-photo.jpg" class="card-img-top mw-100" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $category['name'] . '</h5>
                    <p class="card-text">' . $category['description'] . '</p>
                    <a href="/pages/category.php?id=' . $category['id'] . '" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>
        ';
}
?>

<div class='row'>
    <?= $cards ?>
</div>
<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>