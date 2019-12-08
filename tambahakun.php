<?php 
include 'function.php';

if(isset($_POST['submit'])){
    
  if(tambahakun($_POST)>0){
    echo ' <script>
    alert("akun berhasil di tambahkan");
    document.location.href="tambahakun.php";
    </script>';
  }
  else{
    echo ' <script>
    alert("akun gagal di tambahkan");
    document.location.href="tambahakun.php";
    </script>';
  }
}
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
                <li>
                    <a href="laporanpenjualan.php">Laporan Penjualan</a>
                </li>
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
                        <p class="display-3 text-center" style="">Tambah Akun</p>
                    </div>
                    <div class="col-lg-4 "></div>
                </div>
                <!-- end nav  -->

                <!-- start content -->
                <div class="row" style="margin-top:50px">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                    <form method="post">
                        <div class="form-group row">
                            <label for="username" class="col-lg-2">Username: </label>
                            <div class="col-lg-10">
                            <input type="text" id="username" class="form-control" name="username" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pswd" class="col-lg-2">Password: </label>
                            <div class="col-lg-10">
                            <input type="password" id="pswd" class="form-control" name="pswd" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaU" class="col-lg-2">Nama: </label>
                            <div class="col-lg-10">
                            <input type="text" id="namaU" class="form-control" name="namaU" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 ">
                            <select name="level" class="custom-select-lg ">
                                <option selected>Akses Akun</option>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                            </select>  
                            </div> 
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- end content -->

                <!-- footer -->
                <div class="row">
                    <div class="col-lg-12 ">footer</div>
                </div>
                <!-- end footer  -->

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

</body>

</html>
