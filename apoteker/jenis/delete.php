<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM jenis_obat WHERE id_jenis = '$id'") or die (mysqli_error($conn));

?>   

<script>alert('Data Berhasil Dihapus');window.location.href='../index.php?page=jenis'</script>
