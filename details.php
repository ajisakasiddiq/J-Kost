<?php
require("koneksi.php");

session_start();

if (isset($_SESSION['id_user'])) {
    //$_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
   // header('Location: login.php');
$sesID = $_SESSION['id_user'];
$sesName = $_SESSION['username'];
$name = $_SESSION['nama'];
$sesLvl = $_SESSION['level'];
$sesEmail = $_SESSION['email'];

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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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


    <div class="page-content page-details">
        <section class="store-gallery mt-5" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :key="photos[activePhoto].id" :src="photos[activePhoto].url" class="w-100 main-image" alt="" />
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-lg-2 mt-lg-2 mt-md-3" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="kost-name">Bara Kost</h1>
                            <p class="kost-owner">By Dayat</p>
                            <p><span class="kost-price">Rp. 500.000 </span>/ Bulan</p>

                            <!-- <div class="owner">By Dayat</div>
                            <div class="price">Rp.350.000</div> -->
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            <a class="btn btn-custom px-4 btn-block mb-3" href="/cart.html">Sewa</a
                  >
                </div>
              </div>
            </div>
          </section>
          <section class="store-description">
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-8">
                  <p>
                    The Nike Air Max 720 SE goes bigger than ever before with
                    Nike's tallest Air unit yet for unimaginable, all-day comfort.
                    There's super breathable fabrics on the upper, while colours
                    add a modern edge.
                  </p>
                  <p>
                    Bring the past into the future with the Nike Air Max 2090, a
                    bold look inspired by the DNA of the iconic Air Max 90.
                    Brand-new Nike Air cushioning underfoot adds unparalleled
                    comfort while transparent mesh and vibrantly coloured details
                    on the upper are blended with timeless OG features for an
                    edgy, modernised look.
                  </p>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.42355736385!2d113.72099831436081!3d-8.160010184012863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1668518560066!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
  
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
        <p>&copy; <a href="index.html">J'Kost</a>, All Right Reserved.</p>
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
    <script src="js/vue/vue.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 3,
                photos: [{
                    id: 1,
                    url: "img/product-details-1.jpg",
                }, {
                    id: 2,
                    url: "img/product-details-2.jpg",
                }, {
                    id: 3,
                    url: "img/product-details-3.jpg",
                }, {
                    id: 4,
                    url: "img/product-details-4.jpg",
                }, ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });
    </script>
</body>

</html>