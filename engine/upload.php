<?php
include "server.php";

function uploadsFiles($conDB)
{
    foreach ($_FILES as $file) {
        $fileType = explode("/", $file['type'])[0];
        if ($file['error'] != 0) {
            $message = "Произошла ошибка: " . $file['error'] . "!";
        } elseif ($fileType != "image") {
            $message = "Неверный тип файла: " . $file['name'] . "!";
        } elseif ($file['size'] > 5242880) {
            $message = "Слишком большой размер файла: " . $file['size'] . "! Не более 5Мб!";
        } else {
            $src = $file['tmp_name'];
            $big = './public/img/big/' . $file['name'];
            $small = './public/img/small/' . $file['name'];
            resize($src, $small, 400, 250);
            move_uploaded_file($src, $big);
            $message = "Загрузка файла: " . $file['name'] . " успешно выполнена!";
            $query = "INSERT INTO pictures (path, size, name, view, click) VALUES ('./public/img/', '" . $file['size'] . "', '" . $file['name'] . "', '0', '0')";
            mysqli_query($conDB, $query);
        }

        echo '<div class="uploadDone"><h4>' . $message . '</h4></>';
    }
}

function resize($src, $dest, $width, $height, $rgb = 0xFFFFFF, $quality = 100)
{
    if (!file_exists($src)) return false;
    $size = getimagesize($src);
    if ($size === false) return false;
    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
    $icfunc = "imagecreatefrom" . $format;
    if (!function_exists($icfunc)) return false;

    $x_ratio = $width / $size[0];
    $y_ratio = $height / $size[1];

    $ratio = min($x_ratio, $y_ratio);
    $use_x_ratio = ($x_ratio == $ratio);

    $new_width = $use_x_ratio ? $width : floor($size[0] * $ratio);
    $new_height = !$use_x_ratio ? $height : floor($size[1] * $ratio);
    $new_left = $use_x_ratio ? 0 : floor(($width - $new_width) / 2);
    $new_top = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

    $isrc = $icfunc($src);
    $idest = imagecreatetruecolor($width, $height);

    imagefill($idest, 0, 0, $rgb);
    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
        $new_width, $new_height, $size[0], $size[1]);

    imagejpeg($idest, $dest, $quality);

    imagedestroy($isrc);
    imagedestroy($idest);

    return true;
}