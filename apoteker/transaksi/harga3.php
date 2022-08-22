<?php  
include '../../config/config.php';

$obatx = $_POST['obatx'];
                                
$query1 = "SELECT harga FROM obat WHERE namax='$obatx'";
$result1 = mysqli_query($conn,$query1) or die("query failed.");
$data = array();
if(mysqli_num_rows($result1) > 0 ){
$row1 = mysqli_fetch_assoc($result1);
}
$data = $row1['harga'];
print_r($data);
?> 