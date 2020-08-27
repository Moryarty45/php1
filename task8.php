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
            if (mb_substr($city, 0, 1) == "К") {
                $result .= $city;
            }
        }
        $result .= "<br>";
    }
    return $result;
};

echo printRegion($regions);