<?php

$content = file_get_contents('http://www.thomas-bayer.com/sqlrest/CUSTOMER/');

$obj=simplexml_load_string($content,true);

?>
<?php foreach ($obj as $key => $value) :?>
   # code...

  <?php var_dump($obj); die(); ?>
<div>
<tr>
<td> <?=$value["userId"] ?></td>
<td> <?=$value["title"] ?></td>
<td> <?=$value["body"] ?></td>
</tr>
</div>

<?php endif; ?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$content = file_get_contents('http://www.thomas-bayer.com/sqlrest/CUSTOMER/');

$obj=simplexml_load_string($content);
// var_dump($obj);
// die();
?>
<?php foreach ($obj as $key => $value) :?>
   # code...


<div>
<tr>
<td><?= $value ?></td>
</tr>
</div>

<?php endforeach; ?>
