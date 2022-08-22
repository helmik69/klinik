<?php
//$conn = mysqli_connect("localhost", "root", "mysql", "cl_maulagi_new");
date_default_timezone_set('Asia/Jakarta');
//error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "00");

//cek gaming
if (mysqli_connect_errno()) {
    echo "koneksi database error ya guys : ".mysqli_connect_error();
}
?>