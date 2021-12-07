<?php

$movies = [1, 2, 3, 4, 5];

echo $movies[0];

echo '<br>';

echo '<pre>';
print_r($movies);
echo '</pre>';

echo '<br>';

$count = count($movies);

echo $count;

echo '<br>';

foreach ($movies as $key => $value) {
    echo $value . ', ';
}

$new_numbers = [];

for ($i=0; $i < 10; $i++) { 
    $new_numbers[] = $i ** 2;
}

$new_numbers[3] = 99;
$new_numbers[10] = 100;
$new_numbers[67] = 67 * 67;

echo '<pre>';
print_r($new_numbers);
echo '<pre>';

echo '<hr>';

$person = [
    'name' => 'Alexander',
    'age' => 28,
    'city' => 'London',
    'language' => 'PHP'
];

$person['car'] = true;

echo $person['name'] . '<br>';

print_r($person);