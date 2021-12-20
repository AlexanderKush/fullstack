<?

include_once 'src/funcs.php';

test();

echo '<br>';

echo '<select>';
    for ($i=0; $i < 5 ; $i++) { 
        include 'option.php';
    }
echo '</select>';

echo '<hr>';

function plusOne ($a) {
    return ++$a;
}

$a = 10;
echo $a.'<br>';
$a = plusOne($a);
echo $a.'<br>';