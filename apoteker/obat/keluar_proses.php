<?php
include "../../config/config.php";


$no_obat=$_POST['no_obat'];
$admins=$_POST['admin'];
$stok=$_POST['stok'];
$expired=$_POST['expired'];

$data=mysqli_query($conn,"select * from obat where no_obat='$no_obat'");
$hasil=mysqli_fetch_array($data);

$stokawal = $hasil['stok'];

$stokupdate= $stokawal - $stok ;
// echo $checkexp;

    if($stok <= $stokawal){
        // echo "abc";
        $proses ="INSERT INTO obat_keluar   (no_obat,admin,stok,tanggal_expired) VALUES ('$no_obat','$admins','$stok','$expired')" ;
        $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));

        if($berhasil){

        $query="UPDATE obat set  stok='$stokupdate' WHERE no_obat='$no_obat' ";
        $update=mysqli_query($conn,$query) or die (mysqli_error($conn));


            echo "<script>alert('Berhasil menambah data');window.location.href='../index.php?page=keluar'</script>";
        }
    }else{
        echo "<script>alert('Gagal Menambah data');window.location.href='../index.php?page=keluar'</script>";  
    }



?>