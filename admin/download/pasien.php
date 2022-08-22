<!DOCTYPE html>
<html>
<head>
	<title>Data Pasien</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data pasien</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    

    $dt = (isset($_GET['dt']))? $_GET['dt'] : null;
    $jpx = (isset($_GET['jpx']))? $_GET['jpx'] : 'semua';
    
    
    
    $add = " " ;
    if (!empty($jpx)){
        if ($jpx == "semua"){
            $add =" " ; 
        }  
        else if($jpx == "bpjs") {
            $add = " and jenis_pasien = 'bpjs'";
        } else if ($jpx == "mandiri"){
            $add = " and jenis_pasien ='mandiri'";
        } 
        
    }
    
    $sql = "SELECT id, nama, nik, email, jk , no_hp, tempat_lahir,tanggal_lahir,alamat,jenis_pasien,no_bpjs, username, password, password_hint, created_at, updated_at 
    FROM pasien where id > 0 $add" ;
    
    
    
    if(!empty($dt)){
        $date = explode(" to ",$dt);
        $start = $date[0]." 00:00:00" ;
        if (!empty($date[1])){
            $end = $date[1]." 23:59:59" ;
        } else {
            $end = $date[0]." 23:59:59" ;
        }
        
        $sql.=" and  created_at between '$start' and  '$end' ";
    }
    
    
    $sql.=" order by created_at ASC  ";
    
    $all  =  mysqli_num_rows(mysqli_query($conn, $sql));
    $tampil = mysqli_query($conn, $sql);
    
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%" class="align-middle text-center">No</th>
			<th class="align-middle text-center">Tanggal Daftar</th>
			<th class="align-middle text-center">Nama Pasien</th>
			<th class="align-middle text-center">NIK</th>
			<th class="align-middle text-center">No Telepon</th>
			<th class="align-middle text-center">Jenis Pasien</th>
            <th class="align-middle text-center">Tanggal Lahir</th>
            <th class="align-middle text-center">Alamat</th>
		</tr>
		<?php 
		$no = 1;
		
		while (list($id, $nama, $nik, $email, $jk , $no_hp, $tempat_lahir,$tanggal_lahir,$alamat,$jenis_pasien,$no_bpjs, $username, $password, $password_hint, $created_at, $update_at)=mysqli_fetch_array($tampil)) {
		?>
		

		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $created_at ?></td>
			<td class="align-middle text-center"><?php echo  $nama ?></td>
			<td class="align-middle text-center"><?php echo $nik ?></td>
			<td class="align-middle text-center"><?php echo $no_hp ?></td>
			<td class="align-middle text-center"><?php echo $jenis_pasien." ".$no_bpjs ?></td>
            <td class="align-middle text-center"><?php echo  $tempat_lahir.", ".$tanggal_lahir ?></td>
            <td class="align-middle text-center"><?php echo  $alamat ?></td>
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