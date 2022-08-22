<?php
include '../../config/config.php';

if(empty($_FILES['new-image']['name'])){
  $new_name = $_POST['old_image'];
}else{
  $errors = array();

  $file_name = $_FILES['new-image']['name'];
  $file_size = $_FILES['new-image']['size'];
  $file_tmp = $_FILES['new-image']['tmp_name'];
  $file_type = $_FILES['new-image']['type'];
  $tmp = explode('.',$file_name);

  $file_extension = end($tmp);

  $extensions = array("jpeg","jpg","png");

  if(in_array($file_extension,$extensions) === false)
  {
    $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
  }

  if($file_size > 20097152){
    $errors[] = "File size must be 2mb or lower.";
  }

  if($file_size > 20097152){
    $errors[] = "File size must be 2mb or lower.";
  }
  $new_name = time(). "-".basename($file_name);
  $target = "../../upload/".$new_name;
  $image_name = $new_name;
  if(empty($errors) == true){
    move_uploaded_file($file_tmp,$target);
  }else{
    print_r($errors);
    die();
  }
}

$query = "UPDATE artikel SET 
        judul='{$_POST["judul"]}',
        isi='{$_POST["isi"]}',
        status='{$_POST["status"]}',
        img='{$image_name}' 
        WHERE id_artikel={$_POST["id"]}; ";


$result = mysqli_multi_query($conn,$query);

if($result){
  header("location: ../../admin/index2.php?page=artikel");
}else{
  echo "Query Failed";
}




?>
