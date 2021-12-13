<?php

function sayHello () {
    echo 'Hello!<br>';
}

function plusOne($a) {
    echo ++$a . '<br>';
}

function multiply (int $a, int $b) {
    echo $a * $b . '<br>';
}

function sumNumbers ($a, $b, $c = 0) {
    echo $a + $b + $c . '<br>';
}

function returnPlusOne ($a) {
    return [
        'oldValue' => $a,
        'newValue' => ++$a
    ];
}

sayHello();

echo 'Hi!<br>';

sayHello();

sayHello();

plusOne(55);

echo ' . какой-то текст';

$number = 18;

plusOne($number);

$number = 9;
$result = returnPlusOne($number);
echo "Новое число: {$result['newValue']} <br>";
echo "Старое число: {$result['oldValue']} <br>";

multiply(10, 5);

sumNumbers(1, 2, 3);

sumNumbers(1, 2);

$numbers = [1, 5, 3, 7, 2, 4];

function maxNumber (array $numbers) {
    $maxNumber = $numbers[0];

    foreach ($numbers as $value) {
        if ($maxNumber < $value) {
            $maxNumber = $value;
        }
    }

    return $maxNumber;
}

function sumArray (array $numbers) {
    $res = 0;

    foreach ($numbers as $value) {
        $res += $value;
    }

    return $res;

}

echo maxNumber($numbers) . '<br>';

echo max($numbers) . '<br>';

echo sumArray($numbers) . '<br>';