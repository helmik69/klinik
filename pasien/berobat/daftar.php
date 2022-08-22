<?php

$id=mysqli_real_escape_string($conn,$_GET['id']);
$tampil=mysqli_query($conn,"select * from dokter where id_dokter = '$id'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);
?>


<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Daftar Berobat</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <!-- <div class="mb-1">
                <label class="form-label" for="pasien">Nama</label>
                <input class="form-control" id="pasien" type="text" name="pasien" value="<?php echo $_SESSION['nama'] ?>" aria-describedby="pasien" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="jenis">Jenis Pasien</label>
                <input class="form-control" id="jenis" type="text" name="jenis" value="<?php echo $_SESSION['jenis_pasien'] ?>" aria-describedby="jenis" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="no_bpjs">NO BPJS</label>
                <input class="form-control" id="no_bpjs" type="text" name="no_bpjs" 
                value="<?php if($_SESSION['no_bpjs'] == !''){?><?php echo $_SESSION['no_bpjs'] ?><?php   
                }else {?>
                    <?php echo " " ?>
                <?php 
                }?> " 
                aria-describedby="no_bpjs" autofocus="" tabindex="1" />
            </div> -->
            <div class="mb-1">
                <label class="form-label" for="nama">Nama Dokter</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>" aria-describedby="nama" autofocus="" tabindex="1" readonly />
            </div>
            <div class="mb-1">
                <label class="form-label" for="poli">Poli</label>
                <input class="form-control" id="poli" type="text" name="poli" value="<?php echo $data['spesialis'] ?>" aria-describedby="harga" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="jadwal">Jadwal Berobat</label>
                <input class="form-control" id="jadwal" type="text" name="jadwal" value="<?php echo $data['start']." - ".$data['off'] ?>" aria-describedby="stok_awal" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="tanggal_berobat">Tanggal Berobat</label>
                <input class="form-control" id="tanggal_berobat" type="date" name="tanggal_berobat"  aria-describedby="tanggal_berobat" autofocus="" tabindex="1" />
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="simpan">Simpan</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
            
        </div>
    </form>
</div>
</div>
                <?php
      
                    if (isset($_POST['simpan'])) {
                    $nik=$_SESSION['nik'];
                    $id_dokter=$data['id_dokter'];
                    $tanggal_berobat=mysqli_real_escape_string($conn, $_POST['tanggal_berobat']);
                    
                   
                        mysqli_query($conn, "INSERT INTO berobat  (nik,id_dokter,tanggal_berobat, status) VALUES ('$nik','$id_dokter','$tanggal_berobat','waiting') ") or die (mysqli_error($conn));    
                        echo "<script>alert('Anda Berhasil Melakukan Pendaftaran');window.location.href='index.php?page=daftarb&id=$id';</script>"; 
                        
                        
                    }
               ?>
<!--/ form -->

