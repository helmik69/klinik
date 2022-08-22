<?php
include "config/config.php";

$nama  = $_POST['nama'];
$nik  = $_POST['nik'];
$email  = $_POST['email'];
$no_hp = $_POST['no_hp'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$password1  = md5($password);
$jk  = $_POST['jk'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$alamat  = $_POST['alamat'];
$jenis_pasien  = $_POST['jenis_pasien'];
$no_bpjs  = $_POST['no_bpjs'];
$verif=$_POST['verif']?$_POST['verif']:'';


$tampil=mysqli_query($conn,"select * from pasien ") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);

while($data = mysqli_fetch_array($tampil)){
$nik1= $data['nik'];

if($verif=='yes' && $nik != $nik1 ){
    // echo "abc";
    $query="INSERT INTO pasien (nama, nik, email, no_hp, username, password, jk, tempat_lahir, tanggal_lahir, alamat, jenis_pasien, no_bpjs, password_hint) VALUES ('$nama', '$nik', '$email', '$no_hp','$username', '$password1', '$jk', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jenis_pasien', '$no_bpjs','$password')";
    $update=mysqli_query($conn,$query) or die (mysqli_error($conn));
    if($update){
        echo "<script>alert('Kamu berhasil daftar, silahkan login untuk melanjutkan pendaftaran');window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('Pendaftaran kamu gagal, harap periksa kembali data yang diinput');window.location.href='index.php'</script>";  
    }
}else{
     // echo "123";
     echo "<script>alert('NIK sudah terdaftar harap input data yang baru');window.location.href='index.php'</script>"; 
    }

}


?>