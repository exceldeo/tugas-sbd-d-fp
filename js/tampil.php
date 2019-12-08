<?php 
require '../function.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM barang WHERE namaBarang LIKE '%$keyword%'";
$data2 = query($query);
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
                                <tr class="mt-3">
                                    <td class="text-center "><?= $row2['kodeBarang'] ?></td>
                                    <td class="text-center "><?= $row2['namaBarang'] ?></td>
                                    <td class="text-center"><?= "Rp.".$row2['hargaJual'] ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>