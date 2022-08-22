<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM obat WHERE id_obat = '$id'") or die (mysqli_error($conn));

?>   
<script>alert('Data Berhasil Dihapus');window.location.href='../index.php?page=stok'</script>