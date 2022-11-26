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
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page map">
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
                            <!-- Modal start -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Validate Kost</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  <form class="user" action="" method="POST">
                                    
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="txt_email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="password" placeholder="Password" name="txt_pass">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="password" placeholder="Password" name="txt_pass">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="password" placeholder="Password" name="txt_pass">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="password" placeholder="Password" name="txt_pass">
                                                </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal end -->
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Data Kost</h2>
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
                                                    <h2>Data Kost</h2>
                                                </div>
                                            </div>
                                            <div class="table_section padding_infor_info">
                                                <div class="table-responsive-sm">
                                                <table
                                                        id="table"
                                                        data-toggle="table"
                                                        data-search="true"
                                                        data-pagination="true"
                                                        >
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kost</th>
                                                                <th>Pemilik</th>
                                                                <th>Alamat</th>
                                                                <th>Jumlah</th>
                                                                <th>Deskripsi</th>
                                                                <th>Foto</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Bara Kost</td>
                                                                <td>Muhammad Ikbal Mubarok</td>
                                                                <td>Ngawi</td>
                                                                <td>22</td>
                                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum accusamus repudiandae facere distinctio ut omnis laboriosam, corrupti ea cumque deleniti, aperiam iusto pariatur. Itaque ut, eveniet
                                                                    iste praesentium exercitationem at.</td>
                                                                <td><img src="img/team-3.jpg" alt="" width="50px"></td>
                                                                <td>Ready</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-pen"></i></button>
                                                                    <a href="hapus.php" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
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
                        <!-- footer -->
                        <div class="container-fluid">
                            <div class="footer">
                                <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-header">
                                    <h5 class="modal-title">Validate Kost</h5>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer"></div>
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
        <!-- chart js -->
        <script src="js/Chart.min.js"></script>
        <script src="js/Chart.bundle.min.js"></script>
        <script src="js/utils.js"></script>
        <script src="js/analyser.js"></script>
        <!-- wow animation -->
        <script src="js/animate.js"></script>
        <!-- select country -->
        <script src="js/bootstrap-select.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.js"></script>
        <!-- nice scrollbar -->
        <script src="js/perfect-scrollbar.min.js"></script>
        <!-- sidebar -->
        <script>
            var ps = new PerfectScrollbar('#sidebar');
        </script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>