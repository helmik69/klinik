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
    <title>Klinik & Apotek Bunda Rizky</title>
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/klinik/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="index.php" >
                            <img class="" src="app-assets/images/klinik/icon.png" alt="logo" height="60" width="70">
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="app-assets/images/pages/register-v2.svg" alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Form Pendaftaran</h2>
                                <p class="card-text mb-2">Isi data dengan baik dan benar !</p>
                                <form class="auth-register-form mt-2" action="simpan.php" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama lengkap anda" aria-describedby="register-username" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="nik">NIK</label>
                                        <input class="form-control" id="nik" type="text" name="nik" placeholder="NIK anda" aria-describedby="register-username" autofocus="" tabindex="2" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" type="text" name="email" placeholder="john@example.com" aria-describedby="register-email" tabindex="3" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="no_hp">Nomor Telepon/HP</label>
                                        <input class="form-control" id="no_hp" type="text" name="no_hp" placeholder="08xxxxxxxxx" aria-describedby="register-email" tabindex="3" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="username">Username</label>
                                        <input class="form-control" id="username" type="text" name="username" placeholder="Username yang ingin anda gunakan" aria-describedby="register-username" autofocus="" tabindex="4" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="register-password" tabindex="5" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="jk">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control">
                                            <option  disabled selected> Pilih Jenis Kelamin</option>
                                            <option value="Pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Tempat lahir anda"  autofocus=""  />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                        <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_lahir" placeholder="Tanggal lahir anda"  autofocus=""  />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <input class="form-control" id="alamat" type="text" name="alamat" placeholder="alamat anda"  autofocus=""  />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="jenis_pasien">Jenis Pasien</label>
                                        <select name="jenis_pasien" id="jenis_pasien" class="form-control">
                                            <option  disabled selected> Pilih Jenis Pasien</option>
                                            <option value="mandiri">Mandiri</option>
                                            <option value="bpjs">Jaminan Kesehatan</option>
                                        </select>
                                    </div>
                                   
                                    <div class="mb-1">
                                        <label class="form-label" for="no_bpjs"><h5 class="text text-danger">**Di isi jika memiliki jaminan kesehatan</h5></label>
                                        <input class="form-control" id="no_bpjs" type="text" name="no_bpjs" placeholder="Nomor Kartu Jaminan Kesehatan"  autofocus=""  />
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="verif" name="verif" type="checkbox" tabindex="7" value="yes" />
                                            <label class="form-check-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy policy & terms</a></label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit" tabindex="5">Daftar</button>
                                </form>
                                <p class="text-center mt-2"><span>Sudah Punya Akun?</span><a href="index.php"><span>&nbsp;Login Disini</span></a></p>
                                
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/auth-register.js"></script>
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