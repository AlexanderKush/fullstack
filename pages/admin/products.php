<?php

$title = 'Список продуктов';

require_once $_SERVER['DOCUMENT_ROOT'] . './templates/header.php';

$query = "SELECT p.id, p.name, p.price, p.picture, p.description, c.name as category
        FROM products as p
        JOIN categories as c ON p.category_id = c.id";
$res = $pdo->query($query);
$products = $res->fetchAll();

$query = "SELECT * FROM categories";
$res = $pdo->query($query);
$categories = $res->fetchAll();

if (isset($_SESSION['createProductErrors'])) {
    $errors = implode('<br>', $_SESSION['createProductErrors']);
?>
    <div class="alert alert-warning text-center" role="alert">
        <?= $errors ?>
    </div>
<?php
    unset($_SESSION['createProductErrors']);
}
?>

<form method="POST" enctype="multipart/form-data" action="/actions/admin/createProduct.php">
    <input value="<?= $_SESSION['lastProductCreate']['name'] ?? '' ?>" class="form-control mb-2" name="name" placeholder="Наименование продукта">
    <textarea class="form-control mb-2" name="description" placeholder="Описание"><?= $_SESSION['lastProductCreate']['description'] ?? '' ?></textarea>
    <input value="<?= $_SESSION['lastProductCreate']['price'] ?? '' ?>" class="form-control mb-2" name="price" placeholder="Цена">
    <input type="file" name="file" class="form-control mb-2">
    <select class="form-control mb-2" name="category_id">
        <?php

        $lastCategoryId = $_SESSION['lastProductCreate']['category_id'];
        if (!$lastCategoryId) {
            echo '<option disabled selected>-- Выберите категорию --</option>';
        }
        foreach ($categories as $category) {
            $selected = $lastCategoryId == $category['id'] ? 'selected' : '';
            echo '<option $selected value="' . $category['id'] . '">' . $category['name'] . '</option>';
        }

        ?>
    </select>
    <button class="btn btn-primary w-100" type="submit">Сохранить</button>
</form>

<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Изображение</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!$products) {
        ?>
            <tr>
                <td class="text-center" colspan="6">
                    <em>Продукты отсутствуют</em>
                </td>
            </tr>
        <?php
        }

        foreach ($products as $product) {
        ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['category'] ?></td>
                <td class="text-center" style="max-width: 200px;">
                    <img class="mw-100 mh-100" src="<?= PRODUCTS_IMAGE_PATH . $product['picture'] ?>">
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
