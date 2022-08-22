<?php

$id_pendaftaran=mysqli_real_escape_string($conn,$_GET['id']);
$tampil=mysqli_query($conn,"SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
FROM berobat a inner join pasien b on (a.nik = b.nik) 
inner join dokter c on (a.id_dokter = c.id_dokter)
inner join poli d on (c.poli_id = d.id) where id_pendaftaran = '$id_pendaftaran'") or die (mysqli_error($conn));
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
                <label class="form-label" for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                <input class="form-control" id="tanggal_pendaftaran" type="text" name="tanggal_pendaftaran" value="<?php echo $data['created_at'] ?>" aria-describedby="nama" autofocus="" tabindex="1" readonly />
            </div>
            <!-- <div class="mb-1">
                <label class="form-label" for="nik">NIK</label>
                <input class="form-control" id="nik" type="text" name="nik" value="<?php echo $data['nik'] ?>" aria-describedby="harga" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" type="text" name="email" value="<?php echo $data['email'] ?>" aria-describedby="stok_awal" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="jk">Jenis Kelamin</label>
                <input class="form-control" id="jk" type="text" name="jk" value="<?php echo $data['jk'] ?>" aria-describedby="stok" autofocus="" tabindex="1" />
            </div> -->
            <div class="mb-1">
                <label class="form-label" for="tgl">Tanggal Lahir</label>
                <input class="form-control" id="tgl" type="text" name="tgl" value="<?php echo $data['tempat_lahir'].", ".$data ['tanggal_lahir'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="no_hp">No Telepon</label>
                <input class="form-control" id="no_hp" type="text" name="no_hp" value="<?php echo $data['no_hp'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <!-- <div class="mb-1">
                <label class="form-label" for="alamat">Alamat</label>
                <input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat'] ?>" aria-describedby="stok" autofocus="" tabindex="1" />
            </div> -->
            <div class="mb-1">
                <label class="form-label" for="jp">Jenis Pasien</label>
                <input class="form-control" id="jp" type="text" name="jp" value="<?php echo $data['jenis_pasien'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly />
            </div>
            <?php if ($data['jenis_pasien'] == 'bpjs'){?>
            <div class="mb-1">
                <label class="form-label" for="no_bpjs">No BPJS</label>
                <input class="form-control" id="no_bpjs" type="text" name="no_bpjs" value="<?php echo $data['no_bpjs'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <?php }else { ?>

            <?php } ?>
            <div class="mb-1">
                <label class="form-label" for="nama_dokter">Nama Dokter</label>
                <input class="form-control" id="nama_dokter" type="text" name="nama_dokter" value="<?php echo $data['nama_dokter'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="poli">Poli</label>
                <input class="form-control" id="poli" type="text" name="poli" value="<?php echo $data['nama_poli'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="jadwal">Jadwal Berobat</label>
                <input class="form-control" id="jadwal" type="text" name="jadwal" value="<?php echo $data['start']." - ".$data['off'] ?>" aria-describedby="stok" autofocus="" tabindex="1" readonly/>
            </div>
            <div class="mb-1">
                <label class="form-label" for="tanggal_berobat">Tanggal Berobat</label>
                <input class="form-control" id="tanggal_berobat" type="text" name="tanggal_berobat" value="<?php echo $data['tanggal_berobat'] ?>" aria-describedby="stok" autofocus="" tabindex="1"readonly />
            </div>
            
            
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="update">Verifikasi Pendaftaran</button>
                <button type="submit" class="btn btn-danger mt-1 me-1" name="update1">Tidak Hadir</button>
                <!-- <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button> -->
            </div>
            
        </div>
    </form>
</div>
</div>
                <?php
      
                    if (isset($_POST['update'])) {
                        mysqli_query($conn, "UPDATE berobat set status='diterima' WHERE id_pendaftaran='$id_pendaftaran' ") or die (mysqli_error($conn));    
                        echo "<script>alert('Pendaftaran telah diverifikasi');window.location.href='index.php?page=daftar&id=$id_pendaftaran';</script>";  
                        
                    }else if (isset($_POST['update1'])) {
                        mysqli_query($conn, "UPDATE berobat set status='ditolak' WHERE id_pendaftaran='$id_pendaftaran' ") or die (mysqli_error($conn));    
                        echo "<script>alert('Pendaftaran telah ditolak');window.location.href='index.php?page=daftar&id=$id_pendaftaran';</script>";  
                        
                    }
               ?>
<!--/ form -->

