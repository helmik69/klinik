<!DOCTYPE html>
<html>
<head>
	<title>Data Rekam Medis</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data Rekam Medis</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    
$dt = (isset($_GET['dt']))? $_GET['dt'] : null;

$dokter = (isset($_GET['dokter']))? $_GET['dokter'] : null;

$sql = "SELECT a.id, a.nik,a.id_dokter, a.created_at, a.anamnesa, a.diagnosa , b.id as bid, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs,  c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM rekam_medis a 
        inner join pasien b on (a.nik = b.nik)
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where a.id > 0 " ;



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

$sql.=" order by  a.created_at ASC  ";
// echo "$sql";
$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$tampil = mysqli_query($conn, $sql);


	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%" class="align-middle text-center">No</th>
			<th class="align-middle text-center">Tanggal</th>
			<th class="align-middle text-center">Nama Pasien</th>
			<th class="align-middle text-center">Nama Dokter</th>
			<th class="align-middle text-center">Anamnesa</th>
			<th class="align-middle text-center">Diagnosa</th>
            
		</tr>
		<?php 
		$no = 1;
		
		while (list($id, $nik,$id_dokter, $created_at, $anamnesa, $diagnosa , $bid, $pasien, $nikb, $email, $jk,$no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_pasien, $no_bpjs,  $idok, $nama_dokter, $spesialis, $start, $off)=mysqli_fetch_array($tampil)) {
		?>
		

		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $created_at ?></td>
			<td class="align-middle text-center"><?php echo  $pasien ?></td>
			<td class="align-middle text-center"><?php echo $nama_dokter ?></td>
			<td class="align-middle text-center"><?php echo $anamnesa ?></td>
			<td class="align-middle text-center"><?php echo $diagnosa ?></td>
            
		</tr>
		<?php 
		}
		?>
	</table>

 
	<script>
		window.print();
	</script>
 
</body>
</html>