<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<?php

$admins = $_SESSION['nama'];


$nama = (isset($_GET['nama']))? $_GET['nama'] : null;
$penerima = (isset($_GET['penerima']))? $_GET['penerima'] : null;
$dt = (isset($_GET['dt']))? $_GET['dt'] : null;



$sql = "SELECT a.id_keluar,a.no_obat, a.admin, a.stok, a.created_at, a.tanggal_expired,  b.id_obat as bid, b.no_obat as idx, b.namax as nama_obat, b.harga, b.stok as bstok 
        FROM obat_keluar a 
        inner join obat b on (a.no_obat = b.no_obat)" ;


if(!empty($nama)){
    $sql.=" and  b.nama like '%$nama%'  ";
}

if(!empty($penerima)){
    $sql.=" and  a.admin like '%$penerima%'  ";
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
                    <div class="container-fluid">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Data Obat Expired</h4> 
                            <div align="right">
								<button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah Data</span></button>            
							</div>
                        </div>
                        <div class="card table-responsive">
                        <form method="get" action="../apoteker/index.php?page=keluar&dt=<?php echo $dt ?>&nama=<?php echo $nama ?>&no=<?php echo $penerima ?>">
                            <input type="hidden"  name="page" class="form-control"  value="keluar" />
                            
                                        
                                <div class="row pb-2 pt-1">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="fp-range">Periode</label>
                                        <input type="text" id="fp-range" name="dt" class="form-control flatpickr-range" placeholder="YYYY-MM-DD - YYYY-MM-DD" value="<?php echo $dt?>" />
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="nama">Nama Obat</label>
                                        <div><input name="nama" id="nama" value="<?php echo $nama?>" type="text" class="form-control"
                                                placeholder="Nama oBAT"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="penerima">Nama Admin</label>
                                        <div><input name="penerima" id="penerima" value="<?php echo $penerima?>" type="text" class="form-control"
                                                placeholder="Nama Admin"></div>
                                    </div>

                                   
                                   
                                             
                                    <div class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="download/keluar.php?dt=<?php echo $dt ?>&nama=<?php echo $nama ?>&no=<?php echo $penerima ?>"><i data-feather="save"></i> Download</a>
                                        </div>
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
                                        <th class="align-middle text-center col-sm-1">Tanggal Buat</th>
                                        <th class="align-middle text-center col-sm-2">Nama Obat</th>
                                        <th class="align-middle text-center col-sm-2">Nama Admin</th>
                                        <th class="align-middle text-center col-sm-1">Jumlah</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Expired</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Masuk</th>
                                        <th class="align-middle text-center col-sm-2">Nama Obat</th>
                                        <th class="align-middle text-center col-sm-2">Nama Admin</th>
                                        <th class="align-middle text-center col-sm-1">Jumlah</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Expired</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list( $id_keluar,$no_obat, $admin, $stok, $created_at, $tanggal_expired,$bid, $idx, $nama_obat, $harga, $bstok )=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $created_at ?></td>
                                            <td class="align-middle text-center"><?php echo $nama_obat ?></td>
                                            <td class="align-middle text-center"><?php echo $admin ?> </td>
                                            <td class="align-middle text-center"><?php echo $stok ?> </td>
                                            <td class="align-middle text-center"><?php echo $tanggal_expired ?> </td>
											<td class="align-middle text-center"><a href="../apoteker/obat/delete1.php?id=<?php echo $id_keluar ?>"  onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i class="fas fa-trash-alt"></i> Delete </a></td>
                                            
                                            
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
                                <form class="add-new-user modal-content pt-0" action="../apoteker/obat/keluar_proses.php" method="POST">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat Expired</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="mb-1">
                                        <label class="form-label" for="no_obat">Nama Obat</label>
                                            <select name="no_obat" id="no_obat" class="form-control">
                                                <option  disabled selected>Pilih Nama Obat</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM obat";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                                            if($row['namax'] == $row1['no_obat']){
                                                                $selected = "selected";
                                                            }else{
                                                                $selected = "";
                                                            }

                                                        echo "<option {$selected} value='{$row1['no_obat']}'> {$row1['namax']} </option>";
                                                        }
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="admin">Admin</label>
                                            <input type="text" id="admin" class="form-control dt-uname" placeholder="" autocomplete="off" name="admin" value="<?php echo $admins ?>" readonly />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="stok">Jumlah</label>
                                            <input type="text" id="stok" class="form-control dt-uname" placeholder="Jumlah " autocomplete="off" name="stok"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="expired">Tanggal Expired</label>
                                            <input type="date" id="expired" class="form-control dt-uname" placeholder="Tanggal expired " autocomplete="off" name="expired"  />
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary me-1 data-submit" name="simpan">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <!-- <?php
      
                        // if (isset($_POST['simpan'])) {
                        // $no_obat=mysqli_real_escape_string($conn, $_POST['no_obat']);
                        // $admins=$_SESSION['id'];
                        // $stok=mysqli_real_escape_string($conn, $_POST['stok']);
                        // $expired=mysqli_real_escape_string($conn, $_POST['expired']);
                        
                        // if($stok==!''){
                        // mysqli_query($conn, "INSERT INTO obat_keluar   (no_obat,penerima,stok) VALUES ('$no_obat','$penerima','$stok')") or die (mysqli_error($conn));
                        
                        // echo "<script>window.location.href='index.php?page=stok';</script>";
                        // }
                        // }
    
    
                    ?> -->
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

    
