<?php 
require 'function.php';

$uang = $_GET["uangg"];
$data= query("SELECT b.*, a.namaBarang, a.hargaJual FROM nota b, barang a 
where a.id = b.id_barang");

?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <title></title>
  <style>
    /* .stroke {
      border: 1px solid black;
    } */

    .tengah {
      min-height: 550px;
    }

    .height {
      max-height: 300px;
    }

    .thumbnail {
      background-color: white;
      text-align: left;
      padding: 3px;
      width: 150px;
      margin: 4px auto;
      float: left;
    }
    .tengah2{
      padding: 4px;
      margin: 10px auto;
      width: 140px;
    }
    h2,th{
      text-align: center;
    }
    h2{
      padding-top:8px;
    }
    .isi{
      margin-left:5px;
      margin-right:5px;
      margin-top:5px;
      margin-bottom:5px;
      text-align:center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
    <div class="col-lg-12"><h1>Nota</h1></div>
  </div>
   
  <div class="row" >
    <div class="col-lg-6" >
    <table >
                            <thead>
                                <tr>
                                    <th scope="col" style="border-top: 1px solid black" class="text-center">no</th>
                                    <th scope="col" style="border-top: 1px solid black" class="text-center">Nama Barang</th>
                                    <th scope="col" style="border-top: 1px solid black" class="text-center">Harga</th>
                                    <th scope="col" style="border-top: 1px solid black" class="text-center">Jumlah</th>
                                    <th scope="col" style="border-top: 1px solid black" class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1 ; $total=0;
                                foreach($data as $row) :
                                    $total=$total+$row['JumlahBarang']*$row['hargaJual'];?>
                                <tr>
                                    <td class="text-center"><?= $nomor++ ?></td>
                                    <td class="text-center"><?= $row['namaBarang'] ?></td>
                                    <td class="text-center"><?= 'Rp.'.$row['hargaJual'] ?></td>
                                    <td class="text-center"><?= $row['JumlahBarang'] ?></td>
                                    <td class="text-center"><?= 'Rp.'.$row['JumlahBarang']*$row['hargaJual'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="col-md-1 mt-2 offset-md-3 h5"> Total: <?= $total; ?></div>
                        <div class="col-md-1 mt-2 offset-md-3 h5"> Bayar: <?= $uang; ?></div>
                        <div class="col-md-1 mt-2 offset-md-3 h5"> Kembali: <?= $uang-$total;?></div>
      </div>
    </div>
    <div class="row ">
      <div class="col-sm-12"></div>
    </div>
  </div>
  </body>

  <script>
    window.print();
    window.close();
  </script>
  
  </html>