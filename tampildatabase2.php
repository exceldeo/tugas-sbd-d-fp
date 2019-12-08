<?php 
require 'function.php';

$data= query("SELECT * FROM barang");

if(isset($_POST['tmbl_cari'])){
    $data = cari($_POST['keyword']);
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

            <div class="container-fluid">


                <!-- fungsi search -->
                        <form action="" method="post">
                <div class="row" >
                            <label for="keyword" class=" col-sm-1">
                                <p>Cari Barang: </p>
                            </label>
                    <div class="col-sm-4 ">
                            <input type="text" name="keyword" id="myInput" placeholder="Masukan Nama Barang"
                                class="form-control" autofocus autocomplete="off" >
                    </div>
                    <!-- <div class="col-sm-1 mt-1 mb-1" >
                            <button type="submit" class="btn btn-primary" name="tmbl_cari">Cari</button>
                            </div> -->
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
                                    <th scope="col" class="text-center">Kode Barang</th>
                                    <th scope="col" class="text-center">Nama Barang</th>
                                    <th scope="col" class="text-center">Harga</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                foreach($data as $row) :?>
                                <tr >
                                    <td class="text-center"><?= $row['kodeBarang'] ?></td>
                                    <td class="text-center"><?= $row['namaBarang'] ?></td>
                                    <td class="text-center"><?= "Rp.".$row['hargaJual'] ?></td>
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