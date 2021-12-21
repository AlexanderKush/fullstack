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

        $query = "SELECT * FROM users";
        $res = $pdo->query($query);
        $users = $res->fetchAll();

        $query = "SELECT * FROM cities";
        $res = $pdo->query($query);
        $cities = $res->fetchAll();

        echo "
        <table class=\"table border\">
            <thead>
                <tr>
                    <th>id</th>
                    <th>login</th>
                    <th>name</th>
                    <th>city_id</th>
                </tr>
            </thead>
            <tbody>
        ";

        foreach ($users as $user) {

            $city = $user['city_id'] ? $user['city_id'] : '-';

            echo "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['login']}</td>
                    <td>{$user['name']}</td>
                    <td>$city</td>
                    <td class=\"text-center\">
                        <form method=\"post\" action=\"del_user.php\">
                            <button class=\"btn btn-danger\" style=\"border-radius: 50em; width: 30px; padding: 0 0 4px;height: 30px; line-height: 1;\">x</button>
                        </form>
                    </td>
                </tr>    
            ";
        }

        echo "
            </tbody>
        </table>
        ";

        ?>

        <form method="POST" action="form.php">
            <input required class="form-control mb-2" placeholder="Имя" name='name'>
            <input class="form-control mb-2" placeholder="Логин" name='login'>
            <input type="password" class="form-control mb-2" placeholder="Пароль" name='password'>
            <select class="form-control mb-2" name="city_id">
                <option value="" selected disabled>Выберите город</option>
                <?
                    foreach ($cities as $city) {
                        echo '<option value="">' . $city['name'] . '</option>';
                    }
                ?>
            </select>
            <button type="submit" class="btn btn-success w-100">Отправить</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>