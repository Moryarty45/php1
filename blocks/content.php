<?php
include "engine/function.php";
for($i=2;$i<count($small_pic_files);$i++):?>
<div class="smallphoto">
    <a href='img/big/<?= $big_pic_files[$i]?>' target=_blank><img src="img/small/<?= $small_pic_files[$i]?>"></a>
</div>
<?php
    endfor;
?>