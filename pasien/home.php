
<?php 


$paging = (int)(isset($_GET['paging']))? $_GET['paging'] : 1;
$paging = (int)$paging;
$limit = 3; 

if (empty($paging)){
    $limit_start = 0 ;
} else {
    if ($paging==1){
        $limit_start = 0;
    } else {
        $limit_start = ($paging-1) * $limit;
    }

}

$sql  ="SELECT id_artikel, judul, isi,post_date,img  from artikel  ";


$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$sql.=" limit $limit_start, $limit  ";
$tampil = mysqli_query($conn, $sql);

?>

<?php
    if (mysqli_num_rows($tampil)>0){
?>

<div class="card">
                      
<?php
  // $no = $limit_start + 1; 
  while (list($id_artikel,$judul, $isi,$post_date,$img)=mysqli_fetch_array($tampil)) {
  ?>
                      <div class="row m-2">
                          <div class="col-md-4">
                              <a class="post-img" ><img height="150px" src="../upload/<?php echo $img ?>" alt=""/></a>
                          </div>
                          <div class="col-md-8">
                              <div class="inner-content clearfix">
                                  <h3><a href='index.php?page=cartikel&id=<?php echo $id ?>'><?php echo $judul ?></a></h3>
                                  <div class="post-information">
                                      <span>
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                          <?php echo $post_date ?>
                                      </span>
                                  </div>
                                  <p class="description">
                                      <?php echo substr($isi, 0,170)."..." ?>
                                  </p>
                                  <a class='read-more pull-right' href='index.php?page=detail&id=<?php echo $id_artikel ?>'>read more</a>
                              </div>
                          </div>
                      </div>
                
                      
    <?php }

    }else{
      echo "No Record Found.";
    }

   
    ?>

<nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <!-- LINK FIRST AND PREV -->
                                <?php
                                if($paging == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                ?>
                                    <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                                <?php
                                }else{ // Jika page bukan page ke 1
                                    $link_prev = ($paging > 1)? $paging - 1 : 1;
                                ?>
                                    <li class="page-item"><a class="page-link" href="index.php?page=artikel&paging=1">First</a></li>
                                    <li class="page-item"><a class="page-link" href="index.php?page=artikel&paging=<?php echo $link_prev; ?>">&laquo;</a></li>
                                <?php
                                }
                                ?>
                                
                                <!-- LINK NUMBER -->
                                <?php
                                    $jumlah_page = ceil($all / $limit); // Hitung jumlah halamannya
                                    $jumlah_number = 2; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                    $start_number = ($paging > $jumlah_number)? $paging - $jumlah_number : 1; // Untuk awal link number
                                    $end_number = ($paging < ($jumlah_page - $jumlah_number))? $paging + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                    
                                    for($i = $start_number; $i <= $end_number; $i++){
                                        $link_active = ($paging == $i)? ' class="active"' : '';
                                    ?>
                                        <li class="page-item"<?php echo $link_active; ?>><a class="page-link" href="index.php?page=artikel&paging=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    
                                    <!-- LINK NEXT AND LAST -->
                                    <?php
                                    // Jika page sama dengan jumlah page, maka disable link NEXT nya
                                    // Artinya page tersebut adalah page terakhir 
                                    if($paging == $jumlah_page){ // Jika page terakhir
                                    ?>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                    <?php
                                    }else{ // Jika Bukan page terakhir
                                        $link_next = ($paging < $jumlah_page)? $paging + 1 : $jumlah_page;
                                    ?>
                                        <li class="page-item"><a class="page-link" href="index.php?page=artikel&paging=<?php echo $link_next; ?>">&raquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="index.php?page=artikel&paging=<?php echo $jumlah_page; ?>">Last</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </nav>
                        </div>