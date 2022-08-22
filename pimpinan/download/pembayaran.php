<!DOCTYPE html>
<html>
<head>
	<title>Data Pembayaran</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data Pembayaran</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    


    $nama = (isset($_GET['nama']))? $_GET['nama'] : null;
    $penerima = (isset($_GET['penerima']))? $_GET['penerima'] : null;
    $dt = (isset($_GET['dt']))? $_GET['dt'] : null;
    
    
    
    $sql = "SELECT a.id_pembayaran,a.pasien, a.no_obat, a.admin, a.jumlah, a.created_at, a.harga,  b.id as bid, b.no_obat as idx, b.nama as nama_obat, b.harga as harga_obat, b.stok as bstok 
            FROM pembayaran a 
            inner join obat b on (a.no_obat = b.no_obat)" ;
    
    
    if(!empty($nama)){
        $sql.=" and  b.nama like '%$nama%'  ";
    }
    
    if(!empty($penerima)){
        $sql.=" and  a.admin like '%$penerima%'  ";
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
    
    $all  =  mysqli_num_rows(mysqli_query($conn, $sql));
    $tampil = mysqli_query($conn, $sql);
    
    
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%" class="align-middle text-center">No</th>
			<th class="align-middle text-center">Tanggal</th>
			<th class="align-middle text-center">Nama Obat</th>
			<th class="align-middle text-center">Jumlah</th>
			<th class="align-middle text-center">Harga</th>
			<th class="align-middle text-center">Admin</th>
            
		</tr>
		<?php 
		$no = 1;
		
		while (list( $id_pembayaran,$pasien, $no_obat, $admin, $jumlah, $created_at, $harga, $bid, $idx, $nama_obat, $harga_obat, $bstok  )=mysqli_fetch_array($tampil)) {
		?>
		

		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $created_at ?></td>
			<td class="align-middle text-center"><?php echo  $nama_obat ?></td>
			<td class="align-middle text-center"><?php echo $jumlah ?></td>
			<td class="align-middle text-center"><?php echo $harga ?></td>
			<td class="align-middle text-center"><?php echo $admin ?></td>
            
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