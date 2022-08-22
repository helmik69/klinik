<?php  
include '../../config/config.php';

                                
$query1 = "SELECT * FROM jenis_obat";
$result1 = mysqli_query($conn,$query1) or die("query failed.");
$response = '<option value="">--Pilih Jenis Obat--</option>';
if(mysqli_num_rows($result1) > 0 ){
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $response .= '<option value="'.$row1['id_jenis'].'">'.$row1['jenis_obat'].'</option>';
    }
}
echo $response;
?> 