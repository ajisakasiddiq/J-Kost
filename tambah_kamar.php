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
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- site icon -->
  <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
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
  <!-- fancy box js -->
  <link rel="stylesheet" href="css/jquery.fancybox.css" />
  <!-- font awesome -->
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">

  <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
  <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>

<body class="inner_page tables_page">
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
                  <h2>Tambahkan Kamar</h2>
                </div>
              </div>
            </div>
            <!-- row -->
            <div class="row">
              <!-- table section -->
              <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                  <div class="full graph_head">
                    <div class="heading1 margin_0">
                      <h2>Kamar baru</h2>
                    </div>
                  </div>
                  <div class="card">
                    <!--Start Card Body -->
                    <div class="card-body">
                      <!-- Start Form -->
                      <form id="bookingForm" action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate autocomplete="off">
                        <input type="hidden" class="form-control" id="inputName" name="name" placeholder="Id kost" required value="<?= $sesID;  ?>" />
                        <div class="form-group">
                          <div class="row">
                            <div class="col-3">
                              <label for="inputName">Foto Depan kamar</label>
                              <input type="file" class="form-control" id="inputName" name="gambar" required />
                            </div>
                            <div class="col-3">
                              <label for="inputName">Foto Dalam Kamar</label>
                              <input type="file" class="form-control" id="inputName" name="gambarDalam" required />
                            </div>
                            <div class="col-3">
                              <label for="inputName">Foto kamar mandi</label>
                              <input type="file" class="form-control" id="inputName" name="gambarMandi" required />
                            </div>
                            <div class="col-3">
                              <label for="inputName">Foto Dapur</label>
                              <input type="file" class="form-control" id="inputName" name="gambarDapur" required />
                            </div>
                          </div>

                        </div>
                        <div class="form-group">
                          <label for="">Kost</label>
                          <select name="id_kost" id="" class="form-control" required>
                            <?php
                            $query = "SELECT * FROM data_kost
                             WHERE id_user = '$sesID';";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_array($result)) {
                              echo "<option value=$row[id_kost] > $row[nama_kost] </option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputName">Jenis Kamar</label>
                          <select name="txt_jenis" id="" class="form-control form-control-user" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Campur">Campur</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputName">No Kamar</label>
                          <input type="text" class="form-control" id="inputName" name="no" placeholder="Nomor Kamar" required />
                        </div>
                        <div class="form-group">
                          <label for="inputName">Harga</label>
                          <input type="text" class="form-control" id="inputName" name="harga" placeholder="Harga/Bulan" required />
                        </div>
                        <div class="form-group">
                          <label for="textAreaRemark">Deskripsi</label>
                          <textarea name="deskripsi" class="form-control" name="deskripsi" id="textAreaRemark" rows="5" placeholder="Tambahkan Peraturan dan Deskripsi kamar kost anda...."></textarea>
                        </div>

                        <!-- Start Submit Button -->
                        <button class="btn btn-primary btn-block col-lg-2 ms-auto" type="submit" name="tambah">Submit</button>
                        <!-- End Submit Button -->
                      </form>
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
                  <!-- fancy box js -->
                  <script src="js/jquery-3.3.1.min.js"></script>
                  <script src="js/jquery.fancybox.min.js"></script>
                  <!-- custom js -->
                  <script src="js/custom.js"></script>
                  <!-- calendar file css -->
                  <script src="js/semantic.min.js"></script>
                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



                  <?php if (isset($_POST['tambah'])) {
                    $id = $_POST['id_kost'];
                    $Jenis = $_POST['txt_jenis'];
                    $Deskripsi = $_POST['deskripsi'];
                    $No = $_POST['no'];
                    $Harga = $_POST['harga'];
                    $Img = upload();
                    // $Img   = $_POST['img'];
                    if (!$Img) {
                      return false;
                    }

                    $query = "INSERT INTO kamar_kost VALUES (null,'$id','$Jenis','$No','$Harga','Tersedia','$Img','$Deskripsi')";
                    $result = mysqli_query($koneksi, $query);
                    if ($result) {
                      $succes = "Data berhasil terinput!";
                    } else {
                      $errorr =  $query . "Error " . mysqli_error($koneksi);
                    }
                  }

                  function upload()
                  {
                    $file = $_FILES['gambar']['name'];
                    $size = $_FILES['gambar']['size'];
                    $error = $_FILES['gambar']['error'];
                    $tmpName = $_FILES['gambar']['tmp_name'];
                    //cek file apakah diupload atau tidak
                    if ($error === 4) {
                      echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
                      return false;
                    }
                    //cek apakah benar gambar
                    $extensGambarValid = ['jpg', 'jpeg', 'png'];
                    $extensGambar = explode('.', $file);
                    $extensGambar = strtolower(end($extensGambar));
                    if (!in_array($extensGambar, $extensGambarValid)) {
                      echo "<script>alert('Yang anda upload bukan berupa file gambar');</script>";
                      return false;
                    }
                    //cek jika ukuran nya terlalu besar 
                    if ($size > 1000000) {
                      echo "<script>alert('Ukuran gambar terlalu besar');</script>";
                    }
                    //generate nama gambar baru
                    $namaFIlebaru = uniqid();
                    $namaFIlebaru .= '.';
                    $namaFIlebaru .= $extensGambar;
                    //lolos cek 
                    move_uploaded_file($tmpName, 'img/' . $namaFIlebaru);
                    return $namaFIlebaru;
                  }

                  ?>

                  <?php if (isset($succes)) { ?>
                    <script>
                      swal({
                        title: "<?= $succes; ?>",
                        icon: "success",
                        button: "OKE!",
                      });
                    </script>
                  <?php } ?>
                  <?php if (isset($errorr)) { ?>
                    <script>
                      swal({
                        title: "<?= $errorr; ?>",
                        icon: "success",
                        button: "OKE!",
                      });
                    </script>
                  <?php } ?>
</body>

</html>