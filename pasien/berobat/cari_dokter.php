<?php  
include '../../config/config.php';

$poli = $_POST['poli'];
                                
$query1 = "SELECT * FROM dokter WHERE poli_id='$poli'";
$result1 = mysqli_query($conn,$query1) or die("query failed.");
$response = '<option value="">--Pilih Dokter--</option>';
if(mysqli_num_rows($result1) > 0 ){
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $response .= '<option value="'.$row1['id_dokter'].'">'.$row1['nama'].'</option>';
    }
}
echo $response;
?> 