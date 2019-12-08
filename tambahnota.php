<?php
require 'function.php';

$id = $_POST['id'];
$pel = $_POST['pelanggan'];
$uang = $_POST['uang'];
$total= $_POST['total'];


if(tambahnota2($id,$pel,$uang,$total)>0){
     echo ' <script>
        document.location.href="index.php";
      </script>';
 }

 else
 echo 'gagal';

