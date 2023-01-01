<?php
require("koneksi.php");

session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
}

if (isset($_SESSION['id_user'])) {
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
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page tables_page">
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
                                    <br>
                                    <h2>Data Kamar</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-lg-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="table_section padding_infor_info">
                                            <h2 class="m-2 text-center text-primary">Kost Anda</h2>

                                            <div class="row">
                                                <?php $queryPenyewa = "SELECT kamar_kost.no_kamar,kamar_kost.deskripsi,data_kost.nama_kost,data_kost.foto,kamar_kost.status_kamar,kamar_kost.id_kamar,pemesanan.id_pemesanan,data_kost.id_kost,pemesanan.status_penyewaan
FROM pemesanan
INNER JOIN kamar_kost ON pemesanan.id_kamar=kamar_kost.id_kamar
INNER JOIN data_kost ON data_kost.id_kost=kamar_kost.id_kost
WHERE pemesanan.id_user = '$sesID' AND kamar_kost.status_kamar = 'Berpenghuni' AND pemesanan.status_penyewaan = 'SUKSES';";
                                                $hasil = mysqli_query($koneksi, $queryPenyewa);
                                                while ($row = mysqli_fetch_array($hasil)) {
                                                    $idPesan = $row['id_pemesanan'];
                                                    $idkamar = $row['id_kamar'];
                                                    $namaKost = $row['nama_kost'];
                                                    $No = $row['no_kamar'];
                                                    $status = $row['status_penyewaan'];
                                                    $deskripsi = $row['deskripsi'];
                                                    $foto = $row['foto'];
                                                ?>

                                                    <?php if ($status == 'Berhenti Sewa Kamar') { ?>
                                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                                                <use xlink:href="#exclamation-triangle-fill" />
                                                            </svg>
                                                            <div>
                                                                Tidak Ada kost yang di sewa
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="col-3">
                                                            <div class="card" style="width: 18rem; max-width: 250px;">
                                                                <img src="img/<?= $foto; ?>" class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?= $No; ?> By <?= $namaKost; ?></h5>
                                                                    <?php if ($status == 'SUKSES') { ?>
                                                                        <p><span class="online_animation"></span> Aktif</p>
                                                                    <?php  } else { ?>
                                                                        <p><span class="offline_animation"></span> Berhenti Sewa</p>
                                                                    <?php } ?>

                                                                    <p class="card-text"><?= $deskripsi; ?></p>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a href="checkout.php?id_kamar=<?= $idkamar; ?>" class=" btn btn-primary">Lanjut Sewa</a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#Stopsewa<?= $idPesan; ?>" class="btn btn-danger">Stop Sewa</a>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        <?php } ?>
                                                        <!-- table section -->
                                                        </div>
                                                    <?php    } ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>

                <!-- table section -->
                <!-- dashboard inner -->
                <!-- footer -->
                <div class="container-fluid">
                    <div class="footer">
                        <p>Copyright © 2022 Designed by A2.<br><br> Distributed By: Team ruweet</a>
                        </p>
                    </div>
                </div>
            </div>
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
    <!-- fancy box js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kamar').DataTable();
        });
    </script>

    <div class="modal fade" id="Stopsewa<?= $idPesan; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="" method="post">
                    <div class="modal-body">
                        Anda yakin untuk menghentikan penyewaan?
                        <input type="text" name="id_pesan" id="" value="<?= $idPesan; ?>">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" name="stop" class="btn btn-danger">Stop Sewa</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>

<?php

if (isset($_POST['stop'])) {
    $Id     = $_POST['id_pesan'];
    $query = "UPDATE pemesanan SET status_penyewaan='Berhenti Sewa Kamar' WHERE id_pemesanan='$Id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "Penyewaan dihentikan!";
    } else {
        $error =  "Gagal";
    }
}
?>