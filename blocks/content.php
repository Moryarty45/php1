<?php
include "config/function.php";
include "engine/server.php";
   
    $id = $_GET['id'];
    $click = $_GET['click'];
    $query = "SELECT * FROM pictures";
    if ($id) {
        $id = (int)$id;
        $query .= " WHERE id = " . $id;
    }

    $query .= " ORDER BY click DESC";
    $resDB = mysqli_query($conDB, $query);
    $data = mysqli_fetch_all($resDB, MYSQLI_ASSOC);

    if (count($data) > 0) {
        foreach ($data as $row) {
            $filesmall = $row['path']. "small/" . $row['name'];?>
            <div class="smallphoto">
                <a href="./images.php?click=true&id=<?= $row['id'] ?>" target="_blank">
                    <img src="<?= $filesmall ?>"/></a>
                <div class="view">
                    <br>Просмотры: <?= $row['view'] ?>
                    <br>Переходы: <?= $row['click'] ?>
                </div>
            </div>
<?php
        }
    } else {
        echo '<div class="page-header"><h4>Изображения отсутствуют!</h4></div>';
    }
    echo '</div>';
    ?>