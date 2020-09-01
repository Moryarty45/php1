<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галлерея</title>
    <!-- <script src="js/js_gallery.js"></script> -->
    <link rel="stylesheet" href="css/photo.css">
</head>
<body>
<div class="main">
    <div class="photo">
    <?php
    include "blocks/content.php";
    ?>
    </div>
    <div class="upload">
        <form action="server.php" method="post" enctype="multipart/form-data">
        <p>Загрузить файл</p>
        <input type="file" name="photo"><br><br>
        <input type="submit" value="Загрузить">
        </form>
    </div>
</div>
</body>
</html>
