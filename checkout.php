<?php
ob_start();
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

$querykode = "SELECT max(id_pemesanan) as kode FROM pemesanan";
$result = mysqli_query($koneksi, $querykode);
$row = mysqli_fetch_array($result);
$kode = $row['kode'];

$urutan_kode = (int) substr($kode, 3, 3);
$urutan_kode++;
$kodeunik = "Jkost" . sprintf("%04s", $urutan_kode);

echo  $kodeunik;
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
  <?php
  $id = $_GET['id_kamar'];
  $queryKost = "SELECT data_kost.longtitude,data_kost.latitude,data_kost.alamat,kamar_kost.id_kamar,data_kost.nama_kost, kamar_kost.no_kamar,kamar_kost.harga,kamar_kost.foto_kamar_pertama,kamar_kost.foto_kamar_kedua,kamar_kost.foto_kamar_ketiga,kamar_kost.foto_kamar_keempat,kamar_kost.status_kamar,kamar_kost.deskripsi,rekening.Nama_rek,rekening.Nama_bank,rekening.no_rek,rekening.id_rek
  FROM kamar_kost
  INNER JOIN data_kost ON kamar_kost.id_kost=data_kost.id_kost
  INNER JOIN user_detail ON data_kost.id_user=data_kost.id_user
  INNER JOIN rekening ON rekening.id_user=data_kost.id_user
                WHERE kamar_kost.status_kamar = 'Tersedia' and kamar_kost.id_kamar = '$id'";
  $result = mysqli_query($koneksi, $queryKost);
  while ($row = mysqli_fetch_array($result)) {
    $idKamar = $row['id_kamar'];
    $idrek = $row['id_rek'];
    $noKamar = $row['no_kamar'];
    $namaKost = $row['nama_kost'];
    $harga = $row['harga'];
    $foto = $row['foto_kamar_pertama'];
    $statKamar = $row['status_kamar'];
    $long = $row['longtitude'];
    $lat = $row['latitude'];
    $des = $row['deskripsi'];
    $naRek = $row['Nama_rek'];
    $naBank = $row['Nama_bank'];
    $noRek = $row['no_rek'];
  }
  ?>

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
                  <th scope="col">Duration</th>
                  <th scope="col">Address</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 25%;">
                    <img src="img/<?= $foto; ?>" alt="" width="100px" />
                  </td>
                  <td style="width: 25%;">
                    <div class="product-title">Kamar Kost No.Kamar <?= $noKamar; ?></div>
                    <div class="product-subtitle">By <?= $namaKost; ?></div>
                  </td>
                  <td style="width: 25%;">
                    <div id="total" class="product-title">Rp. <?= $harga; ?></div>
                  </td>
                  <td style="width: 25%;">
                    <div class="product-title"><span id="selected">1</span> Bulan</div>
                  </td>
                  <td style="width: 25%;">
                    <div class="product-title">Jember</div>
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
            <h2 class="mb-4">Detail Pemesanan</h2>
          </div>
        </div>
        <form action="" method="post">
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="txt_nama" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nik">Nomor Induk Kependudukan(NIK) </label>
                <input type="text" class="form-control" id="nik" name="txt_nik" />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="">Durasi</label>
                <select name="txt_durasi" id="package" class="form-control">
                  <option value="1">1 Bulan</option>
                  <option value="3">3 Bulan</option>
                  <option value="6">6 Bulan</option>
                  <option value="12">12 Bulan</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Mulai Ngekos</label>
                <input type="date" class="form-control" id="tgl" name="tgl_kos" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="harga_kos">Harga Kos Perbulan</label>
                <input value="<?= $harga; ?>" type="text" class="form-control" name="hargakos" id="price" readonly />
              </div>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Informasi Pembayaran </h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-3">
              <div class="form-group">
                <label for="namabank">Nama Bank</label>
                <input type="text" class="form-control" id="namabank" name="bank_pemilik" value="<?= $naBank; ?>" readonly />
                <input type="hidden" class="form-control" id="namabank" name="txt_idkamar" value="<?= $idKamar; ?>" readonly />
                <input type="hidden" class="form-control" id="namabank" name="txt_idrek" value="<?= $idrek; ?>" readonly />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="atasnama">Atas Nama</label>
                <input type="text" class="form-control" id="atasnama" name="nama_rek" value="<?= $naRek; ?>" readonly />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="norek">No Rekening</label>
                <input type="text" class="form-control" id="norek" name="no_rek" value="<?= $noRek; ?>" readonly />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="mobile">Total Pembayaran</label>
                <input id="total" type="text" class="form-control" id="mobile" name="bayar" value="<?= $harga; ?>" readonly />
              </div>
            </div>

            <div class="col-8 col-md-3">
              <button type="submit" name="sewa" class="btn btn-custom mt-4 px-4 btn-block">
                Checkout Now
              </button>
            </div>
        </form>
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
  <script>
    $('#package').on('change', function() {
      const selectedPackage = $('#package').val();
      $('#selected').text(selectedPackage);
    });



    $('#package').on('change', function() {
      // ambil data dari elemen option yang dipilih
      const duration = $('#package option:selected').val();
      const price = $('#price').val();

      // kalkulasi total harga
      const total = price * duration;
      $('[name=bayar]').val(total);
      $('#total').text(`Rp ${total}`);
    });
  </script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>
<?php if (isset($_POST['sewa'])) {
  $kamarId = $_POST['txt_idkamar'];
  $rekId = $_POST['txt_idrek'];
  $Nama = $_POST['txt_nama'];
  $Nik = $_POST['txt_nik'];
  $durasi = $_POST['txt_durasi'];
  $tglMulai = $_POST['tgl_kos'];
  $hargaKos = $_POST['hargakos'];
  $namabank = $_POST['bank_pemilik'];
  $namarekening = $_POST['nama_rek'];
  $nomerekening = $_POST['no_rek'];
  $total = $_POST['bayar'];


  $query = "INSERT INTO pemesanan VALUES (null,'$sesID','$kamarId','$rekId','$kodeunik','$Nama','$Nik','$tglMulai','$durasi','$hargaKos',current_timestamp(),'$total',1,'$nomerekening','$namarekening','$namabank','Menunggu Pembayaran')";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
    header("Location: success.php");
  } else {
    echo mysqli_error($koneksi);
  }
}
?>

</html>