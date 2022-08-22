<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM obat_masuk WHERE id_masuk = '$id'") or die (mysqli_error($conn));

?>   
<script>alert('Data berhasil di hapus');window.location.href='../index.php?page=masuk'</script>  

