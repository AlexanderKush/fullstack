<?php

$title = 'Личный кабинет';
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

    $user_id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = :user_id";
    $res = $pdo->prepare($query);
    $res->execute([
        ':user_id' => $user_id
    ]);

    $arr_user = $res->fetch();

    if ($arr_user) {

        $query = "SELECT * FROM cities";
        $res = $pdo->query($query);
        $cities = $res->fetchAll();

        if (isset($_SESSION['error'])){
            echo '
                <div class="alert alert-danger">' . $_SESSION['error'] . '</div>
            ';
            unset($_SESSION['error']);
        } else {
            if ($_SESSION['good']) {
                echo '
                    <div id="alertSuccess" class="alert alert-success">Данные успешно сохранены</div>
                ';
                unset($_SESSION['good']);
            }
        }

        ?>

        <form method="post" action="../actions/update_user.php">
            <input type="hidden" name="id" value="<?=$arr_user['id']?>">
            <label>Имя</label>
            <input class="form-control mb-2" value="<?=$arr_user['name']?>" name='name'>
            <label>Логин</label>
            <input class="form-control mb-2" value="<?=$arr_user['login']?>" name='login'>
            <label>Город</label>
            <select class="form-control mb-2" name="city_id">
                <?
                    if (!$arr_user['city_id']) {
                        echo '<option value="" selected disabled>Выберите город</option>';
                    }
                    foreach ($cities as $city) {
                        $selected = $city['id'] == $arr_user['city_id'] ? 'selected' : '';
                        echo '<option ' . $selected . ' value="' . $city['id'] . '">' . $city['name'] . '</option>';
                    }
                ?>
            </select>
            <button class="btn btn-success w-100">Сохранить</button>
        </form>

        <?

    } else {
        echo '<div class="alert alert-warning">Пользователь не найден</div>';
    }

    ?>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#alertSuccess').fadeOut()
            }, 3000)
        })
    </script>

   <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
   ?>