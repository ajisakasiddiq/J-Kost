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
// if ($sesLvl == 1) {
//     $dis = "";
// } else {
//     $dis = "disabled";
//     echo "<script>alert('Hanya untuk akun pencari kos');</script>";
// }
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
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <!-- Template Stylesheet -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

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
                        <a href="index" class="nav-item nav-link ">Home</a>
                        <a href="about" class="nav-item nav-link">Tentang Kami</a>
                        <a href="service" class="nav-item nav-link">Pelayanan</a>
                        <a href="order" class="nav-item nav-link active">Pemesanan</a>
                    </div>
                    <div class="ml-auto">
                        <?php if (isset($_SESSION['id_user'])) { ?>
                            <ul class="navbar-nav d-lg-flex">
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                        Hi, <?php echo $name; ?>
                                        <img src="img/<?= $sesImg;  ?>" alt="" class="rounded-circle m-0 p-0 profile-picture" height="50px">
                                    </a>
                                    <div class="dropdown-menu bg-dark">
                                        <?php if ($sesLvl == 2) { ?>
                                            <a href="kamarAktif" class="dropdown-item text-danger">Dashboard</a>
                                        <?php   } else { ?>
                                            <a href="dashboard" class="dropdown-item text-danger">Dashboard</a>
                                        <?php } ?>
                                        <a href="ResetPass" class="dropdown-item text-danger">Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="logout" class="dropdown-item text-danger">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        } elseif (!isset($_SESSION['id_user'])) { ?>
                            <a href="register.php" class="btn-regis ">Register</a>
                            <a href="login.php" class="btn btn-custom">Login</a>

                        <?php } ?>
                    </div>


                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->
    <?php
    $id = $_GET['id_kamar'];
    $queryKost = "SELECT data_kost.alamat, data_kost.longtitude,data_kost.latitude,data_kost.alamat,kamar_kost.id_kamar,data_kost.nama_kost, kamar_kost.no_kamar,kamar_kost.harga,kamar_kost.foto_kamar_pertama,kamar_kost.foto_kamar_kedua,kamar_kost.foto_kamar_ketiga,kamar_kost.foto_kamar_keempat,kamar_kost.status_kamar,kamar_kost.deskripsi
                FROM kamar_kost
                INNER JOIN data_kost ON kamar_kost.id_kost=data_kost.id_kost
                WHERE kamar_kost.status_kamar = 'Tersedia' and kamar_kost.id_kamar = '$id'";
    $result = mysqli_query($koneksi, $queryKost);
    while ($row = mysqli_fetch_array($result)) {
        $idKamar = $row['id_kamar'];
        $noKamar = $row['no_kamar'];
        $namaKost = $row['nama_kost'];
        $harga = $row['harga'];
        $foto = $row['foto_kamar_pertama'];
        $fotoKedua = $row['foto_kamar_kedua'];
        $fotoKetiga = $row['foto_kamar_ketiga'];
        $fotoKeempat = $row['foto_kamar_keempat'];
        $statKamar = $row['status_kamar'];
        $long = $row['longtitude'];
        $lat = $row['latitude'];
        $des = $row['deskripsi'];
        $alamat = $row['alamat'];
    }
    ?>

    <div class="page-content page-details">
        <section class="store-gallery mt-5" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :key="photos[activePhoto].id" :src="photos[activePhoto].url" class="w-100 main-image" alt="" style="
                            max-height: 460px; 
                            min-height: 460px; 
                            border-radius: 40px;
                            
                            
                            " />
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-lg-2 mt-2 mt-md-3" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt="" style="max-height: 110px;" />
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
                            <h1 class="kost-name">Kamar Kost No.Kamar <?= $noKamar; ?></h1>
                            <p class="kost-owner">By <?= $namaKost; ?></p>
                            <p><span class="kost-price">Rp. <?= $harga; ?> </span>/ Bulan</p>

                            <!-- <div class="owner">By Dayat</div>
                            <div class="price">Rp.350.000</div> -->
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            <a class="btn btn-custom px-4 btn-block mt-2 mb-3" href="checkout?id_kamar=<?= $idKamar; ?>">Sewa</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <h5>Deskripsi Kamar Kost</h5>
                            <hr>
                            <p>
                                <?= $des; ?>
                            </p>
                            <h5>Alamat</h5>
                            <hr>
                            <p>
                                <?= $alamat; ?>
                            </p>
                            <div class="mt-2 mb-2" id="map" style="width: 100%; height: 400px;"></div>
                            <script>
                                var map = L.map('map').setView([113.69920589124717, -8.172405053026914], 13);

                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(map);

                                L.marker([51.5, -0.09]).addTo(map)
                                    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                                    .openPopup();
                            </script>
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
                activePhoto: 0,
                photos: [{
                    id: 1,
                    url: "img/<?= $foto; ?>",
                }, {
                    id: 2,
                    url: "img/<?= $fotoKedua; ?>",
                }, {
                    id: 3,
                    url: "img/<?= $fotoKetiga; ?>",
                }, {
                    id: 4,
                    url: "img/<?= $fotoKeempat; ?>",
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