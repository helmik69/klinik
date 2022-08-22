<?php
include "../../config/config.php";


$no_obat=$_POST['no_obat'];
$penerima=$_POST['penerima'];
$stok=$_POST['stok'];
$data=mysqli_query($conn,"select * from obat where no_obat='$no_obat'");
$hasil=mysqli_fetch_array($data);

$stokawal = $hasil['stok'];

$stokupdate= $stokawal + $stok ;
// echo $checkexp;

    if($stok == !''){
        // echo "abc";

        $proses ="INSERT INTO obat_masuk   (no_obat,penerima,stok) VALUES ('$no_obat','$penerima','$stok')" ;
        $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));

        if($berhasil){

        $query="UPDATE obat set  stok='$stokupdate' WHERE no_obat='$no_obat' ";
        $update=mysqli_query($conn,$query) or die (mysqli_error($conn));


            echo "<script>alert('Berhasil menambah data obat masuk');window.location.href='../index.php?page=masuk'</script>";
        }else{
            echo "<script>alert('Gagal Menambah data');window.location.href='../index.php?page=masuk'</script>";  
        }
    }



?>