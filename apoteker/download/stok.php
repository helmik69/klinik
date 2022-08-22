<!DOCTYPE html>
<html>
<head>
	<title>Data Stok</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data Stok</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    


    $nama = (isset($_GET['nama']))? $_GET['nama'] : null;
    $no_obat = (isset($_GET['no_obat']))? $_GET['no_obat'] : null;
    $dt = (isset($_GET['dt']))? $_GET['dt'] : null;
    
    
    
    $sql = "SELECT id_obat,no_obat, namax,harga, stok_awal, stok, created_at, updated_at FROM obat where id_obat > 0" ;
    
    
    
    if(!empty($nama)){
        $sql.=" and  nama like '%$nama%'  ";
    }
    
    if(!empty($no_obat)){
        $sql.=" and  no_obat like '%$no_obat%'  ";
    }
    
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
			<th class="align-middle text-center">Tanggal Buat</th>
			<th class="align-middle text-center">No Obat</th>
			<th class="align-middle text-center">Nama Obat</th>
            <th class="align-middle text-center">Harga</th>
            <th class="align-middle text-center">Stok</th>
		</tr>
		<?php 
		$no = 1;
		
		while (list($id,$no_obat, $nama,$harga, $stok_awal, $stok, $created_at, $updated_at)=mysqli_fetch_array($tampil)) {
		?>
		
		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $created_at ?></td>
			<td class="align-middle text-center"><?php echo $no_obat ?></td>
			<td class="align-middle text-center"><?php echo $nama ?></td>
            <td class="align-middle text-center"><?php echo $harga ?></td>
            <td class="align-middle text-center"><?php echo $stok ?></td>
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