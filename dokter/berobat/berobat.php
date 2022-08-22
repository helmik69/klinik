<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">


<?php

// $notes = (isset($_GET['notes']))? $_GET['notes'] :'all';
// $jmltrx = (isset($_GET['jmltrx']))? $_GET['jmltrx'] :'no';

$nama = (isset($_GET['nama']))? $_GET['nama'] : null;
$dt = (isset($_GET['dt']))? $_GET['dt'] : null;
$dt1 = (isset($_GET['dt1']))? $_GET['dt1'] : null;
$poli =(isset($_GET['poli']))? $_GET['poli'] : null;
$dokter = $_SESSION ['id_dokter'];

$sql = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM berobat a inner join pasien b on (a.nik = b.nik) 
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where a.status='diterima' and c.id_dokter = '$dokter' " ;


if(!empty($dt) && !empty($dt1)){
    $sql.=" and c.start >= '$dt' or c.off > '$dt1'";
}

if(!empty($nama)){
    $sql.=" and b.nama like '%$nama%' ";
}



$sql.=" order by id_dokter ASC  ";

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
                            <!-- <div align="right">
								<button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah Data</span></button>            
							</div> -->
                        </div>
                        <div class="card table-responsive">
                        <form method="get" action="../pasien/index.php?page=daftar&dt=<?php echo $dt ?>&dt1=<?php echo $dt1 ?>">
                            <input type="hidden"  name="page" class="form-control"  value="daftar" />
                            
                                        
                                <div class="row pb-2 pt-1">
                                    <div class="form-group col-md-2">
                                        <label class="form-label" for="fp-range">Dari Jam</label>
                                        <input type="time" id="fp-range" name="dt" class="form-control"  value="<?php echo $dt?>" />
                                        
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-label" for="fp-range">Sampai Jam</label>
                                        <input type="time" id="fp-range" name="dt1" class="form-control"  value="<?php echo $dt1?>" />
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="nama">Nama Pasien</label>
                                        <div><input name="nama" id="nama" value="<?php echo $nama?>" type="text" class="form-control"
                                                placeholder="Nama Pasien"></div>
                                    </div>
                                   
                                    <div class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        <!-- <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="<?php echo base_url()."admin/export/monitoring_pickup_jnt.php?nama=$nama&notes=$notes&jmltrx=$jmltrx&dt=$dt" ?>" > <i data-feather="save"></i> Download</a>
                                        </div> -->
                                    </div>
                                    <div class="form-group col-md-3">
                                    </div>
                                    <div class="form-group col-md-3">
                                    </div>

                                    <!-- <div align="right" class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        
                                            <button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Quick Notes</span></button>            
                                        
                                    </div> -->
                                       
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
                                        <th class="align-middle text-center col-sm-2">Jam Berobat</th>
                                        <th class="align-middle text-center col-sm-2">Tanggal Berobat</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Daftar</th>
                                        <th class="align-middle text-center col-sm-1">Nama Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Identitas</th>
                                        <th class="align-middle text-center col-sm-1">Jenis Pasien</th>
                                        <th class="align-middle text-center col-sm-2">Jam Berobat</th>
                                        <th class="align-middle text-center col-sm-2">Tanggal Berobat</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                       
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id_pendaftaran, $nik,$id_dokter, $created_at, $tanggal_berobat, $status, $id, $pasien, $nikb, $email, $jk,$no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_pasien, $no_bpjs, $idok, $nama_dokter, $poli_id, $start, $off)=mysqli_fetch_array($tampil)) {
                                            
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
                                            <td class="align-middle text-center"><?php echo $start." - ".$off ?></td>
                                            <td class="align-middle text-center"><?php echo $tanggal_berobat ?></td>
                                            <td class="align-middle text-center"><a href="index.php?page=detail&id_pendaftaran=<?php echo $id_pendaftaran ?>" ><i class="fas fa-edit"></i>Diagnosa</a></td>
                                            
											
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
        "searching": false,
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

    
