<!DOCTYPE html>
<html>
<head>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/vendors.min.css">
    
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    
    <!-- BEGIN: Vendor JS-->
    <script src="../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
	<title>Struk Transaksi Klinik & Apotek Bunda Rizky</title>
</head>	

<body>


</br>
	<center>
 
		<h2>Klinik & Apotek Bunda Rizky</h2>
		
 
	</center>
    </br>
	<?php 
	include '../../config/config.php';
    
$id_pembayaran=mysqli_real_escape_string($conn,$_GET['id_pembayaran']);
$tampil=mysqli_query($conn,"select * from pembayaran where id_pembayaran = '$id_pembayaran'") or die (mysqli_error($conn));
$data=mysqli_fetch_array($tampil);

	?>
    
 
        <div class="row-12">
        <div class="row">
            <div class="mb-1 col-4 ">
                <div><h3>Nama Obat</div></h3></br>
                <div><?php echo $data['namax'] ?></div>
                <?php if($data['namax1']==!''){ ?>
                    <div><?php echo $data['namax1'] ?></div>
                <?php  } ?>      
                <?php if($data['namax2']==!''){ ?>
                    <div><?php echo $data['namax2'] ?></div>
                <?php  } ?>  
                <?php if($data['namax3']==!''){ ?>
                    <div><?php echo $data['namax3'] ?></div>
                <?php  } ?>
            </div>
            <div class="mb-1 col-4 ">
                <div><h3>Jumlah</div></h3></br>
                <div><?php echo $data['jumlah'] ?> x</div>
                <?php if($data['namax1']==!''){ ?>
                    <div><?php echo $data['jumlah1'] ?> x</div>
                <?php  } ?>
                <?php if($data['namax2']==!''){ ?>
                    <div><?php echo $data['jumlah2'] ?> x</div>
                <?php  } ?>
                
                <?php if($data['namax3']==!''){ ?>
                    <div><?php echo $data['jumlah3'] ?> x</div>
                <?php  } ?>
            </div>

            <div class="mb-1 col-4 ">
                <div><h3>Harga</div></h3></br>
                <div>Rp. <?php echo number_format( $data['hargax']) ?></div>
                <?php if($data['namax1']==!''){ ?>
                    <div>Rp. <?php echo number_format( $data['hargax1']) ?></div>
                <?php  } ?>
                <?php if($data['namax2']==!''){ ?>
                    <div>Rp. <?php echo number_format( $data['hargax2']) ?></div>
                <?php  } ?>
                
                <?php if($data['namax3']==!''){ ?>
                    <div>Rp. <?php echo number_format( $data['hargax3']) ?></div>
                <?php  } ?>
            </div>
            <div class="mb-1 col-8">
                 <div><h3>Total Harga</div></h3></br>
               
            </div>
     
            <div class="mb-1 col-4">
                <div><h3>Rp. <?php echo number_format( $data['total_harga']) ?></h3></div>
               
            </div>
        </div>
        </div>
       
 
	<script>
		window.print();
	</script>
 
</body>
</html>