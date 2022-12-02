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

// update data
if( isset($_POST['submit']) ){
    $userId     = $_POST['txt_id'];
    $userPass   = $_POST['txt_pass'];

    $query = "UPDATE user_detail SET user_pass ='$userPass' WHERE id_user ='$sesID';";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_affected_rows($koneksi) > 0 ) {
        echo "berhasil";
        header('Location: dashboard.php');
     } else {
        mysqli_error($koneksi);
        header('Location: dashboard.php');
     }
  //header('Location: ResetPass.php');
    
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
                                        <div class="card login-form">
                                            <div class="card-body">
                                                <h3 class="card-title text-center">Setting Account</h3>

                                                <!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->

                                                <div class="card-text">
                                                    <form>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <strong>Hai <?php echo $name ?>!</strong> Double check your data.
                                                            <a class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <input id="id_user" type="text" class="form-control form-control-sm" name="txt_id" value="<?= $sesID;  ?>">
                                                        <div class="form-group">
                                                            <label for="password1">Your new password</label>
                                                            <input id="password1" type="password" class="form-control form-control-sm" name="txt_pass">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password2">Repeat password</label>
                                                            <input  id="password2" type="password" class="form-control form-control-sm" name="txt_pass2">
                                                        </div>
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block submit-btn">Confirm</button>
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
</body>

</html>