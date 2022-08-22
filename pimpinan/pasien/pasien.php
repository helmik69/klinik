<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">

<?php

$dt = (isset($_GET['dt']))? $_GET['dt'] : null;
$jpx = (isset($_GET['jpx']))? $_GET['jpx'] : 'semua';



$add = " " ;
if (!empty($jpx)){
    if ($jpx == "semua"){
		$add =" " ; 
	}  
    else if($jpx == "bpjs") {
	    $add = " and jenis_pasien = 'bpjs'";
	} else if ($jpx == "mandiri"){
        $add = " and jenis_pasien ='mandiri'";
	} 
	
}

$sql = "SELECT id, nama, nik, email, jk , no_hp, tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs, username, password, password_hint, created_at, updated_at 
FROM pasien where id > 0 $add" ;



if(!empty($dt)){
    $date = explode(" to ",$dt);
    $start = $date[0]." 00:00:00" ;
    if (!empty($date[1])){
        $end = $date[1]." 23:59:59" ;
    } else {
        $end = $date[0]." 23:59:59" ;
    }
    
    $sql.=" and  created_at between '$start' and  '$end' ";
}


$sql.=" order by created_at ASC  ";

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
                            <h4 class="card-title">Data Pasien</h4> 
                        </div>
                        <div class="card table-responsive">
                        <form method="get" action="../pimpinan/index.php?page=pasien&dt=<?php echo $dt ?>">
                            <input type="hidden"  name="page" class="form-control"  value="pasien" />
                            
                                        
                                <div class="row pb-2 pt-1">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="fp-range">Periode</label>
                                        <input type="text" id="fp-range" name="dt" class="form-control flatpickr-range" placeholder="YYYY-MM-DD - YYYY-MM-DD" value="<?php echo $dt?>" />
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="jpx">Jenis Pasien</label>
                                        <select name="jpx" id="jpx" class="form-control">
                                            <option value="semua" <?php if ($jpx=="semua"){ ?> selected <?php } ?>>Tampilkan Semua</option>
                                            <option value="bpjs" <?php if ($jpx=="bpjs"){ ?> selected <?php } ?>>BPJS</option>
                                            <option value="mandiri" <?php if ($jpx=="mandiri"){ ?> selected <?php } ?>>Mandiri</option>
                                           
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="download/pasien.php?dt=<?php echo $dt ?>&jpx=<?php echo $jpx ?>"  > <i data-feather="save"></i> Download</a>
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
                                        <th class="align-middle text-center col-sm-2">Nama</th>
                                        <th class="align-middle text-center col-sm-2">Jenis Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Lahir</th>
                                        <th class="align-middle text-center col-sm-1">Alamat</th>
                                        <th class="align-middle text-center col-sm-1">Jenis kelamin</th>
                                        <th class="align-middle text-center col-sm-1">username</th>
                                       
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Daftar</th>
                                        <th class="align-middle text-center col-sm-2">Nama</th>
                                        <th class="align-middle text-center col-sm-2">Jenis Pasien</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Lahir</th>
                                        <th class="align-middle text-center col-sm-1">Alamat</th>
                                        <th class="align-middle text-center col-sm-1">Jenis Kelamin</th>
                                        <th class="align-middle text-center col-sm-1">username</th>
                               
                                        
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id, $nama, $nik, $email, $jk , $no_hp, $tempat_lahir,$tanggal_lahir,$alamat,$jenis_pasien,$no_bpjs, $username, $password, $password_hint, $created_at, $update_at)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $created_at ?></td>
                                            <td class="align-middle text-center"><?php echo $nama ?> <hr><?php echo $nik ?> <hr><?php echo $no_hp ?> </td>
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
                                            <td class="align-middle text-center"><?php echo $tempat_lahir ?><?php echo ", "?> <?php echo $tanggal_lahir ?>  </td>
                                            <td class="align-middle text-center"><?php echo $alamat ?> </td>
                                            <td class="align-middle text-center"><?php echo $jk ?> </td>
                                            <td class="align-middle text-center"><?php echo $username ?> </td>
											
                                            
                                            
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
        "lengthChange": false,
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

    
