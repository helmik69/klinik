<?php
$adminx=$_SESSION['nama'];


$query = mysqli_query($conn, "SELECT max(nomor_transaksi) as nomor_transaksi FROM transaksi");
$data = mysqli_fetch_array($query);
$nomortransaksi = $data['nomor_transaksi'];

$urutan = (int) substr($nomortransaksi, 3, 3);

$urutan++;

$huruf = "TRX";
$nomortransaksi = $huruf . sprintf("%03s", $urutan);
?>
<div class="card">
<div class="card-header border-bottom">
    <h4 class= "card-title">Pembayaran</h4>
</div>
<div class="card-body py-2 my-25">

<!-- form -->
    <form class="validate-form mt-2 pt-50" action="../apoteker/transaksi/transaksi_proses.php" method="POST">
        <div class="row-12">
            <div class="mb-1 ">
                <label class="form-label" for="nomor_transaksi">Nomor Transaksi</label>
                <input type="text" id="nomor_transaksi" class="form-control dt-uname" value = "<?php echo $nomortransaksi ?>" autocomplete="off" name="nomor_transaksi"  readonly />
            </div>
            <div class="mb-1">
                    <label class="form-label" for="metode">Jenis Pembayaran</label>
                        <select name="metode" id="metode"  class="form-control">
                        <option  >Pilih Jenis Pembayaran</option>
                        <option value="mandiri" >Mandiri</option>
                        <option value="bpjs" >BPJS</option>
                        </select>
            </div>
            <div id="member">
            <div class="row">
            <div class="mb-1 col-3">
                    <label class="form-label" for="jenis_obat">Jenis Obat</label>
                        <select name="jenis_obat" id="jenis_obat"  class="form-control">
                            <option  value="" >Pilih Jenis Obat</option>
                               

                        </select>
            </div>
            <div class="mb-1 col-3">
                    <label class="form-label" for="obatx">Nama Obat</label>
                        <select name="obatx" id="obatx"  class="form-control">
                            <option  value= "0" >Pilih obat</option>
                               

                        </select>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="harga">Harga</label>
                <input class="form-control" id="harga" type="text" name="harga" value="" aria-describedby="harga" autofocus="" tabindex="1" readonly />
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="stok">Jumlah </label>
                <input type="text" id="stok" class="form-control dt-uname" placeholder="Jumlah " value = "0" autocomplete="off" name="stok" onKeyUp="myFunction()"  />
            </div>
            
        </div> 
        </div>
        
            
        <center>
        
        <a href="#" id="add-input" class="tambahmember">(+) TAMBAH</a> <a href="#" class="hapusmember">(-) HAPUS</a> 
        
        </center>
        
        <div class="mb-1">
                <label class="form-label" for="nama_pasien">Nama Pasien</label>
                <input type="text" id="nama_pasien" class="form-control dt-uname" placeholder=" Nama Pasien" autocomplete="off" name="nama_pasien"  />
        </div>
        <div class="mb-1">
                <label class="form-label" for="nama_admin">Nama Admin</label>
                <input type="text" id="nama_admin" class="form-control dt-uname" value=" <?php echo $adminx ?>" autocomplete="off" name="nama_admin"  readonly/>
        </div>
        <div class="mb-1">
                <label class="form-label" for="totalValue">Total Harga</label>
                <input type="text" id="totalValue" class="form-control dt-uname" placeholder=" " autocomplete="off" name="totalValue" readonly />
        </div>
        <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1" name="simpan">Simpan</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
            </div>
        </div>
    </form>

</div>

<!--/ form -->
<script>

$(document).ready(function(){

var total_member = 1;

function tambahMember(){
    
    var n = total_member + 1;
    var isi = '<div class="member" id="tambahmember'+total_member+'" style="display:none">';

    isi += '<hr>';

    isi += '<div class="row"><div class="mb-1 col-3"><label class="form-label" for="jenis_obat1">Jenis Obat</label><select name="jenis_obat1" id="jenis_obat1"  class="form-control"><option  value="" >Pilih Jenis Obat</option></select></div></div>';

    isi += '</div>';

    $('a.tambahmember').before(isi);
    $('#tambahmember'+total_member).slideDown('medium');

    total_member++;
    
}

function hapusMember(){
    total_member--;
    if(total_member<=1){
        total_member = 1;
    }
    $('#tambahmember'+total_member).slideUp('medium', function(){
        $(this).remove();
    });
}

$('a.tambahmember').click(function(){
    tambahMember();
});

$('a.hapusmember').click(function(){
    hapusMember();
});

});
</script>

<script>
function myFunction() {
  var wow = $("#harga").val() ;
  var jum = $("#stok").val() ;
  var wow1 = $("#harga1").val() ;
  var jum1 = $("#stok1").val() ;
  var wow2 = $("#harga2").val() ;
  var jum2 = $("#stok2").val() ;
  var wow3 = $("#harga3").val() ;
  var jum3 = $("#stok3").val() ;
  var wow4 = $("#harga4").val() ;
  var jum4 = $("#stok4").val() ;
  var wow5 = $("#harga5").val() ;
  var jum5 = $("#stok5").val() ;
  $("#totalValue").val(jum*wow);
}
</script>
