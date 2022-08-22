
<?php
include 'config/config.php';

$nik = (isset($_GET['nik']))? $_GET['nik'] : null;

$sql = "SELECT id, nama, nik, email, jk , no_hp, tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs, username, password, password_hint, created_at, updated_at FROM pasien where nik = '$nik' " ;



$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$tampil = mysqli_query($conn, $sql);

?>


<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Cari Akun</h2>
                                <p class="card-text mb-2">Input NIK untuk login !</p>
                                <!-- <form class="auth-register-form mt-2" action="cari.php" method="POST"> -->
                                <form class="auth-register-form mt-2" method="get" action="cari.php?page=cari&nik=<?php echo $nik ?>">
                                <input type="hidden"  name="page" class="form-control"  value="cari" />
                                    <div class="mb-1">
                                        <label class="form-label" for="nik">NIK</label>
                                        <input class="form-control" id="nik" type="text" name="nik" placeholder="Input NIK Anda" aria-describedby="register-username" autofocus="" tabindex="1" />
                                    </div>
                                    
                                    <button class="btn btn-primary w-100" type="submit" tabindex="5">Cari</button>
                                </form>
</br>

                                <?php
                                if (($nik)>0){
                                ?>
                                <table id="tbc" class="table table-striped table-bordered">
                                    <thead class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">Nama</th>
                                        <th class="align-middle text-center col-sm-2">nik</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                       
                                        
                                    </tr>
                                    </thead>
                                    <tfoot class="table-light" style="color:black">
                                    <tr>
                                        <th class="align-middle text-center col-sm-1">Nama</th>
                                        <th class="align-middle text-center col-sm-2">nik</th>
                                        <th class="align-middle text-center col-sm-1">Aksi</th>
                                       
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1; 
             
                                        while (list($id, $nama, $nik, $email, $jk , $no_hp, $tempat_lahir,$tanggal_lahir,$alamat,$jenis_pasien,$no_bpjs, $username, $password, $password_hint, $created_at, $update_at)=mysqli_fetch_array($tampil)) {
                                            
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center"><?php echo $nama ?></td>
                                            <td class="align-middle text-center"><?php echo $nik ?></td>
                                            <td class="align-middle text-center"><a href="login2.php?page=login&id=<?php echo $id ?>" ><i class="fas fa-edit"></i> Login</a></td>
											
                                        </tr>
                                    
                                        
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                                <?php
                                } else {
                                ?>
                                <!-- <div class="alert alert-danger p-2 m-1"> Data belum ada atau tidak ditemukan. </div> -->
                                <?php
                                }
                            ?>
                        
                            </div>
                        </div>