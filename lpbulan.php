<?php 
require 'function.php';

$data= query("SELECT month(tr.tanggal) as 'bulan', SUM(dt.harga_jual*dt.jumlah_transaksi)-SUM(dt.harga_beli*dt.jumlah_transaksi) as 'untung' FROM transaksi tr,detail_transaksi dt, barang br WHERE tr.id_transaksi = dt.id_transaksi AND dt.kode_barang = br.kode_barang GROUP by month(tr.tanggal)");

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
<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>


  <title>Kasir</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">KasirExcel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link" href="#">Tambah Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="laporanpenjualan.php">Laporan Penjualan</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="lptanggal.php">Keuntungan</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="tred.php">Tred</a>
      </li> 
    </ul>
      <div class="nav-item">
        <a class="nav-link" href="#">Tambah Akun</a>
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
        <p class="display-3 text-center">Laporan Keuntungan</p>
      </div>
      <div class="col-lg-3 "></div>
    </div>
    <!-- end nav  -->
    
    <!-- fungsi search -->
    <div class="row">
    <div class="col-12">
    <div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="lptanggal.php">tanggal</a>
    <a href="lpbulan.php">bulan</a>
    <a href="lptahun.php">tahun</a>
  </div>
</div>
    </div>
    </div>
    


    <!-- end search -->  
    
    <!-- start content -->
    
    <div class="row mt-3">
      <div class="col-lg-12 " style="border:3px solid rgba(0,0,0,0.2)">
        <!-- tabel -->
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="text-center">Bulan</th>
              <th scope="col" class="text-center">Untung</th>
          </thead>
          <tbody>
            <?php
            foreach($data as $row) :?>
            <tr>
              <td class="text-center"><?= $row['bulan'] ?></td>
              <td class="text-center"><?="Rp.".$row['untung'] ?></td>
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