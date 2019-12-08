<?php 
require 'function.php';

$coba = true;

$data= query("SELECT b.*, a.namaBarang, a.hargaJual FROM nota b, barang a 
where a.id = b.id_barang");
if(isset($_POST['tmblTmbh'])){
    $data = tambahnota($_POST['kode'],$_POST['jumlah']);
}
$total=0;

$data2= query("SELECT * FROM barang");

// echo $data;
// var_dump($data);
// die;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Kasir</title>
</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="akunprofile.php">
                        Profile
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
                <?php if($coba == true):?>
                <li>
                    <a href="laporanpenjualan.php">Laporan Penjualan</a>
                </li>
                    
                <?php endif ?>
                <li>
                    <a href="tambahakun.php">Tambah Akun</a>
                </li>
                <li>
                    <a href="login.php">Keluar Akun</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <!-- start nav -->
                <div class="row ">
                    <div class="col-lg-4 " style="padding-top:15px;">
                        <a href="#menu-toggle" class="btn btn-toolbar btn-default fas fa-bars" style="width:40px;height:30px;" id="menu-toggle"></a>
                    </div>
                    <div class="col-lg-4 ">
                        <p class="display-3 text-center" style="">Aplikasi Kasir</p>
                    </div>
                    <div class="col-lg-4 "></div>
                </div>
                <!-- end nav  -->

                <!-- start content -->
                <div class="row" >
                    <div class="col-lg-12 " >
                        <div class="row mb-3" style="height: 150px">
                            <div class="col-lg-3 stroke  pt-1" >
                                <div class="" style="font-size:20pt;">Sumber Kencono</div>
                                    <div class="text-capitalize" style="font-size:10pt">jalan a yani 157 Nganjuk<br>no telepon (0354-321505) </div>
                                </div>
                                <div class="col-lg-5 mx-auto  stroke " style="overflow:scroll; max-height:150px;">
                                <!--blablabla-->
                                    <form action="" method="post">
                <div class="row" >
                            <label for="keyword" class=" col-3 mt-3">Cari Barang:</label>
                    <div class="col-6 mt-2">
                            <input type="text" class="visible" name="keyword" id="keyword" placeholder="Masukan Nama Barang"
                                 autocomplete="off" >
                    </div>
                   </div>
                        </form>
                        <div class="row">
                    <div class="col-12 stroke"> 
                    <div id="diganti">
                        <table style="width:100%">
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
                                <tr class="mt-3">
                                    <td class="text-center "><?= $row2['kodeBarang'] ?></td>
                                    <td class="text-center "><?= $row2['namaBarang'] ?></td>
                                    <td class="text-center"><?= "Rp.".$row2['hargaJual'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                                </div>
                    </div>
                </div>
                                    <!--blablabla1-->
                                </div>
                                <div class="col-lg-3 text-center mx-auto pt-1" >
                                    <div style="font-size:24pt" id="totall">Total</div>
                                    <?php foreach($data as $row2) { $total=$total+$row2['JumlahBarang']*$row2['hargaJual'];}?>
                                    <input type="text" name="" id="" readonly style="height:80px; width:250px; font-size:28pt;text-align:center;" value="<?='Rp.'.$total;?>">
                            </div>
                        </div>

                            <form method="post">
                        <div class="row mb-4" >
                        <!-- <div style="margin-bottom:10px;height:30px;padding;5px;"> -->
                            <div class="col-2 "><label class="h4" for="kode">Kode Barang</label> </div>
                            <div class="col-3 pt-1">
                            <input type="text" name="kode" id="kode"
                                class="form-control" autofocus >
                            </div>
                            <div class="col-1 pl-5 pt-1">
                            <a href="#" onclick="tampilkan_nilai_form();" class="btn btn-primary" role="button" name="tmblCari">Cari</a>
                            </div>
                            <div class="col-1 pt-1"><label class="h4" for="jumlah">Jumlah</label> </div>
                            <div class="col-2 pt-1">
                            <input type="number" class="form-control" name="jumlah" id="jumlah" min="0" value="1">
                            </div>
                            <div class="col-3 pl-5 pt-1">
                            <button type="submit" class="btn btn-primary " name="tmblTmbh">Tambah</button>
                            </div>
                            <!-- <div class="col-lg-12 text-center stroke">tambah barang</div> -->
                            <!-- </div> -->
                        </div>
                            </form>
                        <div class="row">
                            <div class="col-lg-12 text-center"  style="margin-bottom:10px; height:300px;overflow:scroll;">
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
                                <?php
                                $nomor = 1 ;
                                foreach($data as $row) :?>
                                <tr>
                                    <td class="text-center"><?= $nomor++ ?></td>
                                    <td class="text-center"><?= $row['namaBarang'] ?></td>
                                    <td class="text-center"><?= 'Rp.'.$row['hargaJual'] ?></td>
                                    <td class="text-center"><?= $row['JumlahBarang'] ?></td>
                                    <td class="text-center"><?= 'Rp.'.$row['JumlahBarang']*$row['hargaJual'] ?></td>
                                    <td class="text-center">
                                    <form method="get">
                                        <a href="hpsnota.php?id=<?= $row['id_nota'];?>" class="btn btn-danger" 
                                        role="button" onclick="return confirm('data ingin di hapus?');">Hapus</a>
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                            </div>
                        </div>
                        <!-- isi nota -->
                        <div class="row justify-content-end " style="height:100px;">
                            <!-- <div class="pt-4  col-lg-8 text-center "> -->
                           <!-- <label for="uang" style="font-size:24pt;">Uang:  </label>
                            <input type="number" size="50" name="uang" id="uang" min="0" value="0" autocomplete="off" style="text-align:center;min-width:400px;height:50px;font-size:24pt;"></div> -->
                            <div class="col-lg-4 pt-2  text-center">
                            <a class="btn btn-success btn-lg" onclick="printnota()" href="#" role="button" style="font-size:24pt;width:200px;">Bayar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script>
 
 function tampilkan_nilai_form(){
     newWindow = window.open("http://localhost/kasirexcel/tampildatabase2.php", "Jendela Baru", "left=20px,top=100px,width=400px, height=400px");
 }
 </script>
 <script src="js/ajax.js"></script>
 <script>
    function printnota(){
    window.open("http://localhost/kasirexcel/print.php", "printnota", "");
    document.location.href="hpssemua.php";
    window.close();
    }
  </script>


</body>

</html>
