<?php
    include "engine/server.php";
    include "engine/counter.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <link rel="stylesheet" href="public/css/photo.css">
</head>
<body>
<div class="main">        
    <div class="photo">
    <?php
    $id = $_GET['id'];
    $click = $_GET['click'];

    if ($id) {
        if ($click == true) {
            counters($conDB, $id, "click");
        }
        counters($conDB, $id, "view");
    }
    $query = "SELECT * FROM pictures";
    if ($id) {
        $id = (int)$id;
        $query .= " WHERE id = " . $id;
    }
    $resDB = mysqli_query($conDB, $query);
    $data = mysqli_fetch_all($resDB, MYSQLI_ASSOC);

    if (count($data) > 0) {
        foreach ($data as $row) {
            $filebig = $row['path'] . "big/". $row['name'];?>
            <div class="bigphoto">
                <img class="bigphoto" src="<?= $filebig ?>"/>
                <br>Просмотры: <?= $row['view'] ?>
                <br>Переходы: <?= $row['click'] ?>
            </div>
        <?php
        }
    } else {
        echo '<div class="error"><h4>Изображения отсутствуют!</h4></div>';
    }
    echo '</div>';
    ?>
    </div>
</div>
</body>
</html>