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
    <meta charset="utf-8">
    <title>J-KOS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">

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
                        <a href="index" class="nav-item nav-link ">Home</a>
                        <a href="about" class="nav-item nav-link">Tentang Kami</a>
                        <a href="service" class="nav-item nav-link">Pelayanan</a>
                        <a href="order" class="nav-item nav-link active">Pemesanan</a>
                        <!-- <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                    </div>
                    <div class="ml-auto">
                        <?php if (isset($_SESSION['id_user'])) { ?>
                            <ul class="navbar-nav d-lg-flex">
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                        Hi, <?php echo $name; ?>
                                        <img src="img/<?= $sesImg;  ?>" alt="" class="rounded-circle m-0 p-0 profile-picture " height="50px">
                                    </a>
                                    <div class="dropdown-menu bg-dark">
                                        <a href="dashboard" class="dropdown-item text-danger">Dashboard</a>
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
            <form action="" method="get">
                <div class="row mb-3 justify-content-between">
                    <div class="col-lg-3">
                        <select class="form-control  form-select" aria-label="Default select example">
                            <option selected><i class="fa-regular fa-people"></i>Semua Tipe Kost</option>
                            <option value="1">Cewek</option>
                            <option value="2">Cowok</option>
                            <option value="3">Campur</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-control  form-select" aria-label="Default select example">
                            <option selected><i class="fa-regular fa-people"></i>Bulanan</option>
                            <option value="1">Per 3 Bulan</option>
                            <option value="2">Per 6 Bulan</option>
                            <option value="3">Tahunan </option>
                        </select>
                    </div>
                    <div class="col-lg-6 input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari nama kos/alamat/tempat " aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="input-group-text  btn" id="basic-addon2">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">

                <?php
                $queryKost = "SELECT kamar_kost.id_kamar,data_kost.nama_kost, kamar_kost.no_kamar,kamar_kost.harga,kamar_kost.foto_kamar_pertama,kamar_kost.status_kamar
                        FROM kamar_kost
                        INNER JOIN data_kost ON kamar_kost.id_kost=data_kost.id_kost
                        WHERE kamar_kost.status_kamar = 'Tersedia' AND data_kost.status = 'APPROVED'";
                $result = mysqli_query($koneksi, $queryKost);
                while ($row = mysqli_fetch_array($result)) {
                    $idKamar = $row['id_kamar'];
                    $noKamar = $row['no_kamar'];
                    $namaKost = $row['nama_kost'];
                    $harga = $row['harga'];
                    $foto = $row['foto_kamar_pertama'];
                    $statKamar = $row['status_kamar']
                ?>
                    <div class="col-lg-3 mb-3">
                        <a href="details.php?id_kamar=<?= $idKamar; ?>">
                            <div class="card">
                                <img src="img/<?= $foto; ?>" class="card-img-top" alt="..." style="max-height: 140px;">
                                <div class="card-body">
                                    <h2 class="card-text">Kamar Kost No.Kamar <?= $noKamar; ?></h2>
                                    <p>By <?= $namaKost; ?></p>
                                    <p><span class="kost-price">Rp. <?= $harga; ?> </span>/ Bulan</p>
                                    <p><?= $statKamar; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example position-absolute top-0 start-50 translate-middle ">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

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