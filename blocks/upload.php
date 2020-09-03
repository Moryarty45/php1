<?php
include "./engine/upload.php";
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_FILES)) {
    if(uploadsFiles($conDB)){
        header("Location: index.php");
    }
}
?>

<h3>Загрузка нового изображения</h3>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file"><br>
<input type="submit" value="Загрузить">
</form>