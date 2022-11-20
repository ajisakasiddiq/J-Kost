<?php
require('koneksi.php');
if( isset($_POST['register']) ){
    $Mail = $_POST['txt_email'];
    $Pass = $_POST['txt_pass'];
    $userName = $_POST['txt_username'];
    $Name = $_POST['txt_nama'];
    $Lvl = $_POST['txt_level'];

    $query = "INSERT INTO user VALUES ('','$Name','$userName','$Pass','$Lvl','')";
    $result = mysqli_query($koneksi, $query);
    // header('Location: login.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputName"
                                        placeholder="Name" name="txt_nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="txt_email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Username" name="txt_username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Password" name="txt_pass">
                                </div>
                                <div class="form-group">
                                    <select placeholder="Pilih Daftar Sebagai" class="form-control  form-select" name="txt_level" id="OptionLevel">
                                        <option>Daftar sebagai</option>
                                        <?php 
                                         $query = "SELECT * FROM level_detail
                                         WHERE level IN ('Pemilik kos','Pencari Kos');";
                                         $result = mysqli_query($koneksi, $query);
                                         while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value=$row[id_level] > $row[level] </option>";
                                        }
                                            ?>
                                    </select>
                                </div>

                                <button type="submit"  name="register" class="btn btn-primary btn-custom btn-block">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>