<?php 
require '../function.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM barang br,harga_barang hb 
where br.kode_barang = hb.kode_barang 
and hb.periode_awal <= '$hari'
and hb.periode_akhir >= '$hari' 
and nama_barang LIKE '%$keyword%'";
$data2 = query($query);
var_dump($data2);
die;
?> 


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