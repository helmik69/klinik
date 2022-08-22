<?php

$id_pendaftaran=mysqli_real_escape_string($conn,$_GET['id_pendaftaran']);
$tampil=mysqli_query($conn,"SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
FROM berobat a inner join pasien b on (a.nik = b.nik) 
inner join dokter c on (a.id_dokter = c.id_dokter) where id_pendaftaran = '$id_pendaftaran'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);
?>


<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Data Pasien</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <div class="mb-1">
                <label class="form-label" for="nama">Nama Pasien</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['pasien'] ?>" aria-describedby="no_obat" autofocus="" tabindex="1" readonly/>
            </div>
            
            <div class="mb-1">
                <label class="form-label" for="nik">NIK</label>
                <input class="form-control" id="nik" type="text" name="nik" value="<?php echo $data['nik'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="jp">Jenis Pasien</label>
                <input class="form-control" id="jp" type="text" name="jp" value="<?php echo $data['jenis_pasien'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly />
            </div>
            <?php if ($data['jenis_pasien'] == 'bpjs'){ ?>
            <div class="mb-1">
                <label class="form-label" for="no_bpjs">No BPJS</label>
                <input class="form-control" id="no_bpjs" type="text" name="no_bpjs" value="<?php echo $data['no_bpjs'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly />
            </div>
            <?php } else { ?>

                <?php } ?>
            <div class="mb-1">
                <label class="form-label" for="anamnesa">Anamnesa</label>
                <textarea name="anamnesa" class="form-control" id="anamnesa" rows="3"></textarea>
            </div>
            <div class="mb-1">
                <label class="form-label" for="diagnosa">Diagnosa</label>
                <textarea name="diagnosa" class="form-control" id="diagnosa" rows="3"></textarea>
            </div>
            <div class="mb-1">
                <label class="form-label" for="resep">Resep Obat</label>
                <textarea name="resep" class="form-control" id="resep" rows="3"></textarea>
            </div>
            
            
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="update">Submit</button>
                
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
            
        </div>
    </form>
</div>
</div>
                <?php
      
                    if (isset($_POST['update'])) {
                        $nama=mysqli_real_escape_string($conn, $_POST['nama']);
                        $nik=mysqli_real_escape_string($conn, $_POST['nik']);
                        $anamnesa=mysqli_real_escape_string($conn, $_POST['anamnesa']);
                        $diagnosa=mysqli_real_escape_string($conn, $_POST['diagnosa']);
                        $resep=mysqli_real_escape_string($conn, $_POST['resep']);
                        $id_dokter= $_SESSION['id_dokter'];

                        $proses = "INSERT INTO rekam_medis  (nik,id_dokter,anamnesa,diagnosa,resep) VALUES ('$nik','$id_dokter','$anamnesa','$diagnosa','$resep') "; 
                        $berhasil=mysqli_query($conn,$proses) or die (mysqli_error($conn));   
                        if($berhasil){

                        mysqli_query($conn, "UPDATE berobat set status='selesai' WHERE id_pendaftaran='$id_pendaftaran' ") or die (mysqli_error($conn));     
                        echo "<script>alert('Rekam Medis Berhasil Disimpan');window.location.href='index.php?page=detail&id_pendaftaran=$id_pendaftaran';</script>";  
                        }
                        
                        else {
                            echo "<script>alert('Rekam Medis Gagal Disimpan');window.location.href='index.php?page=detail&id_pendaftaran=$id_pendaftaran';</script>";  
                        }
                    }
               ?>
<!--/ form -->

