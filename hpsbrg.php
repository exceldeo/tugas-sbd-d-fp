<?php
require 'function.php';

$id=$_GET["id"];

if(hapus($id)>0){
    echo ' <script>
    alert("data berhasil di dihapus");
    document.location.href="tampildatabase.php";
    </script>';
  }
  else{
    echo ' <script>
    alert("data gagal di dihapus");
    document.location.href="tampildatabase.php";
    </script>';
  }