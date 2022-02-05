<?php

$title = 'Корзина';

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$basketProducts = $_SESSION['products'];
$productIds = array_keys($basketProducts);

$place_holders = implode(',', array_fill(0, count($productIds), '?'));
$query = "SELECT * FROM products WHERE id IN ($place_holders)";
$res = $pdo->prepare($query);
$res->execute($productIds);

$products = $res->fetchAll();

?>

<table class="table table-bordered mt-2">
    <tbody>
        <?php
        foreach ($products as $product) {
            $sum = (float) $basketProducts[$product['id']] * $product['price'];
        ?>

            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $basketProducts[$product['id']] ?></td>
                <td><?= $sum ?></td>
            </tr>

        <?php
        }
        ?>
    </tbody>
</table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>