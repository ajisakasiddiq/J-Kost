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
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
   <body class="inner_page contact_page">
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
                                    <h2>Profile Admin</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-lg-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                    <div class="table_section padding_infor_info">
                                        <div class="full graph_head">
                                            <div class="heading1 margin_0">
                                                <h2>Admin </h2>
                                            </div>
                                        </div>
                                        <div class="table_section padding_infor_info">

                                        <table
                                                    id="table"
                                                    data-toggle="table"
                                                    data-search="true"
                                                    data-pagination="true"
                                                    >
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Username</th>
                                                            <th>NIK</th>
                                                            <th>Alamat</th>
                                                            <th>No hp</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Foto</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $query = "SELECT * FROM user_detail WHERE level = 3";
                                                    $result= mysqli_query($koneksi, $query);
                                                    $no = 1;
                                                    while ($row = mysqli_fetch_array($result)){
                                                        $Name = $row['user_nama'];
                                                            $userName = $row['username'];
                                                            $userMail = $row['user_email'];
                                                            $userNIK = $row['nik'];
                                                            $userAddress = $row['alamat'];
                                                            $userImg = $row['foto'];
                                                            $userNo = $row['no_hp'];
                                                            $userGender = $row['jenis_kelamin'];

                                                 ?>
                                                            <tr>
                                                                <td><?php echo $no; ?></td>
                                                                <td><?php echo $Name; ?></td>
                                                                <td><?php echo $userMail; ?></td>
                                                                <td><?php echo $userName; ?></td>
                                                                <td><?php echo $userNIK; ?></td>
                                                                <td><?php echo $userAddress; ?></td>
                                                                <td><?php echo $userNo; ?></td>
                                                                <td><?php echo $userGender; ?></td>
                                                                <td><?php echo $userImg; ?></td>
                                                                <td>
                                                                    <a href="auth_kos.php" class="btn btn-primary btn-circle"><i class="fas fa-pen"></i></a>

                                                                    <a href="hapus.php" class="btn btn-danger btn-circle" ><i class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php $no++; ?>
                                                    <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end row -->
                    </div>
                </div>
               <!-- end row -->
            </div>
        </div>
    </div>
</div>
</div>
    <!-- footer -->
    <div class="container-fluid">
        <div class="footer">
            <p>Copyright © 2022 <br><br> Distributed By: <a href="https://themewagon.com/">Team Ruwett</a>
        </div>
    </div>
    <!-- end dashboard inner -->
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
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
</body>

</html>