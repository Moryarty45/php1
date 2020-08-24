<?php
function getHour()
{
    $h = date('H');
    $str = '';
    if ($h == 1 || $h == 21) {
        $str = 'час';
    } elseif (($h >= 2 && $h <= 4) || ($h > 21 && $h < 23)) {
        $str = 'часa';
    } else {
        $str = 'часов';
    }
    return $h . ' ' . $str;
}

function getMin()
{
    $m = date('i');
    $str = '';
    if ($m > 4 && $m < 21) {
        $str = 'минут';
    }
    $m2 = $m % 10;
    if ($m2 == 2 || $m2 == 3 || $m2 == 4) {
        $str = 'минуты';
    } elseif ($m2 == 1) {
        $str = 'минута';
    } else {
        $str = 'минут';
    }
    return $m . ' ' . $str;
}

echo getHour() . ' ' . getMin();