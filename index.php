<?php 
require 'function.php';
$total=0;
$hari = date('Y-m-d');

$besar = idbesar();

$data= query("SELECT * FROM detail_transaksi dt, barang br 
where  dt.id_transaksi = '$besar'
and dt.kode_barang = br.kode_barang");
// var_dump($data);
// die;

if(isset($_POST['tmblTmbh'])){
    $data = tambahnota($_POST['kode'],$_POST['jumlah'],$besar);

}


$data2= query("SELECT * FROM barang br,harga_barang hb 
where br.kode_barang = hb.kode_barang 
and hb.periode_awal <= '$hari'
and hb.periode_akhir >= '$hari' ");

$data3= query("SELECT nama_pelanggan,id_pelanggan 
FROM pelanggan");

?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>Home</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
</style>
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
          <a class="nav-link" href="#">Tambah Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="laporanpenjualan.php">Laporan Penjualan</a>
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
  <div id="page-content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <!-- kasir kiri  -->
        <div class="col-5 ">
          <div class="row  mb-3 pt-2">
            <div class="col-6 stroke">
              <div class="" style="font-size:20pt;">Sumber Kencono</div>
              <div class="text-capitalize" style="font-size:10pt">jalan a yani 157 Nganjuk<br>no telepon (0354-321505)
              </div>
            </div>
          </div>
          <!-- database kiri  -->
          <div class="row pt-2">
            <div class="col-4">Pelanggan : </div>
            <div class="col-6">
              <form action="tambahnota.php" method="post">
                <select>
                  <option id="pelanggan" name="pelanggan" value="<?=NULL?>">...</option>
                  <?php
                              foreach($data3 as $row3) :?>
                  <option id="pelanggan" name="pelanggan" value="<?=$row3['id_pelanggan']?>">
                    <?=$row3['nama_pelanggan']?></option>
                  <?php endforeach?>
                </select>
              </form>
            </div>
          </div>
          <div class="row stroke pt-1">
            <div class="col-12  " style="overflow:scroll; height:530px">
              <!--blablabla-->
              <form action="" method="post">
                <div class="row pb-3">
                  <label for="keyword" class="col-4 mt-3" style="font-size:12pt">Cari Barang:</label>
                  <div class="col-6 mt-2">
                    <input type="text" class="visible form-control" name="keyword" id="keyword"
                      placeholder="Masukan Nama Barang" autocomplete="off">
                  </div>
                </div>
              </form>
              <div class="row mt-2">
                <div class="col-12 ">
                  <div id="diganti">
                    <table class="table table-bordered table-sm">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">Kode Barang</th>
                          <th scope="col" class="text-center">Nama Barang</th>
                          <th scope="col" class="text-center">Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                    foreach($data2 as $row2) :?>
                        <tr>
                          <td class="text-center "><?= $row2['kode_barang'] ?></td>
                          <td class="text-center "><?= $row2['nama_barang'] ?></td>
                          <td class="text-center"><?= "Rp.".$row2['harga_jual'] ?></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--blablabla1-->
            </div>
          </div>
          <!-- end data base kiri  -->
        </div>
        <!-- kasir kanan -->
        <div class="col-7 stroke">
          <!-- nota mulai -->

          <form method="post">
            <div class="row">
              <!-- <div style="margin-bottom:10px;height:30px;padding;5px;"> -->
              <div class="col-2 pt-3 "><label class="h4" for="kode">Kode Barang</label></div>
              <div class="col-3 pt-3">
                <input type="text" name="kode" id="kode" class="form-control" autofocus>
              </div>
              <div class="col-2 pt-3"><label class="h4" for="jumlah">Jumlah</label> </div>
              <div class="col-2 pt-3">
                <input type="number" class="form-control" name="jumlah" id="jumlah" min="0" value="1">
              </div>
              <div class="col-3 pl-5 pt-3">
                <button type="submit" class="btn btn-primary " name="tmblTmbh">Tambah</button>
              </div>
              <!-- <div class="col-lg-12 text-center stroke">tambah barang</div> -->
              <!-- </div> -->
            </div>
          </form>
          <div class="row">
            <div class="col-lg-12 text-center" style="margin-bottom:10px; height:380px;overflow:scroll;">
              <!-- tabel -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">no</th>
                    <th scope="col" class="text-center">Nama Barang</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    <th scope="col" class="text-center">Total</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1 ;
                                    foreach($data as $row) :
                                        $total=$total+$row['jumlah_transaksi']*$row['harga_jual']?>
                  <tr>
                    <td class="text-center"><?= $nomor++ ?></td>
                    <td class="text-center"><?= $row['nama_barang'] ?></td>
                    <td class="text-center"><?= 'Rp.'.$row['harga_jual'] ?></td>
                    <td class="text-center"><?= $row['jumlah_transaksi'] ?></td>
                    <td class="text-center"><?= 'Rp.'.$row['jumlah_transaksi']*$row['harga_jual'] ?></td>
                    <td class="text-center">
                      <form method="get">
                        <a href="hpsnota.php?id=<?= $row['id_detail_transaksi'];?>" class="btn btn-danger" role="button"
                          onclick="return confirm('data ingin di hapus?');">Hapus</a>
                      </form>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <form action="" name="frm_byr">
            <div class="row justify-content-end form-group">
              <label class="col-1 col-form-label" for="totall">Total:</label>
              <div class="col-4 ml-1">
                <form action="tambahnota.php" method="post">
                  <input name="total" class="form-control" onfocus="startCalculate()" onblur="stopCalc()" readonly
                    value="<?=$total;?>" type="number" id="totall">
              </div>
            </div>
            <form action="tambah.nota" method="post">

              <div class="row justify-content-end form-group">
                <label class="col-1 col-form-label" for="uangg">Bayar:</label>
                <div class="col-4 ml-1">
                  <input name="uang" class="form-control" onfocus="startCalculate()" onblur="stopCalc()" type="number"
                    id="uangg">
                </div>
              </div>
              <div class="row justify-content-end form-group">
                <label class="col-1 col-form-label" for="kembalii">Kembali:</label>
                <div class="col-4 ml-1">
                  <input class="form-control" id="kembalii" onfocus="startCalculate()" onblur="stopCalc()" type="number"
                    readonly>
                </div>
              </div>
              <div class="row pb-1">
                <input type="hidden" for="id" name="id" value="<?=$besar?>">
                <a href="tambahnota.php" style="height:50px;" class="btn btn-success btn-block">
                  <h4>Bayar</h4></a>
            </form>
          </form>
        </div>
      </div>
    </div>
    <!-- end kasir kanan -->
  </div>





  <script>
    function startCalculate() {
      interval = setInterval("Calculate()", 1);
    }

    function Calculate() {
      var b = document.frm_byr.totall.value;
      var d = document.frm_byr.uangg.value;
      var h = (d - b);
      document.frm_byr.kembalii.value = (h);
      var hasil;
      hasil = (g);
      var bilangan = (g);
      var number_string = bilangan.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById("hasil").innerHTML = rupiah;
    }

    function stopCalc() {
      clearInterval(interval);
    }
  </script>

  <script src="asset/js/jquery.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="js/ajax.js"></script>


</body>

</html>