<!DOCTYPE html>
<html>
<head>
	<title>Data Dokter</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data Dokter</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    

    $sql = "SELECT a.id_dokter, a.nama,a.poli_id, a.start, a.off,a.mulai, a.selesai, b.id, b.nama as poli FROM dokter a inner join poli b on (a.poli_id = b.id) " ;


    $sql.=" order by id_dokter ASC  ";
    
    $all  =  mysqli_num_rows(mysqli_query($conn, $sql));
    $tampil = mysqli_query($conn, $sql);
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%" class="align-middle text-center">No</th>
			<th class="align-middle text-center">Nama Dokter</th>
			<th class="align-middle text-center">Poli</th>
			<th class="align-middle text-center">Jadwal Praktik</th>
			<th class="align-middle text-center">Hari</th>
		</tr>
		<?php 
		$no = 1;
		
		while (list($id_dokter, $nama,$poli_id, $start, $off,$mulai,$selesai, $id, $poli)=mysqli_fetch_array($tampil)) {
		?>
		
		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $nama ?></td>
			<td class="align-middle text-center"><?php echo $poli ?></td>
			<td class="align-middle text-center"><?php echo $start." - ".$off ?></td>
			<td class="align-middle text-center"><?php echo $mulai." s/d ".$selesai ?></td>
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