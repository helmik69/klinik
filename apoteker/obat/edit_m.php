<?php

$id=mysqli_real_escape_string($conn,$_GET['id']);
$tampil=mysqli_query($conn,"select * from obat_masuk a inner join obat b on (a.no_obat = b.no_obat) where id_masuk = '$id'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);
?>


<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Edit Data</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" action="../apoteker/obat/masuk_update.php?id=<?php echo $id?>" method="POST">
        <div class="row">
            <div class="mb-1">
            <label class="form-label" for="no_obat">Nama Obat</label>
                <select name="no_obat" id="no_obat" class="form-control">
                    <option  disabled selected>Pilih Nama Obat</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM obat";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                                            if($data['namax'] == $row1['no_obat']){
                                                                $selected = "selected";
                                                            }else{
                                                                $selected = "";
                                                            }

                                                        echo "<option {$selected} value='{$row1['no_obat']}'> {$row1['namax']} </option>";
                                                        }
                                                    }
                                                ?>

                </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="penerima">Penerima</label>
                <input class="form-control" id="penerima" type="text" name="penerima" value="<?php echo $data['penerima'] ?>" aria-describedby="nama" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="stok">Jumlah</label>
                <input class="form-control" id="stok" type="text" name="stok" value="<?php echo $data['stok'] ?>" aria-describedby="harga" autofocus="" tabindex="1" />
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
                    $penerima=mysqli_real_escape_string($conn, $_POST['penerima']);
                    $stok=mysqli_real_escape_string($conn, $_POST['stok']);
                        mysqli_query($conn, "UPDATE obat_masu set no_obat='$no_obat', penerima='$penerima', stok='$stok' WHERE id_masuk='$id' ") or die (mysqli_error($conn));    
                        
                        echo "<script>alert('Data berhasil di edit');window.location.href='index.php?page=estok&id=$id'</script>";  
                    }
               ?>
<!--/ form -->

