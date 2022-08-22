<?php

$id=mysqli_real_escape_string($conn,$_GET['id']);
$tampil=mysqli_query($conn,"select * from poli where id = '$id'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);
?>


<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Data Poli</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <div class="mb-1">
                <label class="form-label" for="nama">Nama Poli</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>" aria-describedby="nama" autofocus="" tabindex="1" />
            </div>
            
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="update">Simpan</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
            
        </div>
    </form>
</div>
</div>
                <?php
      
                    if (isset($_POST['update'])) {
                    $nama=mysqli_real_escape_string($conn, $_POST['nama']);
                    
                    if($nama != ""){
                        mysqli_query($conn, "UPDATE poli set nama='$nama' WHERE id='$id' ") or die (mysqli_error($conn));    
                       
                        echo "<script>alert('Data Berhasil di Edit');window.location.href='index2.php?page=epoli&id=$id'</script>";   
                        } 
                    }
               ?>
<!--/ form -->

