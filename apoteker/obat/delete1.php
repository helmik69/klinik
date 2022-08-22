<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM obat_keluar WHERE id_keluar = '$id'") or die (mysqli_error($conn));

?>   
<script>alert('Data berhasil di hapus');window.location.href='../index.php?page=keluar'</script>  

