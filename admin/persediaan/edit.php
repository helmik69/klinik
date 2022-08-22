<?php

$id=mysqli_real_escape_string($conn,$_GET['id']);
$tampil=mysqli_query($conn,"select * from obat where id = '$id'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);
?>


<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Edit Data</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <div class="mb-1">
                <label class="form-label" for="no_obat">ID Obat</label>
                <input class="form-control" id="no_obat" type="text" name="no_obat" value="<?php echo $data['no_obat'] ?>" aria-describedby="no_obat" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="nama">nama</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>" aria-describedby="nama" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="harga">harga</label>
                <input class="form-control" id="harga" type="text" name="harga" value="<?php echo $data['harga'] ?>" aria-describedby="harga" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="stok_awal">Stok Awal</label>
                <input class="form-control" id="stok_awal" type="text" name="stok_awal" value="<?php echo $data['stok_awal'] ?>" aria-describedby="stok_awal" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="stok">Stok Keseluruhan</label>
                <input class="form-control" id="stok" type="text" name="stok" value="<?php echo $data['stok'] ?>" aria-describedby="stok" autofocus="" tabindex="1" />
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
                    $no_obat=mysqli_real_escape_string($conn, $_POST['no_obat']);
                    $nama=mysqli_real_escape_string($conn, $_POST['nama']);
                    $harga=mysqli_real_escape_string($conn, $_POST['harga']);
                    $stok_awal=mysqli_real_escape_string($conn, $_POST['stok_awal']);
                    $stok=mysqli_real_escape_string($conn, $_POST['stok']);
                        mysqli_query($conn, "UPDATE obat set no_obat='$no_obat', nama='$nama',harga='$harga', stok_awal='$stok_awal', stok='$stok' WHERE id='$id' ") or die (mysqli_error($conn));    
                        echo "<script>window.location.href='index2.php?page=estok&id=$id';</script>";  
                        
                    }
               ?>
<!--/ form -->

