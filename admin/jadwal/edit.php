<?php

$id=mysqli_real_escape_string($conn,$_GET['id']);
$tampil=mysqli_query($conn,"select * from dokter where id_dokter = '$id'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);
?>


<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Data Jadwal Praktik</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <div class="mb-1">
                <label class="form-label" for="nama">nama</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>" aria-describedby="nama" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="start">Start</label>
                <input class="form-control" id="start" type="time" name="start" value="<?php echo $data['start'] ?>" aria-describedby="start" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="off">Off</label>
                <input class="form-control" id="off" type="time" name="off" value="<?php echo $data['off'] ?>" aria-describedby="off" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                    <select name="poli" id="poli" class="form-control">
                                                <option  disabled selected>Pilih Program Poli</option>
                                                <?php  

                                
                                                    $query1 = "SELECT * FROM poli";
                                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                                    if(mysqli_num_rows($result1) > 0 ){
                                                        while ($row1 = mysqli_fetch_assoc($result1)) {


                                                        echo "<option  value='{$row1['id']}'> {$row1['nama']} </option>";
                                                        }
                                                    }
                                                ?>

                    </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" type="text" name="username" value="<?php echo $data['username'] ?>" aria-describedby="off" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" id="username" type="password" name="password" value="<?php echo $data['password'] ?>" aria-describedby="off" autofocus="" tabindex="1" />
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
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="update">Simpan</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
            
        </div>
    </form>
</div>
</div>
                <?php
      
                    if (isset($_POST['update'])) {
                    $nama=mysqli_real_escape_string($conn, $_POST['nama']);
                    $start=mysqli_real_escape_string($conn, $_POST['start']);
                    $off=mysqli_real_escape_string($conn, $_POST['off']);
                    $username=mysqli_real_escape_string($conn, $_POST['username']);
                    $password=mysqli_real_escape_string($conn, $_POST['password']);
                    $password1=md5($password);
                    $hari1=mysqli_real_escape_string($conn, $_POST['hari1']);
                    $hari2=mysqli_real_escape_string($conn, $_POST['hari2']);
                    $poli=mysqli_real_escape_string($conn, $_POST['poli']);
                    if($nama != ""){
                        mysqli_query($conn, "UPDATE dokter set nama='$nama',start='$start', off='$off', username='$username', password='$password1', password_hint='$password', mulai='$hari1', selesai='$hari2', poli_id='$poli' WHERE id_dokter='$id' ") or die (mysqli_error($conn));    
                       
                        echo "<script>alert('Data berhasil di edit');window.location.href='index2.php?page=ejadwal&id=$id'</script>";  
                        } 
                    }
               ?>
<!--/ form -->

