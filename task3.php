<?php
$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Шилово", "Сасово", "Михайлов"]
];
function printRegion($regions){
    $result = "";
    foreach ($regions as $region => $value) {
        $result .= $region . ":<br>";
        foreach ($value as $city) {
            if($city == end($value)) {
                $result .= $city . ".";
            }
            else {
                $result .= $city . ", ";
            }
        }
        $result .= "<br>";
    }
    return $result;
};

echo printRegion($regions);