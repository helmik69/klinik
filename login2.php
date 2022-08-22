<?php
session_start();
include 'config/config.php';
$id=mysqli_real_escape_string($conn,$_GET['id']);

$data2 = mysqli_query($conn, "SELECT * from pasien where id='$id'");



$cek2 = mysqli_num_rows($data2);


 if ($cek2 > 0) {
      list($id,$nama,$nik,$email,$jk,$tempat_lahir,$tanggal_lahir,$alamat,$jenis_pasien,$no_bpjs,$username,$password_hint) = mysqli_fetch_array(mysqli_query($conn, "SELECT id,nama,nik,email,jk,tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs,username,password_hint FROM pasien WHERE id='$id'"));
      $_SESSION ['id'] = $id;
      $_SESSION ['nama'] = $nama;
      $_SESSION ['nik'] = $nik;
      $_SESSION ['email'] = $email;
      $_SESSION ['jk'] = $jk;
      $_SESSION ['tempat_lahir'] = $tempat_lahir;
      $_SESSION ['tanggal_lahir'] = $tanggal_lahir;
      $_SESSION ['alamat'] = $alamat;
      $_SESSION ['jenis_pasien'] = $jenis_pasien;
      $_SESSION ['no_bpjs'] = $no_bpjs;
      $_SESSION ['username'] = $username;
      $_SESSION ['password_hint'] = $password_hint;
      $_SESSION ['status'] = "login";

      header ("location:pasien/index.php?page=home");
  }
  else {
      header ("location:index.php?pesan=gagal");
      
  }
?>
