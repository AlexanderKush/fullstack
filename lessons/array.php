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

echo '<hr>';

$colors = ['red', 'green', 'blue'];


$output = '';

foreach ($colors as $color) {
    $output .= $color . ', ';
}
echo $output;
echo '<br>';

$string_color = implode(', ', $colors);
echo $string_color;
echo '<br>';

$new_str = 'Предложение из 4 слов';
$array = explode(' ', $new_str);
print_r($array);

echo '<br>';

$numbers = [2, 4, 6, 1, 3];
print_r($numbers);

sort($numbers);

echo '<br>';
print_r($numbers);

echo '<br>';
sort($person);
print_r($person);

echo '<br>';
$person = [
    'name' => 'Alexander',
    'age' => 28,
    'city' => 'London',
    'language' => 'PHP'
];
asort($person);
print_r($person);

ksort($person);
print_r($person);

echo '<br>';
rsort($numbers);
print_r($numbers);

echo '<br>';
arsort($person);
print_r($person);

echo '<br>';
krsort($person);
print_r($person);

echo '<hr>';

$persons = [
    [
        'name' => 'Alexander',
        'age' => 28,
        'city' => 'London',
        'language' => ['PHP', 'JS']
    ],
    [
        'name' => 'Jhon',
        'age' => 20,
        'city' => 'Madrid'
    ],
    [
        'name' => 'Petr',
        'age' => 35,
        'city' => 'Kazan'
    ]
];

echo '<br>';

print_r($persons);

function sortByAge ($a, $b){
    if ($a['age'] > $b['age']) {
        return 1;
    } else if ($a['age'] < $b['age']) {
        return -1;
    }else{
        return 0;
    }
}

function sortByCity ($a, $b){
    return $a['city'] <=> $b['city'];
}

usort($persons, 'sortByAge');
print_r($persons);

usort($persons, 'sortByCity');
print_r($persons);

echo '<hr>';

$numberOne = 100;
$numberTwo = 15;

echo $numberOne <=> $numberTwo;
echo '<br>';

$names = array_column($persons, 'name');
print_r($names);

array_multisort($names, SORT_DESC, $persons);
print_r($persons);

$keys = array_keys($person);
print_r($keys);

$values = array_values($person);
print_r($values);

echo $persons[0]['age'];

print_r($persons);

print_r($persons[2]['language'][0][0]);