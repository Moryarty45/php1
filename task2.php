<?php
$a = 0;
do {
    if ($a == 0) {
        echo $a . " - это ноль<br>";
    }
    elseif (($a % 2) == 0) {
        echo $a . " - четное число<br>";
    } else{
        echo $a . " - нечетное число<br>";
    }
    $a++;
} while ($a <= 10);