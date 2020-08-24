<?php
$val = rand(1,10);
$pow = rand(-5,5);
echo "\$val=$val, \$pow=$pow";
echo "<br>";
function power($val, $pow){
    if ($pow == 0){
        return(1);
    }
    elseif ($pow > 0) {
        return $val * power($val, $pow - 1);
    }
    elseif ($pow < 0){
            return 1/(power($val,-$pow));
    }
    return "Error";
    //Если не учитывать отрицательную степень, то можно тернарным оператором, гораздо короче
    //return $pow == 0 ? 1 : $val * power($val, $pow - 1);
}

echo  power($val,$pow);

