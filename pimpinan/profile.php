<?php
$id = $_SESSION ['id'] ;
$nama = $_SESSION ['nama'];
$username = $_SESSION ['username'];
$level = $_SESSION ['level'] ;
$password = $_SESSION ['password_hint'];
$no_hp = $_SESSION ['no_hp'];
?>

<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Profil</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <div class="mb-1">
                <label class="form-label" for="nama">nama</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $nama ?>" aria-describedby="nama" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="no_hp">No Hp</label>
                <input class="form-control" id="no_hp" type="text" name="no_hp" value="<?php echo $no_hp ?>" aria-describedby="no_hp" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                <label class="form-label" for="login">Username</label>
                <input class="form-control" id="username" type="text" name="username" value="<?php echo $username ?>" aria-describedby="username" autofocus="" tabindex="1" />
            </div>
            <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password" >Password</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password" name="password" value="<?php echo $password ?>" aria-describedby="password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
            </div>
            <!-- <div class="mb-1">
                <label class="form-label" for="level">Hak Akses</label>
                    <select name="level" id="level" class="select form-select">
                        <option disabled selected>Pilih Hak Akses</option>
                        <option value="admin" <?php if($level=='admin'){ ?> selected <?php } ?>>Admin</option>
                        <option value="dokter" <?php if($level=='dokter'){ ?> selected <?php } ?>>Dokter</option>
                        <option value="apoteker"<?php if($level=='apoteker'){ ?> selected <?php } ?>>Apoteker</option>
                        <option value="pimpinan" <?php if($level=='pimpinan'){ ?> selected <?php } ?>>Pimpinan</option>
                        <option value="pengelolaan" <?php if($level=='pendaftaran'){ ?> selected <?php } ?>>Admin Pendaftaran</option>
                    </select>
            </div> -->
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
                    $no_hp=mysqli_real_escape_string($conn, $_POST['no_hp']);
                    $username=mysqli_real_escape_string($conn, $_POST['username']);
                    $password1=mysqli_real_escape_string($conn, $_POST['password']);
                    $password=md5($password1);
                    if($password != ""){
                        mysqli_query($conn, "UPDATE user set nama='$nama',no_hp='$no_hp', username='$username', password='$password' , password_hint='$password1' WHERE id='$id' ") or die (mysqli_error($conn));    
                      
                        echo "<script>alert('Data Berhasil Di ubah');window.location.href='index.php?page=profile'</script>";  
                        } 
                    }
               ?>
<!--/ form -->

