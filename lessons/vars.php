<?

$name = 'Alexander';
$age = 30;
// Вот так делать не нужно!
$Age = 31;

/**
 * многострочный
 * комментарий
 */

echo $name;
echo '<br>';
echo $age;
echo '<br>';
echo $Age;

$name2 = 'Ivan';

echo '<br>';
echo $name2;

$lastName = 'Kush';
$last_name = 'Kush';

$fullName = $name . ' ' . $lastName;
echo '<br>';
echo $fullName;

$word = 'lower_case';
$word = strtoupper($word);
echo '<br>';
echo $word;

$upperCase = 'UPPER_CASE';
$upperCase = strtolower($upperCase);
echo '<br>';
echo $upperCase;

echo '<br>';
$password = '   qwerty ';
echo '!' . $password . '!';
echo '<br>';
echo trim($password) . '!';

$number = 5 * 5;
echo '<br>';
echo $number * 2;
echo '<br>';

/**
 * 2 гамбургера по 4.95
 * 1 коктейль зп 1.95
 * 1 кока-кола за 0.85
 * чаевые 16% (только к меню)
 * ндс 7,5% ()
 */
$price = 0;
$total_whit_tea = 0;
$total = 0;
$tea = 0.16;
$nds = 0.075;

$meny = array(
    '0' => array(
        'name' => 'Гамбургер',
        'price' => 4.95,
        'count' => 2,
     ),
     '1' => array(
        'name' => 'Коктейль',
        'price' => 1.95,
        'count' => 1,
    ),
    '2' => array(
        'name' => 'Кока-кола',
        'price' => 1.95,
        'count' => 1,
   )
);

foreach ($meny as $item) {
    $price = $price + $item['price'] * $item['count'];
}

$total_whit_tea = $price + $price * $tea;
$total = $total_whit_tea + $total_whit_tea * $nds;

echo 'Итого: ' . $total;