<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<?php




$sql = "SELECT a.id_dokter, a.nama,a.poli_id, a.start, a.off,a.mulai,a.selesai, b.id, b.nama as poli FROM dokter a inner join poli b on (a.poli_id = b.id) " ;


$sql.=" order by id_dokter ASC  ";

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
                            <h4 class="card-title">Data Jadwal Praktik Dokter</h4> 
                            <div align="right">
								<button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah Data</span></button>  
                                <div class="mt-2">
                                  <a class="btn btn-success" href="download/jadwal.php" > <i data-feather="save"></i> Download</a>
                                </div>          
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
                                        <th class="align-middle text-center col-sm-2">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">Poli</th>
                                        <th class="align-middle text-center col-sm-1">Jadwal Praktik</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-2">Nama Dokter</th>
                                        <th class="align-middle text-center col-sm-2">poli</th>
                                        <th class="align-middle text-center col-sm-1">Jadwal Praktik</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id_dokter, $nama,$poli_id, $start, $off,$mulai,$selesai, $id, $poli)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $nama ?></td>
                                            <td class="align-middle text-center"><?php echo $poli ?></td>
                                            <td class="align-middle text-center"><?php echo $start." - ".$off ?> <hr> <?php echo $mulai." s/d ".$selesai ?></td>
                                            <td class="align-middle text-center"><a href="index2.php?page=ejadwal&id=<?php echo $id_dokter ?>" ><i class="fas fa-edit"></i> Edit</a></td>
											<td class="align-middle text-center"><a href="../admin/jadwal/delete.php?id=<?php echo $id_dokter ?>"  onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i class="fas fa-trash-alt"></i> Delete </a></td>
                                            
                                            
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="mb-1">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" id="nama" class="form-control dt-uname" placeholder="Masukkan nama Anda" autocomplete="off" name="nama"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="start">Start</label>
                                            <input type="time" id="start" class="form-control dt-uname"  autocomplete="off" name="start"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="off">off</label>
                                            <input type="time" id="off" class="form-control dt-uname"  autocomplete="off" name="off"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="hari1">Hari</label>
                                            <select name="hari1" id="hari1" class="form-control">
                                                <option>Pilih Jadwal</option>
                                                <option value="senin">Senin</option>
                                                <option value="selasa">Selasa</option>
                                                <option value="rabu">Rabu</option>
                                                <option value="kamis">Kamis</option>
                                                <option value="jumat">Juma'at</option>
                                                <option value="sabtu">Sabtu</option>
                                                <option value="minggu">Minggu</option>
                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="hari2">Hari</label>
                                            <select name="hari2" id="hari2" class="form-control">
                                                <option>Pilih Jadwal</option>
                                                <option value="senin">Senin</option>
                                                <option value="selasa">Selasa</option>
                                                <option value="rabu">Rabu</option>
                                                <option value="kamis">Kamis</option>
                                                <option value="jumat">Juma'at</option>
                                                <option value="sabtu">Sabtu</option>
                                                <option value="minggu">Minggu</option>
                                            </select>
                                        </div>
                                        <div class="mb-1">
                                        <label class="form-label" for="poli">Poli</label>
                                            <select name="poli" id="poli" class="form-control">
                                                <option  disabled selected>Pilih Program Poli</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM poli";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                                          
                                                        echo "<option value='{$row1['id']}'> {$row1['nama']} </option>";
                                                        }
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" class="form-control dt-uname" placeholder="Masukkan Username Anda" autocomplete="off" name="username"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control dt-contact" placeholder="Masukkan Password Anda" autocomplete="off" name="password"  />
                                        </div>
                                        <button type="submit" class="btn btn-primary me-1 data-submit" name="simpan">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php
      
                        if (isset($_POST['simpan'])) {
                        $nama=mysqli_real_escape_string($conn, $_POST['nama']);
                        $start=mysqli_real_escape_string($conn, $_POST['start']);
                        $off=mysqli_real_escape_string($conn, $_POST['off']);
                        $poli=mysqli_real_escape_string($conn, $_POST['poli']);
                        $username=mysqli_real_escape_string($conn, $_POST['username']);
                        $password1=mysqli_real_escape_string($conn, $_POST['password']);
                        $password=md5($password1);
                        $hari1=mysqli_real_escape_string($conn, $_POST['hari1']);
                        $hari2=mysqli_real_escape_string($conn, $_POST['hari2']);
                        mysqli_query($conn, "INSERT INTO dokter    (nama, poli_id,start, off,username,password,password_hint,mulai, selesai) VALUES ('$nama','$poli','$start','$off','$username','$password','$password1','$hari1','$hari2')") or die (mysqli_error($conn));
               
                        echo "<script>alert('Data Berhasil Ditambah');window.location.href='index2.php?page=jadwal'</script>";  
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

    
