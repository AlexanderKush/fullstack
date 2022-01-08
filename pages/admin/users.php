<?php
$title = 'Список пользователей';
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

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
            <td>
                <a href=\"/pages/user.php?id=" . $user['id'] . "\">
                    {$user['name']}
                </a>
            </td>
            <td>$city</td>
            <td class=\"text-center\">
                <form method=\"post\" action=\"/actions/del_user.php\">
                    <input type=\"hidden\" name=\"id\" value=" . $user['id'] . ">
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

require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';

?>