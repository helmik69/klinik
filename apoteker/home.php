<?php 

$sql = "SELECT id_obat,no_obat, namax,harga, stok_awal, stok, created_at, updated_at FROM obat where id_obat > 0" ;

$all  =  mysqli_num_rows(mysqli_query($conn, $sql));



$sql1 = "SELECT a.id_masuk,a.no_obat,  a.stok, a.created_at, a.penerima, b.id_obat as bid, b.no_obat as idx, b.namax, b.harga, b.stok as bstok 
        FROM obat_masuk a inner join obat b on (a.no_obat = b.no_obat) " ;


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
                            <a href="index.php?page=stok"><p class="card-text">Jenis Obat</p></a>
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
            <div class="col-lg-4 col-sm-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="fw-bolder mb-0"><?php echo $all1 ?></h3>
                            <a href="index.php?page=masuk"><p class="card-text">Obat Masuk</p></a>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="truck" class="font-medium-3"></i>
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
                            <a href="index.php?page=keluar"><p class="card-text">Obat Expired</p></a>
                        </div>
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                            <div class="avatar-content">
                                    <i data-feather="slash" class="font-medium-3"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>