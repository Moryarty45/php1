<?php
$title = "Галерея";
$message = '';
include_once "core/functions.php";


if($_FILES['img']) {
    if (!preg_match("/^image\/.+$/", $_FILES['img']['type'])) {
        $message = "Error: wrong file type!";
    } elseif ($_FILES['img']['error']) {
        $message = "Error " . $_FILES['img']['error'];
    } else {
        $name = friendlyName($_FILES['img']['name']);
        $size = $_FILES['img']['size'];
        if (move_uploaded_file($_FILES['img']['tmp_name'], GALLERY_IMAGES_PATH.$name)) {
            if (mysqli_query($conn, "INSERT INTO gallery_images (name, path, size) VALUES ('$name', 'img/gallery/', '$size')")) {
                create_thumbnail(GALLERY_IMAGES_PATH.$name, GALLERY_IMAGES_PATH."thumbnail/tn_".$name, 160, 120);
                $message = "Изображение успешно загрузилось!";
            }
            else {
                $message = "Ошибка добавление в БД!";
            }
        } else {
            $message = "Error while uploading image!";
        }
    }
}

if($_GET['img']) {
    $id = intval($_GET['img']);
    mysqli_query($conn, "UPDATE gallery_images SET views=views+1 WHERE id=$id LIMIT 1");
    $result = mysqli_query($conn, "SELECT * FROM gallery_images WHERE id=$id LIMIT 1");
    $img = mysqli_fetch_assoc($result);
    $title .= " - ".$img['name'];

    $content = "<a href='?mod=gallery'>Вернуться в галерею</a>
    <figure class='img'>
        <p><img src='".$img['path'].$img['name']."' alt='' /></p>
        <figcaption>
            Название: ".$img['name']."<br>Просмотров: ".$img['views']."
        </figcaption>
    </figure>";
}
else {
    $content ="<div class='gallery'>";
    $result = mysqli_query($conn, "SELECT * FROM gallery_images ORDER BY views DESC");
    while ($img = mysqli_fetch_assoc($result)) {
        $content .= "<div class='gallery-img'><a href='?mod=gallery&img=".$img['id']."' title='".$img['name']."'><img src='".GALLERY_IMAGES_PATH."thumbnail/tn_".$img['name']."' alt='".$img['name']."'></a><p>Просмотров: ".$img['views']."</p></div>\n";
    }
    $content .= "</div>
    <div class='uploads'>
        <h5>Форма загрузки изображений</h5>
        <div class='message-ok'>".$message."</div>
        <form enctype='multipart/form-data' action='' method='POST'>
            <div class='file-field input-field'>
            <div class='btn'>
                <span>Файл</span>
                <input name='img' id='file' type='file'>
            </div>
            <div class='file-path-wrapper'>
                <input class='file-path validate' type='text'>
            </div>
            <button class='btn waves-effect waves-light center' type='submit' name='action'>Отправить
                <i class='material-icons right'>send</i>
            </button>
            </div>
        </form>
        </div>";
}
?>