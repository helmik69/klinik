<?php
include "../../config/config.php";

$var  = explode("-",$_POST['obatx']);
$var = $var[0];

$pasien=$_POST['pasien'];
$admin=$_POST['admin'];
$stok=$_POST['stok'];
$totalValue=$_POST['totalValue'];

$data=mysqli_query($conn,"select * from obat where no_obat='$var'");
$hasil=mysqli_fetch_array($data);

$stokawal = $hasil['stok'];

$stokupdate= $stokawal - $stok ;
// echo $checkexp;

    if($jumlah <= $stokawal){
        // echo "abc";
        $proses ="INSERT INTO pembayaran   (pasien,no_obat, admin,jumlah,harga) VALUES ('$pasien','$var','$admin','$stok','$totalValue')" ;
        $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));

        if($berhasil){

        $query="UPDATE obat set  stok='$stokupdate' WHERE no_obat='$var' ";
        $update=mysqli_query($conn,$query) or die (mysqli_error($conn));


            echo "<script>alert('Berhasil menambah data');window.location.href='../index.php?page=pembayaran'</script>";
        }
    }else{
        echo "<script>alert('Gagal Menambah data harap periksa stok terlebih dahulu');window.location.href='../index.php?page=pembayaran'</script>";  
    }



?>