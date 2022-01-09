<?php

$title = 'Регистрация';

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

$query = "SELECT * FROM cities";
$res = $pdo->query($query);
$cities = $res->fetchAll();

if (isset($_SESSION['registerError'])) {
    echo '<div class="alert alert-warning text-center" role="alert">' . $_SESSION['registerError'] . '</div>';
    unset($_SESSION['registerError']);
}

?>

<form method="POST" action="../actions/register_user.php">
    <input required class="form-control mb-2" placeholder="Имя" name='name'>
    <input class="form-control mb-2" placeholder="Логин" name='login'>
    <input type="password" class="form-control mb-2" placeholder="Пароль" name='password'>
    <input type="password" class="form-control mb-2" placeholder="Повторите пароль" name='repassword'>
    <select class="form-control mb-2" name="city_id">
        <option value="" selected disabled>-- Выберите город --</option>
        <?
        foreach ($cities as $city) {
            echo '<option value="' . $city['id'] . '">' . $city['name'] . '</option>';
        }
        ?>
    </select>
    <button type="submit" class="btn btn-success w-100">Зарегистрироваться</button>
</form>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

?>