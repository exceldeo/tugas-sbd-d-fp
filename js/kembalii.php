<?php 
$uang = $_GET["uang"];
$total = $_GET['totall'];
var_dump($uang);
var_dump($total);
die;
$kembali = $uang - $total;

?> 

<input class="form-control" type="number" readonly value="<?=$kembali;?>">