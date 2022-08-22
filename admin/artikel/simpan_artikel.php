<?php
include '../../config/config.php';

if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 20097152){
      $errors[] = "File size must be 20mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "../../upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  session_start();

  $judul = mysqli_real_escape_string($conn, $_POST['judul']);
  $isi = mysqli_real_escape_string($conn, $_POST['isi']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  
  

  $sql = "INSERT INTO artikel(judul, isi,status,img)


          VALUES('{$judul}','{$isi}','{$status}','{$new_name}');";


  if(mysqli_multi_query($conn, $sql)){
    echo "<script>alert('Data Berhasil Ditambah');window.location.href=' ../../admin/index2.php?page=artikel'</script>";  
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>  