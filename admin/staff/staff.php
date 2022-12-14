<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<?php




$sql = "SELECT id, nama, no_hp, level, username, password, password_hint FROM user" ;


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
                            <h4 class="card-title">Data Akun Staff</h4> 
                            <div align="right">
								<button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah User</span></button>            
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
                                        <th class="align-middle text-center col-sm-2">Nama User</th>
                                        <th class="align-middle text-center col-sm-2">Nomor Telepon</th>
                                        <th class="align-middle text-center col-sm-1">Level</th>
                                        <th class="align-middle text-center col-sm-1">username</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">No</th>
                                        <th class="align-middle text-center col-sm-2">Nama User</th>
                                        <th class="align-middle text-center col-sm-2">Nomor Telepon</th>
                                        <th class="align-middle text-center col-sm-1">Level</th>
                                        <th class="align-middle text-center col-sm-1">username</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                        
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id,$nama,$no_hp, $level, $username, $password,$password_hint)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $no++ ?></td>
                                            <td class="align-middle text-center"><?php echo $nama ?></td>
                                            <td class="align-middle text-center"><?php echo $no_hp ?> </td>
                                            <td class="align-middle text-center"><?php echo $level ?> </td>
                                            <td class="align-middle text-center"><?php echo $username ?> </td>
                                            <td class="align-middle text-center"><a href="index2.php?page=edits&id=<?php echo $id ?>" ><i class="fas fa-edit"></i> Edit</a></td>
											<td class="align-middle text-center"><a href="../admin/staff/delete.php?id=<?php echo $id ?>"  onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><i class="fas fa-trash-alt"></i> Delete </a></td>
                                            
                                            
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">??</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="mb-1">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" id="nama" class="form-control dt-uname" placeholder="Masukkan nama Anda" autocomplete="off" name="nama"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="no_hp">No Telepon</label>
                                            <input type="text" id="no_hp" class="form-control dt-uname" placeholder="08xxxxxxxx" autocomplete="off" name="no_hp"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" class="form-control dt-uname" placeholder="Masukkan Username Anda" autocomplete="off" name="username"  />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control dt-contact" placeholder="Masukkan Password Anda" autocomplete="off" name="password"  />
                                        </div>
                    
                                        <div class="mb-1">
                                            <label class="form-label" for="level">Hak Akses</label>
                                            <select name="level" id="level" class="select form-select">
                                                <option disabled selected>Pilih Hak Akses</option>
                                                <option value="admin">Admin Pengelola</option>
                                                <option value="dokter">Dokter</option>
                                                <option value="apoteker">Apoteker</option>
                                                <option value="pimpinan">Pimpinan</option>
                                                <option value="pendaftaran">Admin Pendaftaran</option>
                                            </select>
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
                        $no_hp=mysqli_real_escape_string($conn, $_POST['no_hp']);
                        $username=mysqli_real_escape_string($conn, $_POST['username']);
                        $password1=mysqli_real_escape_string($conn, $_POST['password']);
                        $password=md5($password1);
                        $level=mysqli_real_escape_string($conn, $_POST['level']);
                        mysqli_query($conn, "INSERT INTO user    (nama,no_hp,username, password, level, password_hint) VALUES ('$nama','$no_hp','$username', '$password', '$level', '$password1')") or die (mysqli_error($conn));
                       
                        echo "<script>alert('Data Berhasil Ditambah');window.location.href='index2.php?page=staff'</script>";  
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

    
