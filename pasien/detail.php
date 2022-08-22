<?php

$id = $_GET['id'];

$sql  ="SELECT id_artikel, judul, isi,post_date,img FROM artikel
WHERE id_artikel = {$id}";


$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$tampil = mysqli_query($conn, $sql);

?>


<?php
    if (mysqli_num_rows($tampil)>0){
?>

<?php
  // $no = $limit_start + 1; 
  while($data = mysqli_fetch_assoc($tampil)){
?>
    <div class="card">

            <div class="post-container m-4">
                        <div class="post-content single-post">
                            <h1><strong><?php echo $data['judul'] ?></strong></h1>
                            <div class="post-information">
                                <span>
                                    
                                    <i data-feather='calendar' aria-hidden="true"></i>
                                    <?php echo  $data['post_date'] ?> 
                                </span>
                            </div>
                            <div align="center">
                            <img class="single-feature-image mt-2"   height="300px" src="../upload/<?php echo  $data['img'] ?> ?>" alt=""/>
                            </div></br>
                            <p class="isi">
                                <?php echo  $data['isi'] ?> 
                            </p>
                        </div>
            </div>


      <?php }

      }else{
        echo "No Record Found.";
      }

      ?>
</div>
