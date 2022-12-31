<?php
require("koneksi.php");

session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
}
if (isset($_SESSION['id_user'])) {
    //$_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    // header('Location: login.php');
    $sesID = $_SESSION['id_user'];
    $sesName = $_SESSION['username'];
    $name = $_SESSION['user_nama'];
    $sesEmail = $_SESSION['user_email'];
    $sesLvl = $_SESSION['level'];
    $sesImg = $_SESSION['foto'];
    $sesNik = $_SESSION['nik'];
    $sesAddress = $_SESSION['alamat'];
    $sesNo = $_SESSION['no_hp'];
    $sesGender = $_SESSION['jenis_kelamin'];
    $sesKontrak = $_SESSION['bukti_kontrak'];
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
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

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
                        <?php if ($sesLvl == 3) { ?>
                            <div class="row column1">
                                <div class="col-md-6 col-lg-4">
                                    <div class="full counter_section margin_bottom_30">
                                        <div class="couter_icon">
                                            <div>
                                                <i class="fa fa-user yellow_color"></i>
                                            </div>
                                        </div>
                                        <div class="counter_no">
                                            <?php
                                            $query = "SELECT COUNT(id_user) as user FROM user_detail WHERE level = 2";
                                            $result = mysqli_query($koneksi, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $user = $row['user'];
                                            }
                                            ?>
                                            <div>
                                                <p class="total_no"><?= $user; ?></p>
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
                                                <?php

                                                $query = "SELECT COUNT(id_pemesanan) as sewa FROM pemesanan";
                                                $result = mysqli_query($koneksi, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $sewa = $row['sewa'];
                                                }
                                                ?>
                                                <p class="total_no"><?= $sewa; ?></p>
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
                                                <?php

                                                $query = "SELECT SUM(total_pembayaran) as harga FROM pemesanan ";
                                                $result = mysqli_query($koneksi, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $harga = $row['harga'];
                                                }
                                                ?>
                                                <?php if ($harga == null) { ?>
                                                    <p class="total_no">Rp.0</p>
                                                <?php } else { ?>
                                                    <p class="total_no">Rp.<?= number_format($harga); ?></p>
                                                <?php } ?>
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
                        <?php } else { ?>
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
                                                <?php
                                                $queryKamar = "SELECT COUNT(kamar_kost.id_kamar) AS 'Total'
                                                FROM data_kost
                                                JOIN user_detail ON user_detail.id_user = data_kost.id_user
                                                JOIN kamar_kost ON data_kost.id_kost = kamar_kost.id_kost
                                                WHERE data_kost.id_user = '$sesID'";
                                                $resultKamar = mysqli_query($koneksi, $queryKamar);
                                                if ($row = mysqli_fetch_array($resultKamar)) {
                                                    $count = $row['Total'];
                                                }
                                                ?>
                                                <p class="total_no"><?= $count; ?></p>
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
                                                <?php

                                                $query = "SELECT COUNT(pemesanan.id_pemesanan) AS 'sewa' , SUM(pemesanan.total_pembayaran) AS 'harga' FROM pemesanan 
                                                INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
                                                INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
                                                INNER JOIN user_detail ON  user_detail.id_user = data_kost.id_user
                                                WHERE data_kost.id_user = '$sesID' and pemesanan.status_penyewaan = 'SUKSES'";
                                                $result = mysqli_query($koneksi, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $sewa = $row['sewa'];
                                                    $harga = $row['harga'];
                                                }
                                                ?>
                                                <p class="total_no"><?= $sewa; ?></p>
                                                <p class="head_couter">Total Sewa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="full counter_section margin_bottom_30">
                                        <div class="couter_icon">
                                            <div>
                                                <i class="fa fa-money green_color"></i>
                                            </div>
                                        </div>
                                        <div class="counter_no">
                                            <div>
                                                <?php if ($harga == null) { ?>
                                                    <p class="total_no">Rp.0</p>
                                                <?php } else { ?>
                                                    <p class="total_no">Rp.<?= number_format($harga); ?></p>
                                                <?php } ?>
                                                <p class="head_couter">Total Pemasukan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer -->
                                <div class="container-fluid">
                                    <div class="white_shd full margin_bottom_30">
                                        <div class="full graph_head">
                                            <div class="content ">
                                                <h1 class="text-center">Syarat dan Ketentuan</h1>
                                                <p>1. Telah menyerahkan surat kontrak kerjasama dengan <strong>J'Kost</strong> bermatrai. <a href="file/Surat Perjanjian Kerjasama.pdf" style="color: red;"> template surat perjanjian</a> </p>
                                                <p>2. Fitur untuk pendaftaran kost akan muncul apabila telah mengupload bukti kerja sama dan telah kami terima dalam 2x24jam dan anda dapat mendafarkan kost anda.</p>
                                                <p>3. Data anda harus lengkap apabila ingin mendaftarkan kost anda.</p>
                                                <p>4. Apabila ada pelanggaran kami dapat menghapus akun anda.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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