
<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Daftar Berobat</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" method="POST">
        <div class="row">
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label" for="tanggal_berobat">Tanggal Berobat</label>
                    <input class="form-control" id="tanggal_berobat" type="date" name="tanggal_berobat"  aria-describedby="tanggal_berobat" autofocus="" tabindex="1" />
                </div>
                <div class="mb-1">
                    <label class="form-label" for="poli">Daftar Poli</label>
                        <select name="poli" id="poli"  class="form-control">
                            <option  disabled selected >Pilih Poli</option>
                                <?php  

                                
                                    $query1 = "SELECT * FROM poli";
                                    $result1 = mysqli_query($conn,$query1) or die("query failed.");

                                    if(mysqli_num_rows($result1) > 0 ){
                                    while ($row1 = mysqli_fetch_assoc($result1)) {

                                    echo "<option {$selected} value='{$row1['id']}'> {$row1['nama']} </option>";
                                    }
                                    }
                                    ?>

                        </select>
            </div>
            
            <div class="mb-1">
                    <label class="form-label" for="dokter">Nama Dokter</label>
                        <select name="dokter" id="dokter"  class="form-control">
                            <option  disabled selected >Pilih Dokter</option>
                               

                        </select>
            </div>
            <div class="mb-1">
                <label class="form-label" for="waktu">Waktu Pelayanan</label>
                <input class="form-control" id="waktu" type="text" name="waktu" value="" aria-describedby="nama" autofocus="" tabindex="1" readonly />
            </div>
            
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="simpan">Simpan</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
            
        </div>
    </form>
</div>
</div>

                <?php
      
                    if (isset($_POST['simpan'])) {
                    $nik=$_SESSION['nik'];
                    $dokter=mysqli_real_escape_string($conn, $_POST['dokter']);
                    $waktu=mysqli_real_escape_string($conn, $_POST['waktu']);
                    $tanggal_berobat=mysqli_real_escape_string($conn, $_POST['tanggal_berobat']);
                    
                   
                        mysqli_query($conn, "INSERT INTO berobat  (nik,id_dokter,jadwal,tanggal_berobat, status) VALUES ('$nik','$dokter','$waktu','$tanggal_berobat','waiting') ") or die (mysqli_error($conn));    
                        echo "<script>alert('Anda Berhasil Melakukan Pendaftaran');window.location.href='index.php?page=pendaftaran';</script>"; 
                        
                        
                    }
               ?>
<!--/ form -->

