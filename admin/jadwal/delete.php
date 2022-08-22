<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM dokter WHERE id_dokter = '$id'") or die (mysqli_error($conn));

?>   

<script>alert('Data berhasil di hapus');window.location.href='../index2.php?page=jadwal'</script> 