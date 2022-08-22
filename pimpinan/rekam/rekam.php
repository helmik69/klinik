<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">


<?php

// $notes = (isset($_GET['notes']))? $_GET['notes'] :'all';
// $jmltrx = (isset($_GET['jmltrx']))? $_GET['jmltrx'] :'no';

$dt = (isset($_GET['dt']))? $_GET['dt'] : null;

$sql = "SELECT a.id, a.nik,a.id_dokter, a.created_at, a.anamnesa, a.diagnosa , b.id as bid, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs,  c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM rekam_medis a 
        inner join pasien b on (a.nik = b.nik)
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where a.id > 0 " ;






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
                            <h4 class="card-title">Riwayat Rekam Medis</h4> 
                            
                        </div>
                        <div class="card table-responsive">
                        <form method="get" action="../pimpinan/index.php?page=rekam&dt=<?php echo $dt ?>">
                            <input type="hidden"  name="page" class="form-control"  value="rekam" />
                            
                                        
                                <div class="row pb-2 pt-1">
                                <div class="form-group col-md-3">
                                        <label class="form-label" for="fp-range">Periode</label>
                                        <input type="text" id="fp-range" name="dt" class="form-control flatpickr-range" placeholder="YYYY-MM-DD - YYYY-MM-DD" value="<?php echo $dt?>" />
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="download/rekam.php?dt=<?php echo $dt ?>"  > <i data-feather="save"></i> Download</a>
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
                                        <th class="align-middle text-center col-sm-1">Tanggal</th>
                                        <th class="align-middle text-center col-sm-1">Nama Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Anamnesa</th>
                                        <th class="align-middle text-center col-sm-2">Diagnosa</th>
                                       
                                       
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal</th>
                                        <th class="align-middle text-center col-sm-1">Nama Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Anamnesa</th>
                                        <th class="align-middle text-center col-sm-2">Diagnosa</th>
                                       
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id, $nik,$id_dokter, $created_at, $anamnesa, $diagnosa , $bid, $pasien, $nikb, $email, $jk,$no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_pasien, $no_bpjs,  $idok, $nama_dokter, $spesialis, $start, $off)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $created_at ?></td>
                                            <td class="align-middle text-center"><?php echo $pasien ?></td>
                                            <td class="align-middle text-center"><?php echo $nama_dokter ?></td>
                                            <td class="align-middle text-center"><?php echo $anamnesa ?></td>
                                            <td class="align-middle text-center"><?php echo $diagnosa ?></td>
                                            
											
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

    
