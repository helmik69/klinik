<?php
session_start();
include "config/config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);



$data = mysqli_query($conn, "SELECT * from user where username='$username' and password='$password'");


$data2 = mysqli_query($conn, "SELECT * from pasien where username='$username' and password='$password'");


$data3 = mysqli_query($conn, "SELECT * from dokter where username='$username' and password='$password'");

// list($akses, $id) = mysqli_fetch_array(mysqli_query($conn, "SELECT akses,password_hint, id FROM user WHERE username='$username'"));
$cek = mysqli_num_rows($data);
$cek2 = mysqli_num_rows($data2);
$cek3 = mysqli_num_rows($data3);


if ($cek > 0) {
  list($id,$nama,$username,$level,$password_hint,$no_hp) = mysqli_fetch_array(mysqli_query($conn, "SELECT id, nama, username, level, password_hint, no_hp FROM user WHERE username='$username'"));
    $_SESSION ['id'] = $id;
    $_SESSION ['nama'] = $nama;
    $_SESSION ['username'] = $username;
    $_SESSION ['level'] = $level;
    $_SESSION ['password_hint'] = $password_hint;
    $_SESSION ['no_hp'] = $no_hp;
    $_SESSION ['status'] = "login";

    if ($level=='admin') {
        header ("location:admin/index2.php?page=home");
    }else if ($level=='dokter') {
        header ("location:dokter/index.php?page=home");
    }else if ($level=='apoteker') {
        header ("location:apoteker/index.php?page=home");
    }else if ($level=='pendaftaran') {
        header ("location:pendaftaran/index.php?page=home");
    }else if ($level=='pimpinan') {
        header ("location:pimpinan/index.php?page=home");
    }
}else if ($cek2 > 0) {
    list($id,$nama,$nik,$email,$jk,$tempat_lahir,$tanggal_lahir,$alamat,$jenis_pasien,$no_bpjs,$username,$password_hint) = mysqli_fetch_array(mysqli_query($conn, "SELECT id,nama,nik,email,jk,tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs,username,password_hint FROM pasien WHERE username='$username'"));
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
}else if ($cek3 > 0) {
    list($id_dokter,$nama,$username,$password,$password_hint, $poli_id, $start, $off) = mysqli_fetch_array(mysqli_query($conn, "SELECT id_dokter,nama,username,password,password_hint, poli_id, start, off FROM dokter WHERE username='$username'"));
    $_SESSION ['id_dokter'] = $id_dokter;
    $_SESSION ['nama'] = $nama;
    $_SESSION ['username'] = $username;
    $_SESSION ['password'] = $password;
    $_SESSION ['password_hint'] = $password_hint;
    $_SESSION ['poli_id'] = $poli_id;
    $_SESSION ['start'] = $start;
    $_SESSION ['off'] = $off;
    $_SESSION ['status'] = "login";
    header ("location:dokter/index.php?page=home");
}

else {
    header ("location:index.php?pesan=gagal");
    
}



?>