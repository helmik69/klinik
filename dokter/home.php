<?php 
$dokter = $_SESSION ['id_dokter'];

$sql = "SELECT a.id, a.nik,a.id_dokter, a.created_at, a.anamnesa, a.diagnosa , b.id as bid, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs,  c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM rekam_medis a 
        inner join pasien b on (a.nik = b.nik)
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where a.id_dokter ='$dokter' " ;


$all  =  mysqli_num_rows(mysqli_query($conn, $sql));

$sql1 = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM berobat a inner join pasien b on (a.nik = b.nik) 
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where a.status='diterima' and c.id_dokter = '$dokter' " ;

$all1  =  mysqli_num_rows(mysqli_query($conn, $sql1));



?>       
            
<div class="row">          
            
            <div class="col-lg-6 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all1 ?></h3>
                            <a href="index.php?page=berobat"><p class="card-text">Jumlah Pasien</p></a>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather='archive'class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all ?></h3>
                            <a href="index.php?page=riwayat"><p class="card-text">Rekam Medis</p></a>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="user-check" class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

</div>