<?php
include "../../config/config.php";


$harga=$_POST['harga'];
$harga1=$_POST['harga1'];
$harga2=$_POST['harga2'];
$harga3=$_POST['harga3'];
$stok=$_POST['stok'];
$stok1=$_POST['stok1'];
$stok2=$_POST['stok2'];
$stok3=$_POST['stok3'];
$obatx=$_POST['obatx'];
$obatx1=$_POST['obatx1'];
$obatx2=$_POST['obatx2'];
$obatx3=$_POST['obatx3'];


$nama_pasien=$_POST['nama_pasien'];
$nama_admin=$_POST['nama_admin'];
$totalValue=$_POST['totalValue'];


if($obatx == !'0' && $obatx1 == '0' && $obatx2 == '0' && $obatx3 == '0' ){
    
$data=mysqli_query($conn,"select * from obat where namax='$obatx'");
$hasil=mysqli_fetch_array($data);

$stokawal = $hasil['stok'];

$stokupdate= $stokawal - $stok ;

    if($stok <= $stokawal ){
        // echo "asasa";
        
        $proses ="INSERT INTO pembayaran   (pasien,namax,hargax, admin,jumlah,total_harga) VALUES ('$nama_pasien','$obatx','$harga','$nama_admin','$stok','$totalValue')" ;
        $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));



        if($berhasil){

        $query="UPDATE obat set  stok='$stokupdate' WHERE namax='$obatx' ";
        $update=mysqli_query($conn,$query) or die (mysqli_error($conn));


            echo "<script>alert('Berhasil menambah data');window.location.href='../index.php?page=transaksi'</script>";
        }
    }else{
        // echo "bbbb";
        echo "<script>alert('Gagal Menambah data harap periksa stok terlebih dahulu');window.location.href='../index.php?page=transaksi'</script>";  
    }

}else if ($obatx == !'0' && $obatx1 == !'0' && $obatx2 == '0' && $obatx3 == '0' ) {
    

$data=mysqli_query($conn,"select * from obat where namax='$obatx'");
$hasil=mysqli_fetch_array($data);
    
$stokawal = $hasil['stok'];
    
$stokupdate= $stokawal - $stok ;    
// batas 1


$data1=mysqli_query($conn,"select * from obat where namax='$obatx1'");
$hasil1=mysqli_fetch_array($data1);

$stokawal1 = $hasil1['stok'];

$stokupdate1= $stokawal1 - $stok1 ;

if($stok <= $stokawal && $stok1 <= $stokawal1 ){
    // echo "asasa";
    
    $proses ="INSERT INTO pembayaran   (pasien,namax,namax1,hargax,hargax1, admin,jumlah,jumlah1,total_harga) VALUES ('$nama_pasien','$obatx','$obatx1','$harga','$harga1','$nama_admin','$stok','$stok1','$totalValue')" ;
    $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));



    if($berhasil){

    $query="UPDATE obat set  stok='$stokupdate' WHERE namax='$obatx' ";
    $update=mysqli_query($conn,$query) or die (mysqli_error($conn));
    
    
    $query1="UPDATE obat set  stok='$stokupdate1' WHERE namax='$obatx1' ";
    $update1=mysqli_query($conn,$query1) or die (mysqli_error($conn));


        echo "<script>alert('Berhasil menambah data');window.location.href='../index.php?page=transaksi'</script>";
    }
}else{
    // echo "bbbb";
    echo "<script>alert('Gagal Menambah data harap periksa stok terlebih dahulu');window.location.href='../index.php?page=transaksi'</script>";  
}


}else if ($obatx == !'0' && $obatx1 == !'0' && $obatx2 == !'0' && $obatx3 == '0' ){
    
$data=mysqli_query($conn,"select * from obat where namax='$obatx'");
$hasil=mysqli_fetch_array($data);
    
$stokawal = $hasil['stok'];
    
$stokupdate= $stokawal - $stok ;    
// batas 1


$data1=mysqli_query($conn,"select * from obat where namax='$obatx1'");
$hasil1=mysqli_fetch_array($data1);

$stokawal1 = $hasil1['stok'];

$stokupdate1= $stokawal1 - $stok1 ;

// batas 2

$data2=mysqli_query($conn,"select * from obat where namax='$obatx2'");
$hasil2=mysqli_fetch_array($data2);

$stokawal2 = $hasil2['stok'];

$stokupdate2= $stokawal2 - $stok2 ;


if($stok <= $stokawal && $stok1 <= $stokawal1  && $stok2 <= $stokawal2 ){
    // echo "asasa";
    
    $proses ="INSERT INTO pembayaran   (pasien,namax,namax1,namax2,hargax,hargax1,hargax2, admin,jumlah,jumlah1,jumlah2,total_harga) VALUES ('$nama_pasien','$obatx','$obatx1','$obatx2','$harga','$harga1','$harga2','$nama_admin','$stok','$stok1','$stok2','$totalValue')" ;
    $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));



    if($berhasil){

    $query="UPDATE obat set  stok='$stokupdate' WHERE namax='$obatx' ";
    $update=mysqli_query($conn,$query) or die (mysqli_error($conn));
    
    
    $query1="UPDATE obat set  stok='$stokupdate1' WHERE namax='$obatx1' ";
    $update1=mysqli_query($conn,$query1) or die (mysqli_error($conn));
    
    
    $query2="UPDATE obat set  stok='$stokupdate2' WHERE namax='$obatx2' ";
    $update2=mysqli_query($conn,$query2) or die (mysqli_error($conn));


        echo "<script>alert('Berhasil menambah data');window.location.href='../index.php?page=transaksi'</script>";
    }
}else{
    // echo "bbbb";
    echo "<script>alert('Gagal Menambah data harap periksa stok terlebih dahulu');window.location.href='../index.php?page=transaksi'</script>";  
}


} else if ($obatx == !'0' && $obatx1 == !'0' && $obatx2 == !'0' && $obatx3 == !'0' ){
    

   
    $data=mysqli_query($conn,"select * from obat where namax='$obatx'");
    $hasil=mysqli_fetch_array($data);
        
    $stokawal = $hasil['stok'];
        
    $stokupdate= $stokawal - $stok ;    
    // batas 1
    
    
    $data1=mysqli_query($conn,"select * from obat where namax='$obatx1'");
    $hasil1=mysqli_fetch_array($data1);
    
    $stokawal1 = $hasil1['stok'];
    
    $stokupdate1= $stokawal1 - $stok1 ;
    
    // batas 2
    
    $data2=mysqli_query($conn,"select * from obat where namax='$obatx2'");
    $hasil2=mysqli_fetch_array($data2);
    
    $stokawal2 = $hasil2['stok'];
    
    $stokupdate2= $stokawal2 - $stok2 ;
    
// batas 3


$data3=mysqli_query($conn,"select * from obat where namax='$obatx3'");
$hasil3=mysqli_fetch_array($data3);

$stokawal3 = $hasil3['stok'];

$stokupdate3= $stokawal3 - $stok3 ;



if($stok <= $stokawal && $stok1 <= $stokawal1  && $stok2 <= $stokawal2 && $stok3 <= $stokawal3 ){
    // echo "asasa";
    
    $proses ="INSERT INTO pembayaran   (pasien,namax,namax1,namax2,namax3,hargax,hargax1,hargax2,hargax3, admin,jumlah,jumlah1,jumlah2,jumlah3,total_harga) VALUES ('$nama_pasien','$obatx','$obatx1','$obatx2','$obatx3','$harga','$harga1','$harga2','$harga3','$nama_admin','$stok','$stok1','$stok2','$stok3','$totalValue')" ;
    $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));



    if($berhasil){

    $query="UPDATE obat set  stok='$stokupdate' WHERE namax='$obatx' ";
    $update=mysqli_query($conn,$query) or die (mysqli_error($conn));
    
    
    $query1="UPDATE obat set  stok='$stokupdate1' WHERE namax='$obatx1' ";
    $update1=mysqli_query($conn,$query1) or die (mysqli_error($conn));
    
    
    $query2="UPDATE obat set  stok='$stokupdate2' WHERE namax='$obatx2' ";
    $update2=mysqli_query($conn,$query2) or die (mysqli_error($conn));

    
    $query3="UPDATE obat set  stok='$stokupdate3' WHERE namax='$obatx3' ";
    $update3=mysqli_query($conn,$query3) or die (mysqli_error($conn));


        echo "<script>alert('Berhasil menambah data');window.location.href='../index.php?page=transaksi'</script>";
    }
}else{
    // echo "bbbb";
    echo "<script>alert('Gagal Menambah data harap periksa stok terlebih dahulu');window.location.href='../index.php?page=transaksi'</script>";  
}

}else {

    echo "<script>alert('Gagal Menambah data harap periksa stok terlebih dahulu');window.location.href='../index.php?page=transaksi'</script>";  
}

?>