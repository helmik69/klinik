<?php  
include '../../config/config.php';

$dokter = $_POST['dokter'];
                                
$query1 = "SELECT start,off FROM dokter WHERE id_dokter='$dokter'";
$result1 = mysqli_query($conn,$query1) or die("query failed.");
$data = array();
if(mysqli_num_rows($result1) > 0 ){
$row1 = mysqli_fetch_assoc($result1);
}
$data = implode(" s/d ",[$row1['start'],$row1['off']]);
print_r($data);
?> 