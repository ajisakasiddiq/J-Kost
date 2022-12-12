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
  <title>J KOST</title>
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
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
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
            <a href="service" class="nav-item nav-link ">Pelayanan</a>
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
          <h2>Checkout</h2>
        </div>
        <div class="col-12">
          <a href="order">Pemesanan</a>
          <a href="">Checkout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->


  <div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
    </section>
    <section class="store-cart">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-12 table-responsive">
            <table class="table table-borderless table-cart" aria-describedby="Cart">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name &amp; Owner</th>
                  <th scope="col">Price</th>
                  <th scope="col">Address</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 25%;">
                    <img src="img/638de345c2f56.jpeg" alt="" width="100px" />
                  </td>
                  <td style="width: 35%;">
                    <div class="product-title">Kos bara</div>
                    <div class="product-subtitle">by Dayat</div>
                  </td>
                  <td style="width: 35%;">
                    <div class="product-title">350.000</div>
                    <div class="product-subtitle">/Bulan</div>
                  </td>
                  <td style="width: 20%;">
                    <a href="#" class="btn btn-remove-cart">
                      Jember
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Shipping Details</h2>
          </div>
        </div>
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressOne">Address 1</label>
              <input type="text" class="form-control" id="addressOne" aria-describedby="emailHelp" name="addressOne" value="Setra Duta Cemara" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressTwo">Address 2</label>
              <input type="text" class="form-control" id="addressTwo" aria-describedby="emailHelp" name="addressTwo" value="Blok B2 No. 34" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="province">Province</label>
              <select name="province" id="province" class="form-control">
                <option value="West Java">West Java</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control">
                <option value="Bandung">Bandung</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="postalCode">Postal Code</label>
              <input type="text" class="form-control" id="postalCode" name="postalCode" value="40512" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="country">Country</label>
              <input type="text" class="form-control" id="country" name="country" value="Indonesia" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mobile">Mobile</label>
              <input type="text" class="form-control" id="mobile" name="mobile" value="+628 2020 11111" />
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2>Payment Informations</h2>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-4 col-md-2">
            <div class="product-title">$10</div>
            <div class="product-subtitle">Country Tax</div>
          </div>
          <div class="col-4 col-md-3">
            <div class="product-title">$280</div>
            <div class="product-subtitle">Product Insurance</div>
          </div>
          <div class="col-4 col-md-2">
            <div class="product-title">$580</div>
            <div class="product-subtitle">Ship to Jakarta</div>
          </div>
          <div class="col-4 col-md-2">
            <div class="product-title text-success">$392,409</div>
            <div class="product-subtitle">Total</div>
          </div>
          <div class="col-8 col-md-3">
            <a href="success.php" class="btn btn-custom mt-4 px-4 btn-block">
              Checkout Now
            </a>
          </div>
        </div>
      </div>
    </section>
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
</body>

</html>