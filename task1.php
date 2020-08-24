<?php
$a = rand(-100,100);
$b = rand(-100,100);

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
}
elseif ($a < 0 && $b < 0) {
    echo $a * $b;
}
else {
    echo $a + $b;
}