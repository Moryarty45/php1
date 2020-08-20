<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? - Потому что php приведет строку 05 в число 5, а 5 = 5 (не явное приведение типов)
    var_dump((int)'012345');     // Почему 12345? - Потому что это восьмеричное число, но ведущий ноль в строке не делает число, полученное при приведении строки к типу integer восьмеричным
    var_dump((float)123.0 === (int)123.0); // Почему false? - Потому что тождественное равенство (сравнение не только по значению но и по типу)
    var_dump((int)0 === (int)'hello, world'); // Почему true? - Потому что php пытается перевести строку в число, у него не получается и он преобразует в 0, а 0 = 0
?>