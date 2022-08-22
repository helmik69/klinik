<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM artikel WHERE id_artikel = '$id'") or die (mysqli_error($conn));

?>   
<script>alert('Data Berhasil dihapus');window.location.href='  ../index2.php?page=artikel'</script> 
