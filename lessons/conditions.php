<?

$number = 4;

if ($number > 5) {
    echo 'число больше 5';
    echo '<br>';
    echo '!';
}

echo '<br>';
echo 'Эта строка выводится всегда';

if ($number > 5) {
    echo '<br>';
    echo 'число больше 5';
} else {
    echo '<br>';
    echo 'число меньше или равно 5';
}

if ($number > 5) {
    echo '<br>';
    echo 'число больше 5';
} else if ($number > 3) {
    echo '<br>';
    echo 'число меньше или равно 5, но больше 3';
} else if ($number > 0) {
    echo '<br>';
    echo 'либо 1, либо 2, либо 3';
} else {
    echo '<br>';
    echo '0 либо отрицательное';
}

$second_number = 1;

echo '<hr>';

if ($number > 0 && $second_number == 0) {
    echo '$number > 0 и $second_number = 0'; 
}

if ($number > 0 || $second_number == 0) {
    echo '$number > 0 или $second_number = 0'; 
}

if ($number > 0) {
    if ($number > 2) {
        echo 'число больше 2';
    }
}

if ($number != 0) {
 echo 'число не 0';
}

echo '<hr>';

/**
 * вывести одно из 3 сообщений
 * если возраст меньше 7: Вы дошкольник
 * если старше 6 и младше 19: Вы в школе
 * если старше 18: Закончили школу
 */

 $age = 1;

 if ($age < 7 ) {
    echo 'Вы дошкольник';
 } else if ($age > 6 && $age < 19) {
    echo 'Вы в школе';
 } else {
    echo 'Закончили школу';
 }