<?php

// given the string A and string B, find the number of subsequences in string A which match string B
// order is maintained but the matches don't have to be concurrent
// eg, AB, A____B

$string_a = "ABABABCCCCCCBBBB";
$string_b = "ABCB";

function search($string_a, $string_b)
{
    if(strlen($string_a) === 0) {
        return 0;
    }

    if(strlen($string_b) === 0) {
        return 1;
    }

    $results = 0;
    for($i=0; $i<(strlen($string_a)-strlen($string_b)+1); $i++) {
        if($string_a[$i] === $string_b[0]) {
            //echo "String A: ".print_r(substr($string_a, $i), true)." String B: ".print_r(substr($string_b, 1), true)."\n";

            $results += search(substr($string_a, $i), substr($string_b, 1));
        }
    }

    return $results;
}

function matcher($matches, $string_a_pos, $string_b_pos, $string_a, $string_b)
{
    for($i=$string_a_pos; $i<strlen($string_a); $i++) {
        if($string_a[$i] === $string_b[$string_b_pos]) {
            $matches = matcher($matches, ($i+1), $string_b_pos, $string_a, $string_b);
            
            if(++$string_b_pos === strlen($string_b)) {
                return ++$matches;
            }
        }
    }

    return $matches;
}

$start = microtime(true);

for($i=0; $i<10000; $i++) {
    search($string_a, $string_b);
}

var_dump(search($string_a, $string_b));

var_dump(microtime(true)-$start);

$start = microtime(true);

for($i=0; $i<10000; $i++) {
    matcher(0, 0, 0, $string_a, $string_b);
}

var_dump(matcher(0, 0, 0, $string_a, $string_b));

var_dump(microtime(true)-$start);