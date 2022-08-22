<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">


<?php

// $notes = (isset($_GET['notes']))? $_GET['notes'] :'all';
// $jmltrx = (isset($_GET['jmltrx']))? $_GET['jmltrx'] :'no';

$namax = (isset($_GET['namax']))? $_GET['namax'] : null;
$poli = (isset($_GET['poli']))? $_GET['poli'] : null;
$dt = (isset($_GET['dt']))? $_GET['dt'] : null;
$dt1 = (isset($_GET['dt1']))? $_GET['dt1'] : null;
$poli =(isset($_GET['poli']))? $_GET['poli'] : null;

$sql = "SELECT id_dokter, nama,poli_id, start, off FROM dokter where nama like '%$namax%'" ;


if(!empty($dt) && !empty($dt1)){
    $sql.=" and start <= '$dt' and off >= '$dt1'";
}



if(!empty($poli)){
    $sql.=" and spesialis = '$poli'  ";
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
                            <h4 class="card-title">Pilih Dokter Spesialist</h4> 
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
                                        <label class="form-label" for="namax">Nama Dokter</label>
                                        <div><input name="namax" id="namax" value="<?php echo $namax?>" type="text" class="form-control"
                                                placeholder="Nama Dokter"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label class="form-label" for="poli">Poli</label>
                                    <select name="poli" id="poli" class="form-control">
                                                <option  disabled selected>Pilih Program Poli</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM poli";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                                            if($poli == $row1['nama']){
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
                                        <div>&nbsp;</div>
                                        <div>
                                            <button class="btn btn-primary" type="submit"> <i data-feather="search"></i> Cari</button>
                                            <a class="btn btn-success" href="<?php echo base_url()."admin/export/monitoring_pickup_jnt.php?nama=$nama&notes=$notes&jmltrx=$jmltrx&dt=$dt" ?>" > <i data-feather="save"></i> Download</a>
                                        </div>
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
                                        <th class="align-middle text-center col-sm-1">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Poli</th>
                                        <th class="align-middle text-center col-sm-2">Jam Praktek</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                       
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-1">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Poli</th>
                                        <th class="align-middle text-center col-sm-2">Jam Praktek</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                       
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id, $nama,$spesialis, $start, $off)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $nama ?></td>
                                            <td class="align-middle text-center"><?php echo $spesialis ?></td>
                                            <td class="align-middle text-center"><?php echo $start." - ".$off ?></td>
                                            <td class="align-middle text-center"><a href="index.php?page=daftarb&id=<?php echo $id ?>" ><i class="fas fa-edit"></i> Daftar</a></td>
											
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
                        
                        echo "<script>alert('Data Berhasil Ditambah');window.location.href='index.php?page=stok'</script>";  
                        }else if ($stok==''){
                            mysqli_query($conn, "INSERT INTO obat   (no_obat,nama,harga,stok_awal,stok) VALUES ('$no_obat','$nama','$harga','$stok_awal','$stok_awal')") or die (mysqli_error($conn));
                            echo "<script>alert('Data Berhasil Ditambah');window.location.href='index.php?page=stok'</script>";  
                            }
                        }else{
                            echo "<script>alert('Data Gagal Ditambah');window.location.href='index.php?page=stok'</script>";  
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

    
