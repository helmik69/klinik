<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kartu Pendaftaran Berobat Klinik & Apotek Bunda Rizky</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Kartu Pendaftaran Berobat</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    $id_pendaftaran=$_GET['id_pendaftaran'];
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%" class="align-middle text-center">No Berobat</th>
			<th class="align-middle text-center">Tanggal Daftar</th>
			<th class="align-middle text-center">Nama Pasien</th>
			<th class="align-middle text-center">Alamat Pasien</th>
			<th class="align-middle text-center">Nama Dokter</th>
			<th class="align-middle text-center">Tanggal Berobat</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
        FROM berobat a inner join pasien b on (a.nik = b.nik) 
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        inner join poli d on (c.poli_id = d.id)
        where a.status='waiting' and a.id_pendaftaran = '$id_pendaftaran'");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td class="align-middle text-center"><?php echo $data['id_pendaftaran']; ?></td>
			<td class="align-middle text-center"><?php echo $data['created_at']; ?></td>
			<td class="align-middle text-center"><?php echo $data['pasien']; ?></td>
			<td class="align-middle text-center"><?php echo $data['alamat']; ?></td>
			<td class="align-middle text-center"><?php echo $data['nama_dokter'] ?><hr><?php echo $data['nama_poli'] ?></td>
			<td class="align-middle text-center"><?php echo $data['start']." s/d ".$data['off']; ?><hr><?php echo $data['tanggal_berobat']; ?></td>
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