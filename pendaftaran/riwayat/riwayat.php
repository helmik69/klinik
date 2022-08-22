<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">


<?php

$nama = (isset($_GET['nama']))? $_GET['nama'] : null;
$dt = (isset($_GET['dt']))? $_GET['dt'] : null;
$polix =(isset($_GET['polix']))? $_GET['polix'] : null;
$statusx =(isset($_GET['statusx']))? $_GET['statusx'] : 'ditolak';



$add = " " ;
if (!empty($statusx)){
    if ($statusx == "all"){
		$add =" " ; 
	}else if($statusx == "waiting") {
	    $add = " and a.status = 'waiting'";
	} else if ($statusx == "diterima"){
        $add = " and a.status ='diterima'";
	}  else if ($statusx == "ditolak"){
        $add = " and a.status ='ditolak'";
	}  else if ($statusx == "selesai"){
        $add = " and a.status ='selesai'";
	} 
	
}
$sql = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
        FROM berobat a 
        inner join pasien b on (a.nik = b.nik) 
        inner join dokter c on (a.id_dokter = c.id_dokter)
        inner join poli d on (c.poli_id = d.id) 
        where a.id_pendaftaran > 0 $add " ;




if(!empty($nama)){
    $sql.=" and c.nama like '%$nama%'  ";
}

if(!empty($polix)){
    $sql.=" and d.nama = '$polix'  ";
}

if(!empty($dt)){
    $date = explode(" to ",$dt);
    $start = $date[0]." 00:00:00" ;
    if (!empty($date[1])){
        $end = $date[1]." 23:59:59" ;
    } else {
        $end = $date[0]." 23:59:59" ;
    }
    
    $sql.=" and  a.created_at between '$start' and  '$end' ";
}

$sql.=" order by  a.created_at ASC  ";

// echo "$sql";
$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$tampil = mysqli_query($conn, $sql);

?>
<!-- css-->
<!-- end css-->

<!-- content-->
<div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-list">
                    <div class="card">
                    <div class="container-fluid ">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Daftar Pasien Berobat</h4> 
                           
                        </div>
                        <div class="card table-responsive">
                        <form method="get" action="../pendaftaran/index.php?page=daftar&dt=<?php echo $dt ?>&polix=<?php echo $polix ?>&status=<?php echo $statusx ?>">
                            <input type="hidden"  name="page" class="form-control"  value="daftar" />
                            
                                        
                                <div class="row pb-2 pt-1">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="fp-range">Periode</label>
                                        <input type="text" id="fp-range" name="dt" class="form-control flatpickr-range" placeholder="YYYY-MM-DD - YYYY-MM-DD" value="<?php echo $dt?>" />
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="nama">Nama Dokter</label>
                                        <div><input name="nama" id="nama" value="<?php echo $nama?>" type="text" class="form-control"
                                                placeholder="Nama Dokter"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label class="form-label" for="polix">Poli</label>
                                    <select name="polix" id="polix" class="form-control">
                                                <option  disabled selected>Pilih Program Poli</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM poli";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                                            if($polix == $row1['nama']){
                                                                $selected = "selected";
                                                            }else{
                                                                $selected = "";
                                                            }

                                                        echo "<option {$selected} value='{$row1['nama']}'> {$row1['nama']} </option>";
                                                        }
                                                    }
                                                ?>

                                    </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="statusx">Status</label>
                                        <select name="statusx" id="statusx" class="form-control">
                                            <option value="all">-All Status-</option>
                                            <!-- <option value="waiting" <?php if($statusx=='waiting'){ ?> selected <?php } ?>>Waiting</option>
                                            <option value="diterima" <?php if($statusx=='diterima'){ ?> selected <?php } ?>>Verifikasi</option> -->
                                            <option value="ditolak" <?php if($statusx=='ditolak'){ ?> selected <?php } ?>>Tidak Hadir</option>
                                            <!-- <option value="selesai" <?php if($statusx=='selesai'){ ?> selected <?php } ?>>Selesai</option> -->
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="download/berobat.php?dt=<?php echo $dt ?>&nama=<?php echo $nama ?>&poli=<?php echo $polix ?>&status=<?php echo $statusx ?>" > <i data-feather="save"></i> Download</a>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                    </div>
                                    <div class="form-group col-md-3">
                                    </div>

                                </div>
                            </form>
				
                            <?php
                                if (mysqli_num_rows($tampil)>0){
                                ?>
                                <table id="tbc" class="table table-striped table-bordered">
                                    <thead class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Daftar</th>
                                        <th class="align-middle text-center col-sm-1">Nama Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Identitas</th>
                                        <th class="align-middle text-center col-sm-1">Jenis Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Poli</th>
                                        <th class="align-middle text-center col-sm-2">Jam Berobat</th>
                                        <th class="align-middle text-center col-sm-2">Tanggal Berobat</th>
                                        <!-- <th class="align-middle text-center col-sm-1">Aksi</th> -->
                                       
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Daftar</th>
                                        <th class="align-middle text-center col-sm-1">Nama Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Identitas</th>
                                        <th class="align-middle text-center col-sm-1">Jenis Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Poli</th>
                                        <th class="align-middle text-center col-sm-2">Jam Berobat</th>
                                        <th class="align-middle text-center col-sm-2">Tanggal Berobat</th>
                                        <!-- <th class="align-middle text-center col-sm-1">Aksi</th> -->
                                       
                                        
                                       
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id_pendaftaran, $nik,$id_dokter, $created_at, $tanggal_berobat, $status, $id, $pasien, $nikb, $email, $jk,$no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_pasien, $no_bpjs, $idok, $nama_dokter, $poli_id, $start, $off,$did, $nama_poli)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $created_at ?></td>
                                            <td class="align-middle text-center"><?php echo $pasien ?></td>
                                            <td class="align-middle text-center"><?php echo $nik ?><hr><?php echo $tempat_lahir.", ".$tanggal_lahir ?><hr><?php echo $jk ?><hr><?php echo $no_hp ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($jenis_pasien == 'bpjs'){?>
                                                <?php echo "BPJS"?> <hr>  <?php echo $no_bpjs?> 
                                                <?php 
                                                }else {?>
                                                    <?php echo "Mandiri" ?>
                                                <?php    
                                                }
                                                ?>
                                            </td>
                                            <td class="align-middle text-center"><?php echo $nama_dokter ?></td>
                                            <td class="align-middle text-center"><?php echo $nama_poli ?></td>
                                            <td class="align-middle text-center"><?php echo $start." - ".$off ?></td>
                                            <td class="align-middle text-center"><?php echo $tanggal_berobat ?></td>
                                            <!-- <td class="align-middle text-center"><a href="index.php?page=detail&id=<?php echo $id_pendaftaran ?>" ><i class="fas fa-edit"></i>Cek Detail</a></td> -->
											
                                        </tr>
                                    
                                        
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                                <?php
                                } else {
                                ?>
                                <div class="alert alert-danger p-2 m-1"> Data belum ada atau tidak ditemukan. </div>
                                <?php
                                }
                            ?>
                        
                    </div>    
                    </div>
                    <!-- list and filter end -->
                </section>
               
            </div>
        </div>
</div>   


                        <!-- Modal to add new user starts-->
                        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="add-new-user modal-content pt-0" method="POST">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="mb-1">
                                            <label class="form-label" for="no_obat">ID Obat</label>
                                            <input type="text" id="no_obat" class="form-control dt-uname" placeholder="ID Obat" autocomplete="off" name="no_obat"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" id="nama" class="form-control dt-uname" placeholder="Masukkan nama Anda" autocomplete="off" name="nama"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="harga">Harga</label>
                                            <input type="text" id="harga" class="form-control dt-uname" placeholder="Rp. " autocomplete="off" name="harga"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="stok_awal">Jumlah</label>
                                            <input type="text" id="stok_awal" class="form-control dt-uname" placeholder="Jumlah Obat" autocomplete="off" name="stok_awal"  />
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary me-1 data-submit" name="simpan">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php
      
                        if (isset($_POST['simpan'])) {
                        $no_obat=mysqli_real_escape_string($conn, $_POST['no_obat']);
                        $nama=mysqli_real_escape_string($conn, $_POST['nama']);
                        $harga=mysqli_real_escape_string($conn, $_POST['harga']);
                        $stok_awal=mysqli_real_escape_string($conn, $_POST['stok_awal']);
                        
                        if($stok==!''){
                        mysqli_query($conn, "INSERT INTO obat   (no_obat,nama,harga,stok_awal) VALUES ('$no_obat','$nama','$harga','$stok_awal')") or die (mysqli_error($conn));
                        echo "<script>window.location.href='index.php?page=stok';</script>";
                        }else if ($stok==''){
                            mysqli_query($conn, "INSERT INTO obat   (no_obat,nama,harga,stok_awal,stok) VALUES ('$no_obat','$nama','$harga','$stok_awal','$stok_awal')") or die (mysqli_error($conn));
                            echo "<script>window.location.href='index.php?page=stok';</script>"; 
                            }
                        }
    
    
                    ?>
<!-- END: Content-->
<!-- BEGIN: Page Vendor JS-->
<script src="../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="../app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<!-- END: Page Vendor JS-->



<script>
$(function () {
    $('#tbc tfoot th').each( function () {
        var title = $('#example tfoot th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    

    $("#tbc").DataTable({
        "paging": true,
        "keys": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
    
    
    
});
</script>

    
