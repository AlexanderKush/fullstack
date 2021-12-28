<?php

    session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
    <div class='container mt-5'>

    <?php

    $user = 'root';
    $password = '';
    $pdo = new Pdo('mysql:dbname=fullstack2;host=127.0.0.1', $user, $password);

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
                    <div class="alert alert-success">Данные успешно сохранены</div>
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
                        echo '<option ' . $selected . ' value="">' . $city['name'] . '</option>';
                    }
                ?>
            </select>
            <button class="btn btn-success w-100">Сохранить</button>
        </form>

        <?

    } else {
        echo 'Пользователь не найден';
    }

    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>