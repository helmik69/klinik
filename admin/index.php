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
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <?php
            $page = $_GET["page"];
                    if ($page == "home" || $page == "") {
                        echo "<title>Klinik & Apotek</title>";
                    
                    }else if ($page == "staff") {
                        echo "<title>Staff</title>";
                    }else {
                        echo "<title>Klinik & Apotek</title>";
                    }  
                    
        ?>
   
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/klinik/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/apexcharts.css">
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
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

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

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
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
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
    
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                
            </div>
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
                        
                        
                        
                            </span>
                        
                        
                        </div><span class="avatar"><img class="round" src="../app-assets//images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> Profile</a><a class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="me-50" data-feather="message-square"></i> Chats</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="page-pricing.html"><i class="me-50" data-feather="credit-card"></i> Pricing</a><a class="dropdown-item" href="page-faq.html"><i class="me-50" data-feather="help-circle"></i> FAQ</a><a class="dropdown-item" href="auth-login-cover.html"><i class="me-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto"><a class="navbar-brand" href="index.php?page=home"><span class="brand-logo">
                               </span>
                            <h2 class="brand-text mb-0">Menu</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item" ><a class="nav-link d-flex align-items-center" href="index.php?page=home" ><i data-feather="home"></i><span data-i18n="Dashboards">Dashboards</span></a>   
                    </li>
                   
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="" data-bs-toggle="dropdown"><i data-feather="users"></i><span data-i18n="Apps">Data User</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="index.php?page=staff" data-bs-toggle="" data-i18n="Email"><i data-feather="user"></i><span data-i18n="Email">Staff</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="index.php?page=pasien" data-bs-toggle="" data-i18n="Chat"><i data-feather="message-square"></i><span data-i18n="Chat">Chat</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="app-todo.html" data-bs-toggle="" data-i18n="Todo"><i data-feather="check-square"></i><span data-i18n="Todo">Todo</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="app-calendar.html" data-bs-toggle="" data-i18n="Calendar"><i data-feather="calendar"></i><span data-i18n="Calendar">Calendar</span></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="layers"></i><span data-i18n="User Interface">User Interface</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ui-typography.html" data-bs-toggle="" data-i18n="Typography"><i data-feather="type"></i><span data-i18n="Typography">Typography</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ui-feather.html" data-bs-toggle="" data-i18n="Feather"><i data-feather="eye"></i><span data-i18n="Feather">Feather</span></a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Cards"><i data-feather="credit-card"></i><span data-i18n="Cards">Cards</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="card-basic.html" data-bs-toggle="" data-i18n="Basic"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="card-advance.html" data-bs-toggle="" data-i18n="Advance"><i data-feather="circle"></i><span data-i18n="Advance">Advance</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="card-statistics.html" data-bs-toggle="" data-i18n="Statistics"><i data-feather="circle"></i><span data-i18n="Statistics">Statistics</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="card-analytics.html" data-bs-toggle="" data-i18n="Analytics"><i data-feather="circle"></i><span data-i18n="Analytics">Analytics</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="card-actions.html" data-bs-toggle="" data-i18n="Card Actions"><i data-feather="circle"></i><span data-i18n="Card Actions">Card Actions</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Components"><i data-feather="briefcase"></i><span data-i18n="Components">Components</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-accordion.html" data-bs-toggle="" data-i18n="Accordion"><i data-feather="circle"></i><span data-i18n="Accordion">Accordion</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-alerts.html" data-bs-toggle="" data-i18n="Alerts"><i data-feather="circle"></i><span data-i18n="Alerts">Alerts</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-avatar.html" data-bs-toggle="" data-i18n="Avatar"><i data-feather="circle"></i><span data-i18n="Avatar">Avatar</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-badges.html" data-bs-toggle="" data-i18n="Badges"><i data-feather="circle"></i><span data-i18n="Badges">Badges</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-breadcrumbs.html" data-bs-toggle="" data-i18n="Breadcrumbs"><i data-feather="circle"></i><span data-i18n="Breadcrumbs">Breadcrumbs</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-buttons.html" data-bs-toggle="" data-i18n="Buttons"><i data-feather="circle"></i><span data-i18n="Buttons">Buttons</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-carousel.html" data-bs-toggle="" data-i18n="Carousel"><i data-feather="circle"></i><span data-i18n="Carousel">Carousel</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-collapse.html" data-bs-toggle="" data-i18n="Collapse"><i data-feather="circle"></i><span data-i18n="Collapse">Collapse</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-divider.html" data-bs-toggle="" data-i18n="Divider"><i data-feather="circle"></i><span data-i18n="Divider">Divider</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-dropdowns.html" data-bs-toggle="" data-i18n="Dropdowns"><i data-feather="circle"></i><span data-i18n="Dropdowns">Dropdowns</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-list-group.html" data-bs-toggle="" data-i18n="List Group"><i data-feather="circle"></i><span data-i18n="List Group">List Group</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-modals.html" data-bs-toggle="" data-i18n="Modals"><i data-feather="circle"></i><span data-i18n="Modals">Modals</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-navs-component.html" data-bs-toggle="" data-i18n="Navs Component"><i data-feather="circle"></i><span data-i18n="Navs Component">Navs Component</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-offcanvas.html" data-bs-toggle="" data-i18n="Offcanvas"><i data-feather="circle"></i><span data-i18n="Offcanvas">Offcanvas</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-pagination.html" data-bs-toggle="" data-i18n="Pagination"><i data-feather="circle"></i><span data-i18n="Pagination">Pagination</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-pill-badges.html" data-bs-toggle="" data-i18n="Pill Badges"><i data-feather="circle"></i><span data-i18n="Pill Badges">Pill Badges</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-pills-component.html" data-bs-toggle="" data-i18n="Pills Component"><i data-feather="circle"></i><span data-i18n="Pills Component">Pills Component</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-popovers.html" data-bs-toggle="" data-i18n="Popovers"><i data-feather="circle"></i><span data-i18n="Popovers">Popovers</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-progress.html" data-bs-toggle="" data-i18n="Progress"><i data-feather="circle"></i><span data-i18n="Progress">Progress</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-spinner.html" data-bs-toggle="" data-i18n="Spinner"><i data-feather="circle"></i><span data-i18n="Spinner">Spinner</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-tabs-component.html" data-bs-toggle="" data-i18n="Tabs Component"><i data-feather="circle"></i><span data-i18n="Tabs Component">Tabs Component</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-timeline.html" data-bs-toggle="" data-i18n="Timeline"><i data-feather="circle"></i><span data-i18n="Timeline">Timeline</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-bs-toast.html" data-bs-toggle="" data-i18n="Toasts"><i data-feather="circle"></i><span data-i18n="Toasts">Toasts</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="component-tooltips.html" data-bs-toggle="" data-i18n="Tooltips"><i data-feather="circle"></i><span data-i18n="Tooltips">Tooltips</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Extensions"><i data-feather="box"></i><span data-i18n="Extensions">Extensions</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-sweet-alerts.html" data-bs-toggle="" data-i18n="Sweet Alert"><i data-feather="circle"></i><span data-i18n="Sweet Alert">Sweet Alert</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-blockui.html" data-bs-toggle="" data-i18n="Block UI"><i data-feather="circle"></i><span data-i18n="Block UI">BlockUI</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-toastr.html" data-bs-toggle="" data-i18n="Toastr"><i data-feather="circle"></i><span data-i18n="Toastr">Toastr</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-sliders.html" data-bs-toggle="" data-i18n="Sliders"><i data-feather="circle"></i><span data-i18n="Sliders">Sliders</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-drag-drop.html" data-bs-toggle="" data-i18n="Drag &amp; Drop"><i data-feather="circle"></i><span data-i18n="Drag &amp; Drop">Drag &amp; Drop</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-tour.html" data-bs-toggle="" data-i18n="Tour"><i data-feather="circle"></i><span data-i18n="Tour">Tour</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-clipboard.html" data-bs-toggle="" data-i18n="Clipboard"><i data-feather="circle"></i><span data-i18n="Clipboard">Clipboard</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-media-player.html" data-bs-toggle="" data-i18n="Media player"><i data-feather="circle"></i><span data-i18n="Media player">Media Player</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-context-menu.html" data-bs-toggle="" data-i18n="Context Menu"><i data-feather="circle"></i><span data-i18n="Context Menu">Context Menu</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-swiper.html" data-bs-toggle="" data-i18n="swiper"><i data-feather="circle"></i><span data-i18n="swiper">Swiper</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-tree.html" data-bs-toggle="" data-i18n="Tree"><i data-feather="circle"></i><span data-i18n="Tree">Tree</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-ratings.html" data-bs-toggle="" data-i18n="Ratings"><i data-feather="circle"></i><span data-i18n="Ratings">Ratings</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ext-component-i18n.html" data-bs-toggle="" data-i18n="l18n"><i data-feather="circle"></i><span data-i18n="l18n">l18n</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Page Layouts"><i data-feather="layout"></i><span data-i18n="Page Layouts">Page Layouts</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="layout-full.html" data-bs-toggle="" data-i18n="Layout Full"><i data-feather="circle"></i><span data-i18n="Layout Full">Layout Full</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="layout-without-menu.html" data-bs-toggle="" data-i18n="Without Menu"><i data-feather="circle"></i><span data-i18n="Without Menu">Without Menu</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="layout-empty.html" data-bs-toggle="" data-i18n="Layout Empty"><i data-feather="circle"></i><span data-i18n="Layout Empty">Layout Empty</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="layout-blank.html" data-bs-toggle="" data-i18n="Layout Blank"><i data-feather="circle"></i><span data-i18n="Layout Blank">Layout Blank</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="edit"></i><span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Form Elements"><i data-feather="copy"></i><span data-i18n="Form Elements">Form Elements</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-input.html" data-bs-toggle="" data-i18n="Input"><i data-feather="circle"></i><span data-i18n="Input">Input</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-input-groups.html" data-bs-toggle="" data-i18n="Input Groups"><i data-feather="circle"></i><span data-i18n="Input Groups">Input Groups</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-input-mask.html" data-bs-toggle="" data-i18n="Input Mask"><i data-feather="circle"></i><span data-i18n="Input Mask">Input Mask</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-textarea.html" data-bs-toggle="" data-i18n="Textarea"><i data-feather="circle"></i><span data-i18n="Textarea">Textarea</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-checkbox.html" data-bs-toggle="" data-i18n="Checkbox"><i data-feather="circle"></i><span data-i18n="Checkbox">Checkbox</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-radio.html" data-bs-toggle="" data-i18n="Radio"><i data-feather="circle"></i><span data-i18n="Radio">Radio</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-custom-options.html" data-bs-toggle="" data-i18n="Custom Options"><i data-feather="circle"></i><span data-i18n="Custom Options">Custom Options</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-switch.html" data-bs-toggle="" data-i18n="Switch"><i data-feather="circle"></i><span data-i18n="Switch">Switch</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-select.html" data-bs-toggle="" data-i18n="Select"><i data-feather="circle"></i><span data-i18n="Select">Select</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-number-input.html" data-bs-toggle="" data-i18n="Number Input"><i data-feather="circle"></i><span data-i18n="Number Input">Number Input</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-file-uploader.html" data-bs-toggle="" data-i18n="File Uploader"><i data-feather="circle"></i><span data-i18n="File Uploader">File Uploader</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-quill-editor.html" data-bs-toggle="" data-i18n="Quill Editor"><i data-feather="circle"></i><span data-i18n="Quill Editor">Quill Editor</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-date-time-picker.html" data-bs-toggle="" data-i18n="Date &amp; Time Picker"><i data-feather="circle"></i><span data-i18n="Date &amp; Time Picker">Date &amp; Time Picker</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-layout.html" data-bs-toggle="" data-i18n="Form Layout"><i data-feather="box"></i><span data-i18n="Form Layout">Form Layout</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-wizard.html" data-bs-toggle="" data-i18n="Form Wizard"><i data-feather="package"></i><span data-i18n="Form Wizard">Form Wizard</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-validation.html" data-bs-toggle="" data-i18n="Form Validation"><i data-feather="check-circle"></i><span data-i18n="Form Validation">Form Validation</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-repeater.html" data-bs-toggle="" data-i18n="Form Repeater"><i data-feather="rotate-cw"></i><span data-i18n="Form Repeater">Form Repeater</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="table-bootstrap.html" data-bs-toggle="" data-i18n="Table"><i data-feather="server"></i><span data-i18n="Table">Table</span></a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Datatable"><i data-feather="grid"></i><span data-i18n="Datatable">Datatable</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="table-datatable-basic.html" data-bs-toggle="" data-i18n="Basic"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="table-datatable-advanced.html" data-bs-toggle="" data-i18n="Advanced"><i data-feather="circle"></i><span data-i18n="Advanced">Advanced</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="file-text"></i><span data-i18n="Pages">Pages</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Authentication"><i data-feather="unlock"></i><span data-i18n="Authentication">Authentication</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Login"><i data-feather="circle"></i><span data-i18n="Login">Login</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-login-basic.html" data-bs-toggle="" data-i18n="Basic" target="_blank"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-login-cover.html" data-bs-toggle="" data-i18n="Cover" target="_blank"><i data-feather="circle"></i><span data-i18n="Cover">Cover</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Register"><i data-feather="circle"></i><span data-i18n="Register">Register</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-register-basic.html" data-bs-toggle="" data-i18n="Basic" target="_blank"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-register-cover.html" data-bs-toggle="" data-i18n="Cover" target="_blank"><i data-feather="circle"></i><span data-i18n="Cover">Cover</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-register-multisteps.html" data-bs-toggle="" data-i18n="Multi-Steps" target="_blank"><i data-feather="circle"></i><span data-i18n="Multi-Steps">Multi-Steps</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Forgot Password"><i data-feather="circle"></i><span data-i18n="Forgot Password">Forgot Password</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-forgot-password-basic.html" data-bs-toggle="" data-i18n="Basic" target="_blank"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-forgot-password-cover.html" data-bs-toggle="" data-i18n="Cover" target="_blank"><i data-feather="circle"></i><span data-i18n="Cover">Cover</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Reset Password"><i data-feather="circle"></i><span data-i18n="Reset Password">Reset Password</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-reset-password-basic.html" data-bs-toggle="" data-i18n="Basic" target="_blank"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-reset-password-cover.html" data-bs-toggle="" data-i18n="Cover" target="_blank"><i data-feather="circle"></i><span data-i18n="Cover">Cover</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Verify Email"><i data-feather="circle"></i><span data-i18n="Verify Email">Verify Email</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-verify-email-basic.html" data-bs-toggle="" data-i18n="Basic" target="_blank"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-verify-email-cover.html" data-bs-toggle="" data-i18n="Cover" target="_blank"><i data-feather="circle"></i><span data-i18n="Cover">Cover</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Two Steps"><i data-feather="circle"></i><span data-i18n="Two Steps">Two Steps</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-two-steps-basic.html" data-bs-toggle="" data-i18n="Basic" target="_blank"><i data-feather="circle"></i><span data-i18n="Basic">Basic</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-two-steps-cover.html" data-bs-toggle="" data-i18n="Cover" target="_blank"><i data-feather="circle"></i><span data-i18n="Cover">Cover</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Account Settings"><i data-feather="settings"></i><span data-i18n="Account Settings">Account Settings</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings-account.html" data-bs-toggle="" data-i18n="Account"><i data-feather="circle"></i><span data-i18n="Account">Account</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings-security.html" data-bs-toggle="" data-i18n="Security"><i data-feather="circle"></i><span data-i18n="Security">Security</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings-billing.html" data-bs-toggle="" data-i18n="Billings &amp; Plans"><i data-feather="circle"></i><span data-i18n="Billings &amp; Plans">Billings &amp; Plans</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings-notifications.html" data-bs-toggle="" data-i18n="Notifications"><i data-feather="circle"></i><span data-i18n="Notifications">Notifications</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings-connections.html" data-bs-toggle="" data-i18n="Connections"><i data-feather="circle"></i><span data-i18n="Connections">Connections</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-profile.html" data-bs-toggle="" data-i18n="Profile"><i data-feather="user"></i><span data-i18n="Profile">Profile</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-faq.html" data-bs-toggle="" data-i18n="FAQ"><i data-feather="help-circle"></i><span data-i18n="FAQ">FAQ</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-knowledge-base.html" data-bs-toggle="" data-i18n="Knowledge Base"><i data-feather="info"></i><span data-i18n="Knowledge Base">Knowledge Base</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-pricing.html" data-bs-toggle="" data-i18n="Pricing"><i data-feather="dollar-sign"></i><span data-i18n="Pricing">Pricing</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-license.html" data-bs-toggle="" data-i18n="License"><i data-feather="credit-card"></i><span data-i18n="License">License</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-api-key.html" data-bs-toggle="" data-i18n="API Key"><i data-feather="key"></i><span data-i18n="API Key">API Key</span></a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Blog"><i data-feather="clipboard"></i><span data-i18n="Blog">Blog</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-blog-list.html" data-bs-toggle="" data-i18n="List"><i data-feather="circle"></i><span data-i18n="List">List</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-blog-detail.html" data-bs-toggle="" data-i18n="Detail"><i data-feather="circle"></i><span data-i18n="Detail">Detail</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-blog-edit.html" data-bs-toggle="" data-i18n="Edit"><i data-feather="circle"></i><span data-i18n="Edit">Edit</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Mail Template"><i data-feather="mail"></i><span data-i18n="Mail Template">Mail Template</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-welcome.html" data-bs-toggle="" data-i18n="Welcome" target="_blank"><i data-feather="circle"></i><span data-i18n="Welcome">Welcome</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-reset-password.html" data-bs-toggle="" data-i18n="Reset Password" target="_blank"><i data-feather="circle"></i><span data-i18n="Reset Password">Reset Password</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-verify-email.html" data-bs-toggle="" data-i18n="Verify Email" target="_blank"><i data-feather="circle"></i><span data-i18n="Verify Email">Verify Email</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-deactivate-account.html" data-bs-toggle="" data-i18n="Deactivate Account" target="_blank"><i data-feather="circle"></i><span data-i18n="Deactivate Account">Deactivate Account</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-invoice.html" data-bs-toggle="" data-i18n="Invoice" target="_blank"><i data-feather="circle"></i><span data-i18n="Invoice">Invoice</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-mail-template/mail-promotional.html" data-bs-toggle="" data-i18n="Promotional" target="_blank"><i data-feather="circle"></i><span data-i18n="Promotional">Promotional</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Miscellaneous"><i data-feather="file"></i><span data-i18n="Miscellaneous">Miscellaneous</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-misc-coming-soon.html" data-bs-toggle="" data-i18n="Coming Soon" target="_blank"><i data-feather="circle"></i><span data-i18n="Coming Soon">Coming Soon</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-misc-not-authorized.html" data-bs-toggle="" data-i18n="Not Authorized" target="_blank"><i data-feather="circle"></i><span data-i18n="Not Authorized">Not Authorized</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-misc-under-maintenance.html" data-bs-toggle="" data-i18n="Maintenance" target="_blank"><i data-feather="circle"></i><span data-i18n="Maintenance">Maintenance</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-misc-error.html" data-bs-toggle="" data-i18n="Error" target="_blank"><i data-feather="circle"></i><span data-i18n="Error">Error</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="modal-examples.html" data-bs-toggle="" data-i18n="Modal Examples"><i data-feather="square"></i><span data-i18n="Modal Examples">Modal Examples</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="bar-chart-2"></i><span data-i18n="Charts &amp; Maps">Charts &amp; Maps</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Charts"><i data-feather="pie-chart"></i><span data-i18n="Charts">Charts</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="chart-apex.html" data-bs-toggle="" data-i18n="Apex"><i data-feather="circle"></i><span data-i18n="Apex">Apex</span></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="chart-chartjs.html" data-bs-toggle="" data-i18n="Chartjs"><i data-feather="circle"></i><span data-i18n="Chartjs">Chartjs</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="maps-leaflet.html" data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="map"></i><span data-i18n="Leaflet Maps">Leaflet Maps</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="box"></i><span data-i18n="Misc">Misc</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Menu Levels"><i data-feather="menu"></i><span data-i18n="Menu Levels">Menu Levels</span></a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="" data-i18n="Second Level"><i data-feather="circle"></i><span data-i18n="Second Level">Second Level 2.1</span></a>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="#" data-bs-toggle="dropdown" data-i18n="Second Level"><i data-feather="circle"></i><span data-i18n="Second Level">Second Level 2.2</span></a>
                                        <ul class="dropdown-menu" data-bs-popper="none">
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="" data-i18n="Third Level"><i data-feather="circle"></i><span data-i18n="Third Level">Third Level 3.1</span></a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="" data-i18n="Third Level"><i data-feather="circle"></i><span data-i18n="Third Level">Third Level 3.2</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="disabled" data-menu=""><a class="dropdown-item d-flex align-items-center" href="" data-bs-toggle="" data-i18n="Disabled Menu"><i data-feather="eye-off"></i><span data-i18n="Disabled Menu">Disabled Menu</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation" data-bs-toggle="" data-i18n="Documentation" target="_blank"><i data-feather="folder"></i><span data-i18n="Documentation">Documentation</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://pixinvent.ticksy.com/" data-bs-toggle="" data-i18n="Raise Support" target="_blank"><i data-feather="life-buoy"></i><span data-i18n="Raise Support">Raise Support</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content tebal">
    <?php
            $page = $_GET["page"];
                    if ($page == "home" || $page == "") {
                            include "home.php";
                    }else if ($page == "staff") {
                            include "staff/staff.php";
                    }
                    
        ?>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url() ?>app-assets/js/scripts/custom.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

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
</body>
<!-- END: Body-->

</html>