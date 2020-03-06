<?php

$list = [8, 30, 7, 5, 8, 5, 4, 25, 9, 10, 7, 36, 8, 8];
$k = 8;

function partition($list, $low, $high, $value)
{
    $low_list = $low - 1;

    for($j=$low; $j<$high; $j++) {
        if($list[$j] < $value) {
            $low_list++;

            swap($list, $low_list, $j);
        }
    }

    $middle_list = $low_list;
    for($j=($low_list+1); $j<$high; $j++) {
        if($list[$j] === $value) {
            $middle_list++;

            swap($list, $middle_list, $j);
        }
    }

    return $list;
}

function swap(&$list, $i, $j)
{
    if($i !== $j) {
        $tmp = $list[$i];
        $list[$i] = $list[$j];
        $list[$j] = $tmp;
    }
}

var_dump(partition($list, 0, sizeof($list), $k));
