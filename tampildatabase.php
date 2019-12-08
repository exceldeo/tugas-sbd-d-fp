<?php 
require 'function.php';

$data= query("SELECT * FROM barang");

if(isset($_POST['tmbl_cari'])){
    $data = cari($_POST['keyword']);
}
$coba = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" href="img/logo2.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="asset/css/simple-sidebar.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- <style>
    .tmbl-ramping {
    /* height: 30px; */
    width: 50px;
    padding: 4px;
    margin: 10px auto;
}
</style> -->

    <title>Kasir</title>
</head>

<body>

            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                <li class="sidebar-brand">
                <a href="index.php">
                    KasirExcel
                </a>
                </li>
                <li>
                    <a href="index.php">Mesin kasir</a>
                </li>
                <li>
                    <a href="tampildatabase.php">Daftar Barang</a>
                </li>
                <li>
                    <a href="tambahbrg.php">Tambah Barang</a>
                </li>
                <li>
                    <a href="laporanpenjualan.php">Laporan Penjualan</a>
                </li>
                
                <?php if($coba == false):?>
                <li>
                    <a href="tambahakun.php">Tambah Akun</a>
                </li>
                <?php endif ?>
                <?php if($coba == false):?>
                <li>
                    <a href="login.php">Keluar Akun</a>
                </li>
                <?php endif ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <!-- start nav -->
                <div class="row ">
                    <div class="col-lg-4 " style="padding-top:15px;">
                        <a href="#menu-toggle" class="btn btn-toolbar btn-default fas fa-bars"
                            style="width:40px;height:30px;" id="menu-toggle"></a>
                    </div>
                    <div class="col-lg-4 ">
                        <p class="display-3 text-center" style="">Daftar Barang</p>
                    </div>
                    <div class="col-lg-4 "></div>
                </div>
                <!-- end nav  -->

                <!-- fungsi search -->
                        <form action="" method="post">
                <div class="row" >
                            <label for="keyword" class=" col-sm-1" style="margin-top:25px;">
                                <p>Cari Barang: </p>
                            </label>
                    <div class="col-sm-4 ">
                            <input type="text" name="keyword" placeholder="Masukan Nama Barang" size="30"
                                class="form-control" id="myInput" autofocus autocomplete="off" style="margin-top:30px;">
                    </div>
                   <!-- <div class="col-sm-1 " >
                            <button type="submit" class="btn btn-primary tmbl-ramping" name="tmbl_cari">Cari</button>
                            </div>-->
                            </div>
                        </form>
                <!-- end search -->

                <!-- start content -->
                <div class="row">
                    <div class="col-lg-12 " style="border:3px solid rgba(0,0,0,0.2)"> 
                        <!-- tabel -->
                        <table class="table">
                            <!-- <caption>Daftar Barang</caption> -->
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">no</th>
                                    <th scope="col" class="text-center">Kode Barang</th>
                                    <th scope="col" class="text-center">Nama Barang</th>
                                    <th scope="col" class="text-center">Harga Beli</th>
                                    <th scope="col" class="text-center">Harga Jual</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                                <tbody id="myTable">
                                <?php
                                $nomor = 1;
                                foreach($data as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $nomor++ ?></td>
                                    <td class="text-center"><?= $row['kodeBarang'] ?></td>
                                    <td class="text-center"><?= $row['namaBarang'] ?></td>
                                    <td class="text-center"><?= "Rp.".$row['hargaBeli'] ?></td>
                                    <td class="text-center"><?= "Rp.".$row['hargaJual'] ?></td>
                                    <td class="text-center">
                                    <form action="" method="get">
                                        <a href="ubahbrg.php?id=<?= $row['id'];?>" class="btn btn-primary" role="button">Ubah</a>
                                        <a href="hpsbrg.php?id=<?= $row['id'];?>" class="btn btn-danger" 
                                        role="button" onclick="return confirm('data ingin di hapus?');">Hapus</a>
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content -->

                <!-- footer -->
                <div class="row">
                    <div class="col-lg-12"></div>
                </div>
                <!-- end footer  -->

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>

</html>