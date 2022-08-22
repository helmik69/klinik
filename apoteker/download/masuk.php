<!DOCTYPE html>
<html>
<head>
	<title>Data Obat Masuk</title>
</head>	
<center>
	<img class="" src="../../app-assets/images/klinik/aa.png"  height="300" width="750"> 

	</center>
<body>

	<center>
 
		<h2>Data Obat Masuk</h2>
		
 
	</center>
 
	<?php 
	include '../../config/config.php';
    


    $nama = (isset($_GET['nama']))? $_GET['nama'] : null;
    $penerima = (isset($_GET['penerima']))? $_GET['penerima'] : null;
    $dt = (isset($_GET['dt']))? $_GET['dt'] : null;
    
    
    
    $sql = "SELECT a.id_masuk,a.no_obat,  a.stok, a.created_at, a.penerima, b.id_obat as bid, b.no_obat as idx, b.namax, b.harga, b.stok as bstok 
            FROM obat_masuk a inner join obat b on (a.no_obat = b.no_obat) " ;
    
    
    if(!empty($nama)){
        $sql.=" and  b.nama like '%$nama%'  ";
    }
    
    if(!empty($penerima)){
        $sql.=" and  a.penerima like '%$penerima%'  ";
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
    
    
    $sql.=" order by a.created_at ASC  ";
    
    $all  =  mysqli_num_rows(mysqli_query($conn, $sql));
    $tampil = mysqli_query($conn, $sql);
    
    
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%" class="align-middle text-center">No</th>
			<th class="align-middle text-center">Tanggal Masuk</th>
			<th class="align-middle text-center">Nama Obat</th>
			<th class="align-middle text-center">Penerima</th>
            <th class="align-middle text-center">Jumlah</th>
		</tr>
		<?php 
		$no = 1;
		
		while (list($id,$no_obat, $stok, $created_at, $penerima, $bid, $idx, $nama, $harga, $bstok)=mysqli_fetch_array($tampil)) {
		?>
		
		<tr>
			<td class="align-middle text-center"><?php echo $no++ ?></td>
			<td class="align-middle text-center"><?php echo $created_at ?></td>
			<td class="align-middle text-center"><?php echo $nama ?></td>
			<td class="align-middle text-center"><?php echo $penerima ?></td>
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