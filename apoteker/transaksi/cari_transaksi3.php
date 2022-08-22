<?php  
include '../../config/config.php';

$id_jenis = $_POST['jenis_obat'];
                                
$query1 = "SELECT * FROM obat WHERE id_jenis='$id_jenis'";
$result1 = mysqli_query($conn,$query1) or die("query failed.");
$response = '<option value="">--Pilih Obat--</option>';
if(mysqli_num_rows($result1) > 0 ){
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $response .= '<option value="'.$row1['namax'].'">'.$row1['namax'].'</option>';
    }
}
echo $response;
?> 