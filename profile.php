<?php
require("koneksi.php");

session_start();

if (isset($_SESSION['id_user'])) {
    //$_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
   // header('Location: login.php');
$sesID = $_SESSION['id_user'];
$sesName = $_SESSION['username'];
$name = $_SESSION['user_nama'];
$sesLvl = $_SESSION['level'];
$sesEmail = $_SESSION['user_email'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Admin JKOS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page profile_page">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <?php require("pages/sidebar_dashboard.php") ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
            <?php require("pages/topbar_dashboard.php") ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Profile</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="container">
                                            <h1>Edit Profile</h1>
                                            <hr>
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-md-3">
                                                    <div class="text-center">
                                                        <img src="img/profil.jpg" class="avatar img-circle" alt="avatar" width="100px">
                                                        <h6>Upload a different photo...</h6>

                                                        <input type="file" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- edit form column -->
                                                <div class="col-md-6 personal-info">
                                                    <div class="alert alert-info alert-dismissable">
                                                        <a class="panel-close close" data-dismiss="alert">×</a>
                                                        <i class="fa fa-coffee"></i> Pastikan <strong>Data diri</strong> anda terinput dengan benar!
                                                    </div>
                                                    <h3>Personal info</h3>

                                                    <form class="form-horizontal" role="form" action="" method="post">
                                                        <div class="form-group">
                                                            <label for="name" class="col-lg-3 control-label">Nama :</label>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text" name="txt_nama" id="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik" class="col-lg-3 control-label">NIK :</label>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text" name="txt_nik" id="nik">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender" class="col-lg-3 control-label">Jenis Kelamin :</label>
                                                            <div class="col-lg-8">
                                                                <div class="ui-select">
                                                                    <select id="gender" class="form-control" id="gender">
                                                          <option value="">Pilih Jenis Kelamin </option>
                                                          <option value="Laki">Laki - Laki </option>
                                                          <option value="perempuan">Perempuan</option>
                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="numberPhone" class="col-lg-3 control-label">No. HP :</label>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" type="text" name="txt_nohp" id="numberPhone">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kecamatan" class="col-lg-3 control-label">Kecamatan :</label>
                                                            <div class="col-lg-8">
                                                                <div class="ui-select">
                                                                    <select name="kecamatan" id="kecamatan" class="form-control">
                                                          <option>Pilih Kecamatan</option>
                                                            </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat" class="col-md-3 control-label">Alamat :</label>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" rows="5" type="text" id="alamat"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender" class="col-lg-3 control-label">Status :</label>
                                                            <div class="col-lg-8">
                                                                <div class="ui-select">
                                                                    <select id="gender" class="form-control" id="gender">
                                                          <option>Pilih Status</option>
                                                          <option value="Laki">Menikah </option>
                                                          <option value="perempuan">Lajang</option>
                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label"></label>
                                                            <div class="col-md-8">
                                                                <input type="button" class="btn btn-primary" value="Save Changes">
                                                                <span></span>
                                                                <input type="reset" class="btn btn-default" value="Cancel">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <!-- jQuery -->
                                <script src="js/jquery.min.js"></script>
                                <script src="js/popper.min.js"></script>
                                <script src="js/bootstrap.min.js"></script>
                                <!-- wow animation -->
                                <script src="js/animate.js"></script>
                                <!-- select country -->
                                <script src="js/bootstrap-select.js"></script>
                                <!-- owl carousel -->
                                <script src="js/owl.carousel.js"></script>
                                <!-- chart js -->
                                <script src="js/Chart.min.js"></script>
                                <script src="js/Chart.bundle.min.js"></script>
                                <script src="js/utils.js"></script>
                                <script src="js/analyser.js"></script>
                                <!-- nice scrollbar -->
                                <script src="js/perfect-scrollbar.min.js"></script>
                                <script>
                                    var ps = new PerfectScrollbar('#sidebar');
                                </script>
                                <!-- custom js -->
                                <script src="js/custom.js"></script>
                                <!-- calendar file css -->
                                <script src="js/semantic.min.js"></script>
</body>

</html>