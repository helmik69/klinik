<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM user WHERE id = '$id'") or die (mysqli_error($conn));

?>  

<script>alert('Data Berhasil Dihapus');window.location.href='../index2.php?page=staff'</script>
