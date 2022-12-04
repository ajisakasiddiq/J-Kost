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
                                    <h2>Profile</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="container">
                                            <h1>Edit Profile</h1>
                                            <hr>
                                            <div class="row">
                                                <!-- edit form column -->
                                                <div class="col-md-9 personal-info justify-align-center">
                                                    <div class="alert alert-info alert-dismissable">
                                                        <a class="panel-close close" data-dismiss="alert">×</a>
                                                        <i class="fa fa-coffee"></i> Pastikan <strong>Data diri</strong> anda terinput dengan benar!
                                                    </div>
                                                    <h3>Personal info</h3>
                                                    <div class="d-flex justify-content-center">
                                                        <img src="img/<?= $userImg ?>" alt="" class="avatar img-circle" alt="avatar" width="100px" >
                                                    </div>
                                                    <form  role="form" action="" method="post" enctype="multipart/form-data">
                                                    <?php 
                                                    $query  = "SELECT * FROM user_detail WHERE id_user = '$sesID'";
                                                    $result = mysqli_query($koneksi, $query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                        $userId = $row['id_user'];
                                                        $userNama = $row['user_nama'];
                                                        $userMail = $row['user_email'];
                                                        $userName = $row['username'];
                                                        $userLevel = $row['level'];
                                                        $userNik = $row['nik'];
                                                        $userAddress = $row['alamat'];
                                                        $userImg = $row['foto'];
                                                        $userGender = $row['jenis_kelamin'];
                                                        $userNo = $row['no_hp'];
                                                    ?>
                                                    <input value="<?= $sesID ?>" class="form-control" type="hidden" name="txt_id" id="id_user">
                                                        <div class="form-group">
                                                        <img src="img/<?= $userImg; ?>" class="avatar img-circle" alt="avatar" width="100px">
                                                        <h6>Upload a different photo...</h6>
                                                        <div class="col-lg-8">
                                                        <input type="file" class="form-control" name="gambar">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="col-lg-3 control-label">Nama :</label>
                                                            <div class="col-lg-8">
                                                                <input value="<?= $userNama; ?>" class="form-control" type="text" name="txt_nama" id="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-lg-3 control-label">Username :</label>
                                                            <div class="col-lg-8">
                                                                <input value="<?= $userName; ?>" class="form-control" type="text" name="txt_username" id="username">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="col-lg-3 control-label">Email :</label>
                                                            <div class="col-lg-8">
                                                                <input value="<?= $userMail ?>" class="form-control" type="text" name="txt_email" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik" class="col-lg-3 control-label">NIK :</label>
                                                            <div class="col-lg-8">
                                                                <input value="<?= $userNik; ?>" class="form-control" type="text" name="txt_nik" id="nik">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender" class="col-lg-3 control-label">Jenis Kelamin :</label>
                                                            <div class="col-lg-8">
                                                                <div class="ui-select">
                                                          <select id="gender" class="form-control" id="gender" name="txt_gender">
                                                          <option value="<?= $userGender;  ?>"><?= $userGender; ?></option>  
                                                          <option value="">Pilih Jenis Kelamin </option>
                                                          <option value="Laki-laki">Laki - Laki </option>
                                                          <option value="perempuan">Perempuan</option>
                                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="numberPhone" class="col-lg-3 control-label">No. HP :</label>
                                                            <div class="col-lg-8">
                                                                <input value="<?= $userNo; ?>" class="form-control" type="text" name="txt_nohp" id="numberPhone">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat" class="col-md-3 control-label">Alamat :</label>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" rows="5"<?= $userAddress; ?>  id="alamat" name="txt_alamat"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label"></label>
                                                            <div class="col-md-8">
                                                                <button class="btn btn-primary" type="submit" name="edit">Simpan</button>
                                                                <span></span>
                                                                <input type="reset" class="btn btn-default" value="Cancel">
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
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
                                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
if( isset($_POST['edit']) ){
    $userId     = $_POST['txt_id'];
    $Mail     = $_POST['txt_email'];
    $userName   = $_POST['txt_username'];
    $Name   = $_POST['txt_nama'];
    $Nik   = $_POST['txt_nik'];
    $Gender   = $_POST['txt_gender'];
    $Nohp   = $_POST['txt_nohp'];
    $Address   = $_POST['txt_alamat'];
    $Img = upload();
    // $Img   = $_POST['img'];
    
     $query = "UPDATE user_detail SET user_nama='$Name', username='$userName', user_email='$Mail',nik='$Nik',alamat='$Address',foto='$Img',no_hp='$Nohp',jenis_kelamin='$Gender' WHERE id_user='$userId'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "User data telah terupdate!";
    }else{
        $error =  "User data gagal update";
    }
}

function upload(){

    $file = $_FILES['gambar'] ['name'];
    $size = $_FILES['gambar'] ['size'];
    $error = $_FILES ['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

//cek file apakah diupload atau tidak
    if ( $error === 4 ) {
      echo "<script> 
        alert('Pilih gambar terlebih dahulu');
      </script>";
      return false;
    }

    //cek apakah benar gambar
    $extensGambarValid = ['jpg','jpeg','png'];
    $extensGambar = explode('.',$file);
    $extensGambar = strtolower(end($extensGambar));
    if (!in_array($extensGambar,$extensGambarValid)) {
      echo "<script> 
      alert('Yang anda upload bukan berupa file gambar');
    </script>";
    return false;
    }

    //cek jika ukuran nya terlalu besar 
    if ($size > 1000000) {

        echo "<script> 
        alert('Ukuran gambar terlalu besar');
      </script>";
    }

//generate nama gambar baru
$namaFIlebaru = uniqid();
$namaFIlebaru .= '.';
$namaFIlebaru .= $extensGambar;



    //lolos cek 
    move_uploaded_file($tmpName,'img/'.$namaFIlebaru);
    return $namaFIlebaru;
}

?>
<?php if(isset($success)){ ?>
    <script>
        swal({
  title: "<?= $success; ?>",
  icon: "success",
  button: "OKE!",
});
    </script>
    <?php }?>
    <?php if(isset($error)){ ?>
    <script>
        swal({
  title: "<?= $error; ?>",
  icon: "success",
  button: "OKE!",
});
    </script>
    <?php }?>






</body>

</html>