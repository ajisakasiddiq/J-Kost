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
    <meta charset="utf-8">
    <title>J-KOS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <h1>J<span>KOS</span></h1>
                        </a>
                    </div>
                </div>
                <div class="col-4 col-md-4">
                    <div class="top-bar-item">
                        <div class="top-bar-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="top-bar-text">
                            <h3>Call Us</h3>
                            <p>0891 3687 7252</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-4">
                    <div class="top-bar-item">
                        <div class="top-bar-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="top-bar-text">
                            <h3>Email Us</h3>
                            <p>zidanprasetyo@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="about.php" class="nav-item nav-link">Tentang Kami</a>
                        <a href="service.php" class="nav-item nav-link">Pelayanan</a>
                        <a href="order.php" class="nav-item nav-link active">Pemesanan</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="ml-auto">
                        <?php if(isset($_SESSION['id_user']) ){ ?>
                            <ul class="navbar-nav d-lg-flex">
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    Hi, <?php echo $name; ?>
                                    <img src="img/team-2.jpg" alt="" class="rounded-circle m-0 p-0 profile-picture " height="50px">
                                </a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="dashboard.php" class="dropdown-item text-danger">Dashboard</a>
                                    <a href="ResetPass.php" class="dropdown-item text-danger">Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="logout.php" class="dropdown-item text-danger">Logout</a>
                                </div>
                            </li>
                        </ul>
                        <?php 
                    }elseif(!isset($_SESSION['id_user'])) {?>
                        <a href="register.php" class="btn-regis ">Register</a>
                        <a href="login.php" class="btn btn-custom">Login</a>
                       
                        <?php } ?>
                    </div>


                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Pemesanan</h2>
                </div>
                <div class="col-12">
                    <a href="">Harga dan Keterangan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Price Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Kos Kosan</p>
                <h2>Pilih Kos Sesuai Keinginan Anda</h2>
            </div>
            <!-- <div class="row">
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-header">
                            <h3>Bara Kost</h3>
                            <h2><span>$</span><strong>25</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Window Wiping</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" href="details.html">Pesan Disini</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-item featured-item">
                        <div class="price-header">
                            <h3>Kost Sakinah</h3>
                            <h2><span>$</span><strong>35</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Window Wiping</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" href="details.html">Pesan Disini</a>
                        </div>
                    </div>
                </div>

            </div> -->


            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 mb-3">
                    <a href="details.php">
                    <div class="card">
                        <img src="img/product-details-4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-text">Bara Kost</h3>
                            <p>By Bara kost</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Price End -->


    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-contact">
                        <h2>Get In Touch</h2>
                        <p><i class="fa fa-map-marker-alt"></i>Jl. Mastrip PO BOX 164, Jember - Jawa Timur- Indonesia</p>
                        <p><i class="fa fa-phone-alt"></i>+62 331 333533</p>
                        <p><i class="fa fa-envelope"></i>politeknik@polije.ac.id</p>
                        <div class="footer-social">
                            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Popular Links</h2>
                        <a href="">About Us</a>
                        <a href="">Contact Us</a>
                        <a href="">Our Service</a>
                        <a href="">Service Points</a>
                        <a href="">Pricing Plan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Useful Links</h2>
                        <a href="">Terms of use</a>
                        <a href="">Privacy policy</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-newsletter">
                        <h2>Newsletter</h2>
                        <form>
                            <input class="form-control" placeholder="Full Name">
                            <input class="form-control" placeholder="Email">
                            <button class="btn btn-custom">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <p>&copy; <a href="index.php">J'Kost</a>, All Right Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to top button -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Pre Loader -->
    <div id="loader" class="show">
        <div class="loader"></div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>