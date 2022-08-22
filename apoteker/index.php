<?php
include '../config/config.php';
include '../function/function.php';
$page = (isset($_GET['page']))? $_GET['page'] : null;
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Klinik Office System">
    <meta name="keywords" content="Klinik Office">
    <meta name="author" content="Klinik Office">
    <?php
            $page = $_GET["page"];
                    if ($page == "home" || $page == "") {
                        echo "<title>Klinik & Apotek</title>";
                    
                    }else if ($page == "staff") {
                        echo "<title>Staff</title>";
                    }else if ($page == "stok") {
                        echo "<title>Stok</title>";
                    }else {
                        echo "<title>Klinik & Apotek</title>";
                    }  
                    
        ?>
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/klinik/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    
    <link rel="stylesheet" type="text/css" href="../app-assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    
    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

</head>
<!-- END: Head-->

<?php
    session_start();
    if($_SESSION['status']!="login") {
        session_destroy();
        header("location:../index.php?page=home");
    }
?>

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
<style type="text/css">
		.tebal{
            color : black ;
            font-weight: bold;

        }
        .table{
            color : black ;
            font-weight: bold;
            

        }
    
    </style>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul> 
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">Welcome <?php echo $_SESSION['nama'];?></span><span class="user-status">
                    <?php
					if ($_SESSION['level'] == 'admin') {?>  
						<?php echo "Admin" ?>  
					<?php
					}else if ($_SESSION['level'] == 'dokter') {?>    
						
						<?php echo "Dokter" ?>
                        
						
					<?php
					}else if ($_SESSION['level'] == 'apoteker') {?>    
						<?php echo "Apoteker" ?>
					<?php
					}else if ($_SESSION['level'] == 'pimpinan') {?>    
						<?php echo "Pimpinan" ?>
					<?php
					}else {?>    
						<?php echo "Pengelola" ?>
					<?php
					}
					?>
                        
                    
                    </span></div><span class="avatar"><img class="round" src="../app-assets/images/portrait/small/mau2.png" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="index.php?page=profile"><i class="me-50" data-feather="user"></i> Profile</a><a class="dropdown-item" href="../index.php?pesan=logout"><i class="me-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="?page=home"><span class="brand-logo">
                            </span>
                        <h2 class="brand-text">Daftar Menu</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Menu</span><i data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item" ><a class="nav-link d-flex align-items-center" href="index.php?page=home" ><i data-feather="home"></i><span data-i18n="Dashboards">Dashboards</span></a>   
                    </li>
                <li class="nav-item" ><a class="nav-link d-flex align-items-center" href="index.php?page=jenis" ><i data-feather="cast"></i><span data-i18n="Dashboards">Jenis Obat</span></a>   
                    </li>
                <li class="nav-item" ><a class="nav-link d-flex align-items-center" href="index.php?page=stok" ><i data-feather="box"></i><span data-i18n="Dashboards">Persediaan Obat</span></a>   
                    </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="truck"></i><span class="menu-title text-truncate" data-i18n="Invoice">Data Obat</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="index.php?page=masuk"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Obat Masuk</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="index.php?page=keluar"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">Obat Expired</span></a>
                        </li>
                        
                    </ul>
                </li><li class="nav-item" ><a class="nav-link d-flex align-items-center" href="index.php?page=transaksi" ><i data-feather="shopping-bag"></i><span data-i18n="Dashboards">Pembayaran</span></a>   
                    </li>
                <li class="nav-item" ><a class="nav-link d-flex align-items-center" href="index.php?page=pembayaran" ><i data-feather="folder"></i><span data-i18n="Dashboards">Data Transaksi</span></a>   
                    </li>
                
                    
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content tebal">
      
        
        <?php
            $page = $_GET["page"];
                    if ($page == "home" || $page == "") {
                            include "home.php";
                    }else if ($page == "stok") {
                            include "persediaan/persediaan.php";
                    }else if ($page == "estok") {
                        include "persediaan/edit.php";
                    }else if ($page == "masuk") {
                        include "obat/masuk.php";
                    }else if ($page == "keluar") {
                        include "obat/keluar.php";
                    }else if ($page == "emasuk") {
                        include "obat/edit_m.php";
                    }else if ($page == "pembayaran") {
                        include "pembayaran/pembayaran.php";
                    }else if ($page == "jenis") {
                        include "jenis/jenis.php";
                    }else if ($page == "ejenis") {
                        include "jenis/edit.php";
                    }else if ($page == "transaksi") {
                        include "transaksi/transaksi.php";
                    }else if ($page == "profile") {
                        include "profile.php";
                    }
        ?>
       
    </div>
    
    

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="ms-25" href="https://www.instagram.com/nys.amd/" target="blank">Klinik & Apotek Bunda Rizky</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    


    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url() ?>app-assets/js/scripts/custom.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    <script src="../app-assets/js/scripts/components/components-modals.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    
    <script>
        $(document).ready(function(){
           $.ajax({
            url: 'transaksi/cari_jenis.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#jenis_obat").html(response);
            }
           })
    });
    </script>

<script>
        $(document).ready(function(){
           $.ajax({
            url: 'transaksi/cari_jenis.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#jenis_obat1").html(response);
            }
           })
    });
</script>

<script>
        $(document).ready(function(){
           $.ajax({
            url: 'transaksi/cari_jenis.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#jenis_obat2").html(response);
            }
           })
    });
    </script>

<script>
    $(document).ready(function(){
        $("#jenis_obat").change(function(){
           $.ajax({
            url: 'transaksi/cari_transaksi.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#obatx").html(response);
            }
           })
        });
    });
    $(document).ready(function(){
        $("#obatx").change(function(){
           $.ajax({
            url: 'transaksi/harga.php',
            type: 'POST',
            data: {
                obatx: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#harga").val(response);
            }
           })
        });
    });
    </script>

    
<script>
    $(document).ready(function(){
        $("#jenis_obat1").change(function(){
           $.ajax({
            url: 'transaksi/cari_transaksi1.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#obatx1").html(response);
            }
           })
        });
    });
    $(document).ready(function(){
        $("#obatx1").change(function(){
           $.ajax({
            url: 'transaksi/harga1.php',
            type: 'POST',
            data: {
                obatx: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#harga1").val(response);
            }
           })
        });
    });
    </script>


   
<script>
    $(document).ready(function(){
        $("#jenis_obat2").change(function(){
           $.ajax({
            url: 'transaksi/cari_transaksi2.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#obatx2").html(response);
            }
           })
        });
    });
    $(document).ready(function(){
        $("#obatx2").change(function(){
           $.ajax({
            url: 'transaksi/harga2.php',
            type: 'POST',
            data: {
                obatx: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#harga2").val(response);
            }
           })
        });
    });
    </script>



   
<script>
    $(document).ready(function(){
        $("#jenis_obat3").change(function(){
           $.ajax({
            url: 'transaksi/cari_transaksi3.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#obatx3").html(response);
            }
           })
        });
    });
    $(document).ready(function(){
        $("#obatx3").change(function(){
           $.ajax({
            url: 'transaksi/harga3.php',
            type: 'POST',
            data: {
                obatx: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#harga3").val(response);
            }
           })
        });
    });
    </script>


 
<script>
    $(document).ready(function(){
        $("#jenis_obat4").change(function(){
           $.ajax({
            url: 'transaksi/cari_transaksi4.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#obatx4").html(response);
            }
           })
        });
    });
    $(document).ready(function(){
        $("#obatx4").change(function(){
           $.ajax({
            url: 'transaksi/harga4.php',
            type: 'POST',
            data: {
                obatx: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#harga4").val(response);
            }
           })
        });
    });
    </script>
 
 <script>
    $(document).ready(function(){
        $("#jenis_obat5").change(function(){
           $.ajax({
            url: 'transaksi/cari_transaksi5.php',
            type: 'POST',
            data: {
                jenis_obat: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#obatx5").html(response);
            }
           })
        });
    });
    $(document).ready(function(){
        $("#obatx5").change(function(){
           $.ajax({
            url: 'transaksi/harga5.php',
            type: 'POST',
            data: {
                obatx: $(this).val(),
            },
            success:function(response){
                //console.log(response);
                $("#harga5").val(response);
            }
           })
        });
    });
    </script>



<!-- END: Body-->

</html>