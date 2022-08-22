<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<?php


$nama = (isset($_GET['nama']))? $_GET['nama'] : null;
$no_obat = (isset($_GET['no_obat']))? $_GET['no_obat'] : null;
$dt = (isset($_GET['dt']))? $_GET['dt'] : null;



$sql = "SELECT a.id_obat, a.no_obat, a.id_jenis as ids , a.namax, a.harga, a.stok_awal, a.stok, a.created_at, a.updated_at, b.id_jenis, b.jenis_obat FROM obat a inner join jenis_obat b on (b.id_jenis=a.id_jenis) where id_obat > 0" ;



if(!empty($nama)){
    $sql.=" and  a.nama like '%$nama%'  ";
}

if(!empty($no_obat)){
    $sql.=" and  a.no_obat like '%$no_obat%'  ";
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


$sql.=" order by a.created_at ASC  ";

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
                        <form method="get" action="../apoteker/index.php?page=stok&dt=<?php echo $dt ?>&nama=<?php echo $nama ?>&no=<?php echo $no_obat ?>">
                            <input type="hidden"  name="page" class="form-control"  value="stok" />
                            
                                        
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
                                        <label class="form-label" for="no_obat">No 0bat</label>
                                        <div><input name="no_obat" id="no_obat" value="<?php echo $no_obat?>" type="text" class="form-control"
                                                placeholder="No Obat"></div>
                                    </div>

                                   
                                   
                                             
                                    <div class="form-group col-md-3">
                                        <div>&nbsp;</div>
                                        <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="download/stok.php?dt=<?php echo $dt ?>&nama=<?php echo $nama ?>&no=<?php echo $no_obat ?>"><i data-feather="save"></i> Download</a>
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
                                        <th class="align-middle text-center col-sm-2">ID Obat</th>
                                        <th class="align-middle text-center col-sm-2">Jenis Obat</th>
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
                                        <th class="align-middle text-center col-sm-2">Jenis Obat</th>
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
             
                                        while (list( $id_obat,$no_obat, $ids,$nama,$harga, $stok_awal, $stok, $created_at, $updated_at, $id_jenis, $jenis_obat)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $created_at ?></td>
                                            <td class="align-middle text-center"><?php echo $no_obat ?></td>
                                            <td class="align-middle text-center"><?php echo $jenis_obat ?></td>
                                            <td class="align-middle text-center"><?php echo $nama ?></td>
                                            <td class="align-middle text-center"><?php echo number_format ($harga) ?> </td>
                                            <td class="align-middle text-center"><?php echo $stok_awal ?> </td>
                                            <td class="align-middle text-center"><?php echo $stok ?> </td>
                                            <td class="align-middle text-center"><a href="index.php?page=estok&id=<?php echo $id_obat ?>" ><i class="fas fa-edit"></i> Edit</a></td>
											<td class="align-middle text-center"><a href="../apoteker/persediaan/delete.php?id=<?php echo $id_obat ?>"  onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i class="fas fa-trash-alt"></i> Delete </a></td>
                                            
                                            
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
                                        <label class="form-label" for="jenis_obat">Jenis Obat</label>
                                            <select name="jenis_obat" id="jenis_obat" class="form-control">
                                                <option  disabled selected>Pilih Jenis Obat</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM jenis_obat";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                                          
                                                        echo "<option value='{$row1['id_jenis']}'> {$row1['jenis_obat']} </option>";
                                                        }
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" id="nama" class="form-control dt-uname" placeholder="Masukkan nama Obat" autocomplete="off" name="nama"  />
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
                        $jenis_obat=mysqli_real_escape_string($conn, $_POST['jenis_obat']);
                        
                        if($stok==!''){
                        mysqli_query($conn, "INSERT INTO obat   (no_obat,id_jenis,namax,harga,stok_awal) VALUES ('$no_obat','$jenis_obat','$nama','$harga','$stok_awal')") or die (mysqli_error($conn));
                        echo "<script>window.location.href='index.php?page=stok';</script>";
                        }else if ($stok==''){
                            mysqli_query($conn, "INSERT INTO obat   (no_obat,id_jenis,namax,harga,stok_awal,stok) VALUES ('$no_obat','$jenis_obat','$nama','$harga','$stok_awal','$stok_awal')") or die (mysqli_error($conn));
                            
                            echo "<script>alert('Data Berhasil Ditambah');window.location.href='index.php?page=stok'</script>";  
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

    
