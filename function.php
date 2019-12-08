<?php 

// koneksi ke mysql
$conn = mysqli_connect("localhost","root","","kasirexcel");

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

// fungsi tambah data
function tambah($data){
  global $conn;
  $kode=htmlspecialchars($data["kodeBrg"]);
  $nama=htmlspecialchars($data["namaBrg"]);
  $hargaB=$data["hargaB"];
  $hargaJ=$data["hargaJ"];
  // var_dump($data);
  // die;
  
  $query="INSERT INTO barang value ('','$kode','$nama','$hargaB','$hargaJ')";
  
  mysqli_query($conn,$query);

  return mysqli_affected_rows($conn);
}

function tambahnota($keyword,$jumlah){
  global $conn;
  $query = "SELECT * FROM barang WHERE kodeBarang LIKE '$keyword'";  
  $data=query($query);
  if($data==[]){}
  else{

      foreach($data as $data){
        $id=$data['id'];
        $kode=htmlspecialchars($data["kodeBarang"]);
        $nama=htmlspecialchars($data["namaBarang"]);
      }
      $jumlah2=$jumlah;
      
      $query2="INSERT INTO nota value ('','$id','$jumlah')";
      
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

function upload(){
  $nama_file = $_FILES['file']['name'];
  $ukuran_file = $_FILES['file']['size'];
  $error = $_FILES['file']['error'];
  $tmpFile = $_FILES['file']['tmp_name'];

// jika tidak ada gambar yang di upload
  if($error == 4){

  }

  $ekstensi_file_valid = ['jpg','jpeg','png'];
  $ekstensi_file = explode('.',$nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  // mencari ektesi file
  if(!in_array($ekstensi_file,$ekstensi_file_valid)){
    echo ' <script>
    alert("yang anda upload bukan gambar");
    document.location.href="tampildata.php";
    </script>';
    return false;
  }
  // bikin random nama
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;

  move_uploaded_file($tmpFile,'img/'.$nama_file_baru);
// var_dump($nama_file);
// die;
  return $nama_file_baru;
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
  mysqli_query($conn,"DELETE FROM nota WHERE id_nota = $id");
  // die;

  return mysqli_affected_rows($conn);
}

// fungsi ubah data
function ubah($data){
  global $conn;
  $id=$data['id'];
  $kode=htmlspecialchars($data["kodeBrg"]);
  $nama=htmlspecialchars($data["namaBrg"]);
  $hargaB=$data["hargaB"];
  $hargaJ=$data["hargaJ"];

  $query="UPDATE barang SET 
      kodeBarang = '$kode',
      namaBarang = '$nama',
      hargaBeli='$hargaB',
      hargaJual='$hargaJ'
      WHERE id=$id
      ";
  
  mysqli_query($conn,$query);

  return mysqli_affected_rows($conn);
}

// fungsi cari
function cari($keyword){
  
  $query = "SELECT * FROM barang WHERE namaBarang LIKE '%$keyword%'";
  // var_dump($query);
  return query($query); 
}


function pesan($data){
  global $conn;
  $id=$data;

  // var_dump($query);
  // die;
  
  $query="INSERT INTO nota value ('$id')";
  
  mysqli_query($conn,$query);
}

function pesanhapus($id){
  global $conn;

  mysqli_query($conn,"DELETE FROM nota WHERE id = $id");
  

  return mysqli_affected_rows($conn);
}

function hapussemua(){
  global $conn;
  mysqli_query($conn,"DELETE FROM nota");

  return mysqli_affected_rows($conn);
}

function laporan(){
  global $conn;

  // $data=query("SELECT * FROM nota");
  $date=date('d-m-Y');
  // $date = now();
  // var_dump($date); 
  // echo $date;
  // die;
  $data2= query("SELECT b.*,a.namaBarang, a.hargaJual,a.hargaBeli FROM nota b, barang a 
where a.id = b.id_barang");
foreach($data2 as $row) {

  $namaB=$row['namaBarang'];
  $hrgJ=intval($row['hargaJual']);
  $hrgB=intval($row['hargaBeli']);
  $jml=intval($row['JumlahBarang']);

  // var_dump($namaB);
  // var_dump($hrgJ);
  // var_dump($hrgB);
  // var_dump($jml);
  // var_dump($date);
  // die;
  mysqli_query($conn,"INSERT INTO laporan value('$namaB','$hrgJ','$hrgB','$jml','$date')");
}
// echo mysqli_affected_rows($conn);
// die;
  return mysqli_affected_rows($conn);
}

function cari2($keyword){
  
  $query = "SELECT * FROM laporan WHERE NamaBrg LIKE '%$keyword%' OR tgl LIKE '%$keyword%'";
  // var_dump($query);
  return query($query); 
}