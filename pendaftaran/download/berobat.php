<!DOCTYPE html>
<html>
<head>
	<title>Data Berobat</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data Berobat</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    


    $nama = (isset($_GET['nama']))? $_GET['nama'] : null;
    $dt = (isset($_GET['dt']))? $_GET['dt'] : null;
    $polix =(isset($_GET['polix']))? $_GET['polix'] : null;
    $statusx =$_GET['status'] ;
    
    $sql = "SELECT a.id_pendaftaran, a.nik,a.id_dokter, a.created_at, a.tanggal_berobat, a.status, b.id, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs, c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off, d.id as did, d.nama as nama_poli
            FROM berobat a 
            inner join pasien b on (a.nik = b.nik) 
            inner join dokter c on (a.id_dokter = c.id_dokter)
            inner join poli d on (c.poli_id = d.id) 
            where a.status='$statusx'" ;
    
    
    
    
    if(!empty($nama)){
        $sql.=" and c.nama like '%$nama%'  ";
    }
    
    if(!empty($polix)){
        $sql.=" and d.nama = '$polix'  ";
    }
    
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
			<th class="align-middle text-center">Tanggal Daftar</th>
			<th class="align-middle text-center">Nama Pasien</th>
			<th class="align-middle text-center">NIK</th>
            <th class="align-middle text-center">Jenis Pasien</th>
            <th class="align-middle text-center">Nama Dokter</th>
            <th class="align-middle text-center">Nama Poli</th>
            <th class="align-middle text-center">Jam Berobat</th>
            <th class="align-middle text-center">Tanggal Berobat</th>
		</tr>
		<?php 
		$no = 1;
		
		while (list($id_pendaftaran, $nik,$id_dokter, $created_at, $tanggal_berobat, $status, $id, $pasien, $nikb, $email, $jk,$no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_pasien, $no_bpjs, $idok, $nama_dokter, $poli_id, $start, $off,$did, $nama_poli)=mysqli_fetch_array($tampil)) {
		?>
		
		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $created_at ?></td>
			<td class="align-middle text-center"><?php echo $pasien ?></td>
			<td class="align-middle text-center"><?php echo $nik ?></td>
            <td class="align-middle text-center"><?php echo $jenis_pasien." ".$no_bpjs ?></td>
            <td class="align-middle text-center"><?php echo $nama_dokter ?></td>
            <td class="align-middle text-center"><?php echo $nama_poli ?></td>
            <td class="align-middle text-center"><?php echo $start."s/d".$off ?></td>
            <td class="align-middle text-center"><?php echo $tanggal_berobat ?></td>
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