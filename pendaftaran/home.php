<?php 

$sql = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
FROM berobat a 
inner join pasien b on (a.nik = b.nik) 
inner join dokter c on (a.id_dokter = c.id_dokter)
inner join poli d on (c.poli_id = d.id) 
where a.status='waiting' " ;

$all  =  mysqli_num_rows(mysqli_query($conn, $sql));


$sql1 = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
FROM berobat a 
inner join pasien b on (a.nik = b.nik) 
inner join dokter c on (a.id_dokter = c.id_dokter)
inner join poli d on (c.poli_id = d.id) 
where a.status='ditolak' " ;

$all1  =  mysqli_num_rows(mysqli_query($conn, $sql1));


$sql2 = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
FROM berobat a 
inner join pasien b on (a.nik = b.nik) 
inner join dokter c on (a.id_dokter = c.id_dokter)
inner join poli d on (c.poli_id = d.id) 
where a.status='selesai' " ;

$all2  =  mysqli_num_rows(mysqli_query($conn, $sql2));
?>                
<div class="row">          
            
            <div class="col-lg-4 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all ?></h3>
                            <a href="index.php?page=daftar"><p class="card-text">Pendaftaran</p></a>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather='user-plus'class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all1 ?></h3>
                            <a href="index.php?page=th"><p class="card-text">Pasien yang Tidak Hadir</p></a>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="user-minus" class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all2 ?></h3>
                            <a href="index.php?page=selesai"><p class="card-text">Selesai Berobat</p></a>
                        </div>
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="users" class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>