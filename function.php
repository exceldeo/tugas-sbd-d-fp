<?php 

// koneksi ke mysql
$conn = mysqli_connect("localhost","root","","fp_sbd_d");

// mengambil satu-satu query di masukan ke array
function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);

  $rows=[];
  // echo mysqli_fetch_assoc($result);
  // var_dump( mysqli_fetch_assoc($result));
  // die;
  while($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
  }
  return $rows;
}

function idbesar(){

  $query = query("SELECT MAX(id_transaksi)
  FROM transaksi")[0];

  return $query["MAX(id_transaksi)"];
}

// fungsi tambah data
function tambah($data){
  global $conn;
  $kode=htmlspecialchars($data["kodeBrg"]);
  $nama=htmlspecialchars($data["namaBrg"]);
  $hargaB=$data["hargaB"];
  $hargaJ=$data["hargaJ"];
  $satuan = $data["satuan"];
  $kategori = $data["kategori"];
  $keterangan = htmlspecialchars($data["ket"]);
  $p_awal = $data["p_awal"];
  $p_awal = $data["p_awal"];
  // var_dump($data);
  // die;
  
  $query = "INSERT INTO barang value ('$kode','$nama','$satuan','$kategori','$keterangan')";
  $query2 = "INSERT INTO harga_barang value ('$kode','$hargaJ','$hargaB','$p_awal','$p_akhir')";
  // $query3 = "UPDATE";
  
  mysqli_query($conn,$query);
  mysqli_query($conn,$query2);

  return mysqli_affected_rows($conn);
}

function tambahnota($keyword,$jumlah,$besar){
    global $conn;
    $query = "SELECT * FROM barang WHERE kode_barang LIKE '$keyword'";  
    $data=query($query);
    if($data==[]){}
    else{
  
        foreach($data as $data){
          $kode=htmlspecialchars($data["kode_barang"]);
          $nama=htmlspecialchars($data["nama_barang"]);
        }
        $hari = date('Y-m-d');
        $data2= query("SELECT * FROM harga_barang hb 
          where '$kode' = hb.kode_barang 
          and hb.periode_awal <= '$hari'
          and hb.periode_akhir >= '$hari' ")[0];
  
        $datahj = $data2['harga_jual'];
        $datahb = $data2['harga_beli'];
  
        $query2="INSERT INTO detail_transaksi value ('','$besar','$kode','$jumlah','$datahj','$datahb')";
        mysqli_query($conn,$query2);
  
      }
  
    if(mysqli_affected_rows($conn)>0){
      echo ' <script>
      document.location.href="index.php";
      </script>';
    }
    else{
      echo ' <script>
      alert("Kode yang anda masukan salah");
      document.location.href="index.php";
      </script>';
    }
  }

function tambahnota2($id,$pel,$uang,$total){
  global $conn;

      $tanggal = date("Y-m-d");
      $waktu = date("h:i:s");

  $query="UPDATE transaksi SET 
      id_pelanggan = '$pel',
      total = '$total',
      bayar = '$uang',
      tanggal = '$tanggal',
      waktu = '$waktu'
      WHERE id_transaksi = '$id'
      ";
 
  mysqli_query($conn,$query);

 
  $query = "INSERT INTO transaksi value ('',1,1,0,0,'$tanggal','$waktu','')";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}

function tambahakun($data){
  global $conn;
  $username=htmlspecialchars($data["username"]);
  $pswd=htmlspecialchars($data["pswd"]);
  $nama=htmlspecialchars($data["namaU"]);
  $level=htmlspecialchars($data["level"]);
  // var_dump($data);
  // die;
  
  $query="INSERT INTO user value ('','$username','$pswd','$nama','$level')";
  
  mysqli_query($conn,$query);

  return mysqli_affected_rows($conn);
}

// fungsi hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM barang WHERE id = $id");
    // die;

    return mysqli_affected_rows($conn);
}

function hapusnota($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM detail_transaksi WHERE id_detail_transaksi = $id");
  // die;

  return mysqli_affected_rows($conn);
}


// fungsi cari
function cari($keyword){
  
  $query = "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'";
  // var_dump($query);
  return query($query); 
}


function cari2($keyword){

  $query = "SELECT * FROM transaksi tr,detail_transaksi dt, barang br
  WHERE tr.id_transaksi = dt.id_transaksi
  AND dt.kode_barang = br.kode_barang
  AND br.nama_barang LIKE '%$keyword%'";

  return query($query); 
}

function cari3($p_ak,$p_aw){

  $query = "SELECT * FROM transaksi tr,detail_transaksi dt, barang br
  WHERE tr.id_transaksi = dt.id_transaksi
  AND dt.kode_barang = br.kode_barang 
  AND '$p_aw' <= tr.tanggal 
  AND '$p_ak' >= tr.tanggal";

  return query($query); 
}

function cari4($keyword){

  $query = "SELECT * FROM barang br,harga_barang hb 
  where br.kode_barang = hb.kode_barang 
  AND br.nama_barang LIKE '%$keyword%'";

  return query($query); 
}