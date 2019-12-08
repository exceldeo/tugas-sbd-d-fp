<?php
require 'function.php';

if(laporan()>0){
    
    if(hapussemua()>0){
        echo ' <script>
        document.location.href="index.php";
        </script>';
    }
}
else{
    echo ' <script>
        alert("Nota Kosong!");
        document.location.href="index.php";
        </script>';
}
