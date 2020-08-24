<?php
$arg1 = rand(1,10);
$arg2 = rand(1,10);
echo "\$arg1=$arg1, \$arg2=$arg2";
echo "<br>";
function addition($a,$b){
    return $a + $b;
}
function subtraction($a,$b){
    return $a - $b;
}
function multiply($a,$b){
    return $a * $b;
}
function division($a,$b){
    if ($b == 0) {
        return "Error";
    }
    return $a / $b;
}
function mathOperation($arg1, $arg2, $operation){
    switch($operation){
        case "+":
            return addition($arg1,$arg2);
        case "-":
            return subtraction($arg1,$arg2);
        case "*":
            return multiply($arg1,$arg2);
        case "/":
            return division($arg1,$arg2);
        default:
            return "Error";
    }

}
echo mathOperation($arg1,$arg2,"+");
echo "<br>";
echo mathOperation($arg1,$arg2,"-");
echo "<br>";
echo mathOperation($arg1,$arg2,"*");
echo "<br>";
echo mathOperation($arg1,$arg2,"/");