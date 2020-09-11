<?php
$title = "Каталог";

if($_GET['prod']) {
    $id = intval($_GET['prod']);
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $prod = mysqli_fetch_assoc($result);
    $title .= " - ".$prod['name'];

    $content = "<a href='?mod=catalog'>Вернуться в каталог</a>
    <figure class='img'>
        <p><img src='".CATALOG_IMAGES_PATH.$prod['image']."' /></p>
        <figcaption>
            <h3>".$prod['name']."</h3><p>Цена: ".$prod['price']."</p>
            <form action='' method='POST'>
                <input type='hidden' name='buy' value='".$prod['id']."'>
                <input type='submit' value='Купить'>
            </form>
            <p>".$prod['description']."</p>
        </figcaption>
    </figure>";
}
else {
    $products = mysqli_query($conn, "SELECT * FROM products");
    while ($prod = mysqli_fetch_assoc($products)) {
        $content .= "
        <div class='row'>
            <div class='col s12 m7'>
            <div class='card'>
                <div class='card-image'>
                <img src='" . CATALOG_IMAGES_PATH . "thumbnail/tn_" . $prod['image'] . "' width='200px'>
                <span class='card-title'>". $prod['name'] . "</span>
                <div class='card-buy'>
                    <form action='' method='POST'>
                        <input type='hidden' name='buy' value='".$prod['id']."'>
                        <button class='btn waves-effect waves-light center' type='submit'>Купить</button>
                    </form>
                </div>
                <span class='card-price'>Цена: <b>" . $prod['price'] . "</b> руб.</span>
                </div>
                <div class='card-content'>
                <p>Очень красивое краткое описание товара.</p>
                </div>
                <div class='card-action'>
                <a class='name' href='?mod=catalog&prod=" . $prod['id'] . "'>Подробнее</a>
                </div>
            </div>
            </div>
        </div>";
    }
}
