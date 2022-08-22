<?php 

$sql = "SELECT id, nama, nik, email, jk , no_hp, tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs, username, password, password_hint, created_at, updated_at FROM pasien where id > 0" ;

$all  =  mysqli_num_rows(mysqli_query($conn, $sql));


$sql1 = "SELECT a.id_dokter, a.nama,a.poli_id, a.start, a.off,a.mulai,a.selesai, b.id, b.nama as poli FROM dokter a inner join poli b on (a.poli_id = b.id) " ;

$all1  =  mysqli_num_rows(mysqli_query($conn, $sql1));



$sql2 = "SELECT id_artikel,status, judul, isi, post_date, img FROM artikel" ;

$all2  =  mysqli_num_rows(mysqli_query($conn, $sql2));
?>                
<div class="row">
            <div class="col-lg-4 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all ?></h3>
                            <a href="index2.php?page=pasien"><p class="card-text">Pasien</p></a>
                        </div>
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus font-medium-5">
                                    
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
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
                            <a href="index2.php?page=jadwal"><p class="card-text">Dokter</p></a>
                        </div>
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu font-medium-5">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
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
                            <a href="index2.php?page=artikel"><p class="card-text">Artikel</p></a>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="monitor" class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>                