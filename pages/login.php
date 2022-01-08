<?php

    $title = 'Авторизация';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

    if ($_SESSION['user']) {
        header('Location: ../index.php');
    }

    if (isset($_SESSION['loginError'])) {
        echo 
        "
        <div class='alert alert-warning text-center' role='alert'>
            Неверные данные
        </div>
        ";
        unset($_SESSION['loginError']);
    }

?>

<form method="POST" action="../actions/login_user.php">
    <input class="form-control mb-2" placeholder="Логин" name='login'>
    <input type="password" class="form-control mb-2" placeholder="Пароль" name='password'>
    <button type="submit" class="btn btn-success w-100">Войти</button>
</form>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>