<?php
include '../../config/config.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM obat WHERE id = '$id'") or die (mysqli_error($conn));

?>   
<script type=" text/javascript">
window.location.href="../index2.php?page=stok";
</script>

