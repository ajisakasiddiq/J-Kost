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
$sesImg = $_SESSION['foto'];
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
    <title>J-KOST</title>
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

<body class="inner_page widgets">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
<?php include("pages/sidebar_dashboard.php") ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
<?php include("pages/topbar_dashboard.php") ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <?php if($sesLvl == 3){ ?>
                        <div class="row column1">
                            <div class="col-md-6 col-lg-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div>
                                            <i class="fa fa-user yellow_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">1000</p>
                                            <p class="head_couter">Total Penyewa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div>
                                            <i class="fa fa-group yellow_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">1000</p>
                                            <p class="head_couter">Total Sewa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div>
                                            <i class="fa fa-cloud-download green_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">100.000.000</p>
                                            <p class="head_couter">Total Pemasukan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- footer -->
                            <div class="container-fluid">
                                <div class="footer">
                                    <p>Copyright © 2022 Designed by A2.<br><br> Distributed By: Team ruweet</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                            <div class="row column1">
                            <div class="col-md-6 col-lg-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div>
                                            <i class="fa fa-user yellow_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">1000</p>
                                            <p class="head_couter">Total Kamar Kos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div>
                                            <i class="fa fa-group yellow_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">1000</p>
                                            <p class="head_couter">Total Sewa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div>
                                            <i class="fa fa-cloud-download green_color"></i>
                                        </div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no">100.000.000</p>
                                            <p class="head_couter">Total Pemasukan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- footer -->
                            <div class="container-fluid">
                                <div class="footer">
                                    <p>Copyright © 2022 Designed by A2.<br><br> Distributed By: Team ruweet</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                            <?php } ?>
                        <!-- end dashboard inner -->
                    </div>
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
            <script src="js/chart_custom_style1.js"></script>
            <script src="js/custom.js"></script>
</body>

</html>