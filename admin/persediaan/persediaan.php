<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<?php




$sql = "SELECT id,no_obat, nama,harga, stok_awal, stok, created_at, updated_at FROM obat" ;


$sql.=" order by id ASC  ";

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
                            <h4 class="card-title">Data Persediaan Obat</h4> 
                            <div align="right">
								<button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah Data</span></button>            
							</div>
                        </div>
                        <div class="card table-responsive">
                       
				
                            <?php
                                if (mysqli_num_rows($tampil)>0){
                                ?>
                                <table id="tbc" class="table table-striped table-bordered">
                                    <thead class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Buat</th>
                                        <th class="align-middle text-center col-sm-2">ID Obat</th>
                                        <th class="align-middle text-center col-sm-2">Nama Obat</th>
                                        <th class="align-middle text-center col-sm-1">harga</th>
                                        <th class="align-middle text-center col-sm-1">Stok awal</th>
                                        <th class="align-middle text-center col-sm-1">Stok Keseluruhan</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Tanggal Buat</th>
                                        <th class="align-middle text-center col-sm-2">ID Obat</th>
                                        <th class="align-middle text-center col-sm-2">Nama Obat</th>
                                        <th class="align-middle text-center col-sm-1">harga</th>
                                        <th class="align-middle text-center col-sm-1">Stok awal</th>
                                        <th class="align-middle text-center col-sm-1">Stok Keseluruhan</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list( $id,$no_obat, $nama,$harga, $stok_awal, $stok, $created_at, $updated_at)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $created_at ?></td>
                                            <td class="align-middle text-center"><?php echo $no_obat ?></td>
                                            <td class="align-middle text-center"><?php echo $nama ?></td>
                                            <td class="align-middle text-center"><?php echo number_format ($harga) ?> </td>
                                            <td class="align-middle text-center"><?php echo $stok_awal ?> </td>
                                            <td class="align-middle text-center"><?php echo $stok ?> </td>
                                            <td class="align-middle text-center"><a href="index2.php?page=estok&id=<?php echo $id ?>" ><i class="fas fa-edit"></i> Edit</a></td>
											<td class="align-middle text-center"><a href="../admin/persediaan/delete.php?id=<?php echo $id ?>"  onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i class="fas fa-trash-alt"></i> Delete </a></td>
                                            
                                            
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
                        echo "<script>window.location.href='index2.php?page=stok';</script>";
                        }else if ($stok==''){
                            mysqli_query($conn, "INSERT INTO obat   (no_obat,nama,harga,stok_awal,stok) VALUES ('$no_obat','$nama','$harga','$stok_awal','$stok_awal')") or die (mysqli_error($conn));
                            echo "<script>window.location.href='index2.php?page=stok';</script>"; 
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

    
