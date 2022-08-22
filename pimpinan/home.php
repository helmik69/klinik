<?php 

$sql = "SELECT id, nama, nik, email, jk , no_hp, tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs, username, password, password_hint, created_at, updated_at 
FROM pasien where id > 0 " ;

$all  =  mysqli_num_rows(mysqli_query($conn, $sql));



$sql1 = "SELECT a.id, a.nik,a.id_dokter, a.created_at, a.anamnesa, a.diagnosa , b.id as bid, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs,  c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM rekam_medis a 
        inner join pasien b on (a.nik = b.nik)
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where a.id > 0 " ;




$all1  =  mysqli_num_rows(mysqli_query($conn, $sql1));



$sql2 = "SELECT a.id_keluar,a.no_obat, a.admin, a.stok, a.created_at, a.tanggal_expired,  b.id_obat as bid, b.no_obat as idx, b.namax as nama_obat, b.harga, b.stok as bstok 
        FROM obat_keluar a 
        inner join obat b on (a.no_obat = b.no_obat)" ;


$all2  =  mysqli_num_rows(mysqli_query($conn, $sql2));
?>       
            
<div class="row">          
            
            <div class="col-lg-4 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all ?></h3>
                            <a href="index.php?page=pasien"><p class="card-text">Jumlah Pasien</p></a>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather='users'class="font-medium-3"></i>
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
                            <a href="index.php?page=rekam"><p class="card-text">Rekam Medis</p></a>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="activity" class="font-medium-3"></i>
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
                            <a href="index.php?page=pembayaran"><p class="card-text">Pembayaran</p></a>
                        </div>
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="shopping-bag" class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>