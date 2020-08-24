<?php
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