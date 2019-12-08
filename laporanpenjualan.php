<?php 
require 'function.php';

$data= query("SELECT * FROM transaksi tr,detail_transaksi dt, barang br
WHERE tr.id_transaksi = dt.id_transaksi
AND dt.kode_barang = br.kode_barang");

if(isset($_POST['tmbl_cari'])){

    $data = cari2($_POST['keyword']);
}
if(isset($_POST['tmbl_cari2'])){

  $data = cari3($_POST['p_ak'],$_POST['p_aw']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <title>Kasir</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">KasirExcel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Kasir <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampildatabase.php">Daftar Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambahbrg.php">Tambah Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="laporanpenjualan.php">Laporan Penjualan</a>
        </li>
      </ul>

      <div class="nav-item">
        <a class="nav-link" href="tambahakun.php">Tambah Akun</a>
      </div>
      <div class="nav-item">
        <a class="nav-link" href="login.php">Keluar Akun</a>
      </div>

    </div>
  </nav>
  
  
  <!-- Page Content -->
      <div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 ">
      </div>
      <div class="col-lg-6 ">
        <p class="display-3 text-center">Laporan Penjualan</p>
      </div>
      <div class="col-lg-3 "></div>
    </div>
    <!-- end nav  -->
    
    <!-- fungsi search -->
    <form action="" method="post">
      <div class="row mt-3 mb-2">
        <label for="keyword" class="ml-3 col-sm-1 ">
          <p>Cari Barang: </p>
        </label>
        <div class="col-sm-3 ">
          <input type="text" name="keyword" id="keyword" placeholder="Masukan Nama Barang" size="30"
          class="form-control " autofocus autocomplete="off">
        </div>
        <div class="col-sm-1 ">
          <button type="submit" class="btn btn-primary" name="tmbl_cari">Cari</button>
        </div>
        <div class="col-sm-2 ">
          <input name="p_aw" class="form-control" type="date">
        </div>
        <div class="col-sm-2 ">
          <input name="p_ak" class="form-control" type="date">
        </div>
        <div class="col-sm-1 ">
          <button type="submit" class="btn btn-primary" name="tmbl_cari2">Cari</button>
        </div>
        <div class="col-sm-1 ">
          <button type="submit" class="btn btn-danger" name="tmbl_cari">Reset</button>
        </div>
      </div>
    </form>


    <!-- end search -->  
    
    <!-- start content -->
    
    <div class="row">
      <div class="col-lg-12 " style="border:3px solid rgba(0,0,0,0.2)">
        <!-- tabel -->
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="text-center">no</th>
              <th scope="col" class="text-center">Nama Barang</th>
              <th scope="col" class="text-center">Harga Beli</th>
              <th scope="col" class="text-center">Harga Jual</th>
              <th scope="col" class="text-center">jumlah</th>
              <th scope="col" class="text-center">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $nomor = 1 ;
            foreach($data as $row) :?>
            <tr>
              <td class="text-center"><?= $nomor++ ?></td>
              <td class="text-center"><?= $row['nama_barang'] ?></td>
              <td class="text-center"><?= "Rp.".$row['harga_jual'] ?></td>
              <td class="text-center"><?= "Rp.".$row['harga_beli'] ?></td>
              <td class="text-center"><?= $row['jumlah_transaksi'] ?></td>
              <td class="text-center"><?= $row['tanggal'] ?></td>
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


  <script src="asset/js/jquery.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>

</body>

</html>