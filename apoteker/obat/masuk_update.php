<?php
include "../../config/config.php";

$id=$_GET['id'];
$no_obat=$_POST['no_obat'];
$penerima=$_POST['penerima'];
$stok=$_POST['stok'];
$data=mysqli_query($conn,"select * from obat where no_obat='$no_obat'");
$hasil=mysqli_fetch_array($data);

$stokawal = $hasil['stok'];

$stokupdate= $stokawal + $stok ;
// echo $checkexp;

    if($no_obat == !''){
        // echo "abc";

        

        $proses ="UPDATE obat_masuk   set no_obat='$no_obat' , penerima='$penerima', stok='$stok' WHERE id_masuk='$id' " ;
        $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));

        if($berhasil){

        $query="UPDATE obat set  stok='$stokupdate' WHERE no_obat='$no_obat' ";
        $update=mysqli_query($conn,$query) or die (mysqli_error($conn));


            echo "<script>alert('Berhasil mengubah data obat masuk');window.location.href='../index.php?page=emasuk&id=$id'</script>";
        }else{
            echo "<script>alert('Gagal Menambah data');window.location.href='../index.php?page=emasuk&id=$id'</script>";  
        }
    }else{
        echo "<script>alert('Gagal mengubah data, harap isi nama obat');window.location.href='../index.php?page=emasuk&id=$id'</script>";  
    }



?>