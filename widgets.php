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
   <body class="inner_page contact_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                        
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="img/avatar.png"#" /></div>
                        <div class="user_info">
                           <h6>Admin</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                         </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home yellow_color"></i> <span>Home</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="dashboard.html">> <span>Default Dashboard</span></a>
                           </li>

               
                                </li>
                            </ul>
                        </li>
                        <li><a href="widgets.html"><i class="fa fa-group orange_color"></i> <span>Profile Admin</span></a></li>
                        <li><a href="Transaksi.html"><i class="fa fa-money purple_color2"></i> <span>Transaksi</span></a></li>
                        <li>
                            <a href="contact.html">
                                <i class="fa fa-university red_color"></i> <span>Data Rumah Kost</span></a>
                        </li>
                        <li class="active">
                            <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user yellow_color"></i> <span>User</span></a>
                            <ul class="collapse list-unstyled" id="user">
                                <li><a href="table_penyewa.html">> <span>Penyewa</span></a></li>
                                <li><a href="table_pemilik.html">> <span>Pemilik</span></a></li>
                            </ul>
                            <li><a href="datakamar.html"><i class="fa fa-university red_color"></i> <span>Data Kamar</span></a></li>
                            <li><a href="datarekening.html"><i class="fa fa-money purple_color2"></i> <span>Data Rekening</span></a></li>
                    </ul>
                    </li>

                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>

                                        <ul class="user_profile_dd">
                                            <li>
                                                <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="img/msg3.png" alt="#" /><span class="name_user">Kirana Ramadhanti</span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="profile.html">My Profile</a>
                                                    <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
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
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Posisi</th>
                                                <th>Alamat</th>
                                                <th>No.Handphone</th>
                                                <th>Email</th>
                                                <th>Foto</th>
                                                <th> </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ajisaka Siddiq</td>
                                                    <td>Ajisaka</td>
                                                    <td>Programmer</td>
                                                    <td>Sumbersari, Jember</td>
                                                    <td>089765567655</td>
                                                    <td>ajisaka@gmail.com</td> 
                                                    <td></td>
                                                    <td>
                                                        <a href="edit.php" class="btn btn-primary btn-circle"><i class="fas fa-pen"></i></a>
                                                        <a href="#" class="btn btn-danger btn-circle" onClick="confirmModal('hapus.php');"><i class="fas fa-trash"></i></a>
           
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Muhammad Zidan Prasetyo</td>
                                                    <td>Zidan</td>
                                                    <td>Programmer</td>
                                                    <td>Kraksaan, Probolinggo</td>
                                                    <td>081936877252</td>
                                                    <td>zidanprasetyo@gmail.com</td> 
                                                    <td></td>
                                                    <td>
                                                        <a href="edit.php" class="btn btn-primary btn-circle"><i class="fas fa-pen"></i></a>
                                                        <a href="#" class="btn btn-danger btn-circle" onClick="confirmModal('hapus.php');"><i class="fas fa-trash"></i></a>
           
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Elli Rofiah</td>
                                                    <td>Elli</td>
                                                    <td>Programmer</td>
                                                    <td>Nganjuk</td>
                                                    <td>-</td>
                                                    <td>-</td> 
                                                    <td></td>
                                                    <td>
                                                        <a href="edit.php" class="btn btn-primary btn-circle"><i class="fas fa-pen"></i></a>
                                                        <a href="#" class="btn btn-danger btn-circle" onClick="confirmModal('hapus.php');"><i class="fas fa-trash"></i></a>
           
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Kirana Ramadhanti</td>
                                                    <td>Kirana</td>
                                                    <td>Programmer</td>
                                                    <td>Jember</td>
                                                    <td>-</td>
                                                    <td>-</td> 
                                                    <td></td>
                                                    <td>
                                                        <a href="edit.php" class="btn btn-primary btn-circle"><i class="fas fa-pen"></i></a>
                                                        <a href="#" class="btn btn-danger btn-circle" onClick="confirmModal('hapus.php');"><i class="fas fa-trash"></i></a>
           
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </table>

                     </div>
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
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>
    <script></script>
</body>

</html>