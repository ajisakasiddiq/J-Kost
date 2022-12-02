<?php
require("koneksi.php");

session_start();

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
                                    <h2>Detail Pemesan</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                               <div class="white_shd full margin_bottom_30">
                                  <div class="full graph_head">
                                     <div class="heading1 margin_0">
                                        <h2>Detail Pemesan</h2>
                                     </div>
                                  </div>
                                  <div class="full price_table padding_infor_info">
                                     <div class="row">
                                        <!-- user profile section --> 
                                        <!-- profile image -->
                                        <!--Admin 1-->
                                        <div class="col-lg-12">
                                           <div class="full dis_flex center_text">
                                              <div class="profile_img"><img width="180" class="rounded-circle" src="img/msg2.png" alt="#" /></div>
                                              <div class="profile_contant">
                                                 <div class="contact_inner">
                                                    <h3>Ajisaka Sidiq</h3>
                                                    <p>NIK : 3518124356789</p>
                                                    <p> Alamat : Sumbersari, Jember</p>
                                                    <p>Jenis Kelamin : laki-laki</p>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-phone"></i> : +628-7357-9829-89</li>
                                                       <li><i class="fa fa-envelope-o"></i> : Ajisaka@gmail.com</li>
                                                       
                                                    </ul>
                                                 </div>
                                                </div>
                                            </div>
                         <!-- footer -->
    
                         
                         <div class="container-fluid">
                            <div class="footer">
                             
                                
                               </p>
                            </div>
                         </div>
                      </div>
                      <!-- end dashboard inner -->
                   </div>
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
<script src="js/custom.js"></script>
<!-- calendar file css -->
<script src="js/semantic.min.js"></script>
</body>

</html>