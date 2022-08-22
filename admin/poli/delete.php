<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM poli WHERE id = '$id'") or die (mysqli_error($conn));

?>   

<script>alert('Data Berhasil di Hapus');window.location.href='../index2.php?page=poli'</script>