<?php

$title = 'Категория';

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$categoryId = $_GET['id'];

$query = "SELECT * FROM categories WHERE id = :categoryId";
$res = $pdo->prepare($query);
$res->execute([
    ':categoryId' => $categoryId,
]);
$category = $res->fetch();

$query = "SELECT * FROM products WHERE category_id = :categoryId";
$res = $pdo->prepare($query);
$res->execute([
    ':categoryId' => $categoryId,
]);
$products = $res->fetchAll();

$cards = '';
foreach ($products as $product) {
    $disabled = isset($_SESSION['products'][$product['id']]) ? '' : ' disabled';
    $cards .= '
    <div class="col-3 mb-2">
        <div class="card product-card-mini">
            <div class="card-image text-center p-3">
                <img src="/images/products/' . $product['picture'] . '" class="card-img-top mh-100" alt="...">
            </div>
            <div class="card-body pt-0">
                <h5 class="card-title">' . $product['name'] . '</h5>
                <p class="card-text">' . $product['description'] . '</p>
                <div class="card-price mb-4"><b>' . $product['price'] . ' руб.
                </b></div>
                <div class="card-basket-buttons">
                    <form action="/actions/basket/remove_product.php" method="post">
                        <input name="id" hidden value="' . $product['id'] . '">
                        <input name="category_id" hidden value="' . $product['category_id'] . '">
                        <button' .  $disabled . ' class="btn btn-product-remove btn-danger">-</button>
                    </form>
                    <div class="card-basket-quantity">' . $_SESSION['products'][$product['id']] . '</div>
                    <form action="/actions/basket/add_product.php" method="post">
                        <input name="id" hidden value="' . $product['id'] . '">
                        <input name="category_id" hidden value="' . $product['category_id'] . '">                        
                        <button class="btn btn-product-add btn-success">+</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ';
}

?>

<h1><?= $category['name'] ?></h1>

<h4><?= $category['description'] ?></h4>

<div class='row'>
    <?= $cards ?>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>