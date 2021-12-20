<?php

// start https://www.codewars.com/kata/582cb0224e56e068d800003c/php

function litres($t) {
    $l = 0;
    $l = floor(0.5 * $t);
    return $l;
}

echo litres(11.8) . '<br>';

// end https://www.codewars.com/kata/582cb0224e56e068d800003c/php


// start https://www.codewars.com/kata/57a0e5c372292dd76d000d7e/php

function repeatStr($n, $str)
{
  return str_repeat($str, $n);
}

echo repeatStr(7, 'Alexander') . '<br>';

// end https://www.codewars.com/kata/57a0e5c372292dd76d000d7e/php


//start https://www.codewars.com/kata/5933a1f8552bc2750a0000ed/php

function nthEven($n) {
    return $n > 0 ? $n * 2 - 2 : 0;
}

echo nthEven(929) . '<br>';
echo nthEven(13) . '<br>';
echo nthEven(1298734) . '<br>';
echo nthEven(685260569) . '<br>';

//end https://www.codewars.com/kata/5933a1f8552bc2750a0000ed/php


// start https://www.codewars.com/kata/5168bb5dfe9a00b126000018/php

function solution($str) {
    return strrev($str);
}

echo solution('Hello') . '<br>';

/* use function strrev as solution; - круто однако... */

// end https://www.codewars.com/kata/5168bb5dfe9a00b126000018/php


// start https://www.codewars.com/kata/5859c82bd41fc6207900007a/php

function quotable($name, $quote) {
    return $name . ' said: "' . $quote . '"';
}

echo quotable('Alexander', 'Hello!') . '<br>';

// end https://www.codewars.com/kata/5859c82bd41fc6207900007a/php


//start https://www.codewars.com/kata/54ff3102c1bad923760001f3/php

function getCount($str) {
    $vowelsCount = 0;
    
    $letters = ['a', 'e', 'i', 'o', 'u'];
    
    foreach ($letters as $letter) {
        $vowelsCount += substr_count($str, $letter);
    }
    
    return $vowelsCount;
}

echo getCount('Alexander') . '<br>';

/* return preg_match_all('/[aeiou]/i',$str,$matches); - точно, _all же такое умеет*/

// end https://www.codewars.com/kata/54ff3102c1bad923760001f3/php


// start https://www.codewars.com/kata/55bf01e5a717a0d57e0000ec/php

function persistence(int $num) : int {    
    $i = 0;
    if ($num > 9) {
        $array_numbers = str_split((string) $num);
        $multiplication = 1;
        foreach ($array_numbers as $number) {
            $multiplication = $multiplication * $number;
        }
        $i = persistence($multiplication) + 1;
        return $i;
    } else {
        return $i;
    }  
}

echo persistence(39) . '<br>';
echo persistence(999) . '<br>';
echo persistence(4) . '<br>';

/* Зачем-то понесло в рекусрии, про изменение $num в цикле не подумал... */

// end https://www.codewars.com/kata/55bf01e5a717a0d57e0000ec/php