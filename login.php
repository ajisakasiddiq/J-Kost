<?php
require('koneksi.php');

session_start();
if (isset($_SESSION['id_user'])) {
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query      = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result     = mysqli_query($koneksi, $query);
        $num        = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_user'];
            $name = $row['user_nama'];
            $userVal = $row['user_email'];
            $passVal = $row['user_pass'];
            $userName = $row['username'];
            $level = $row['level'];
            $image = $row['foto'];
            $nik = $row['nik'];
            $address = $row['alamat'];
            $noHp = $row['no_hp'];
            $gender = $row['jenis_kelamin'];
            $Kontrak = $row['bukti_kontrak'];
        }

        if ($num != 0) {
            if ($userVal == $email && $passVal == $pass) {
                $_SESSION['id_user'] = $id;
                $_SESSION['username'] = $userName;
                $_SESSION['user_nama'] = $name;
                $_SESSION['user_email'] = $userVal;
                $_SESSION['level'] = $level;
                $_SESSION['foto'] = $image;
                $_SESSION['nik'] = $nik;
                $_SESSION['alamat'] = $address;
                $_SESSION['no_hp'] = $noHp;
                $_SESSION['jenis_kelamin'] = $gender;
                $_SESSION['bukti_kontrak'] = $Kontrak;
                header('Location: index.php');
            } else {
                $error = 'user atau password salah!!';;
                header('Location: login.php');
            }
        } else {
            $error = 'user tidak ditemukan!!';
            echo "<script>alert('$error')</script>";
            header('Location: login.php');
        }
    } else {
        $error = 'Data tidak boleh kosong!!';
        echo "<script>alert('$error')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>J-KOST</title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Custom Theme files -->
    <link href="login/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->

    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //web font -->

    <style>
        .header-main {
            max-width: 310px;
            margin: 0 auto;
            position: relative;
            z-index: 999;
            padding: 3em 2em;
            background: rgba(255, 255, 255, 0.04);
            -webkit-box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
            box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
        }
    </style>
</head>

<body>

    <!-- main -->
    <div class="w3layouts-main">
        <div class="bg-layer">
            <h1>Login</h1>
            <div class="header-main">
                <div class="main-icon pb-2" style="display:block; margin:auto; margin-bottom : 30px !important">
                </div>
                <div class="header-left-bottom">
                    <form action="" method="post">
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="email" placeholder="Email Address" name="txt_email" required />
                        </div>
                        <div class="icon1">
                            <span class="fa fa-lock"></span>
                            <input type="password" placeholder="Password" name="txt_pass" required />
                        </div>
                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
                        </div>
                        <div class="bottom">
                            <button type="submit" name="submit" class="btn btn-custom">Log In</button>
                        </div>
                        <div class="links">
                            <p><a href="#">Forgot Password?</a></p>
                            <p class="right"><a href="register.php">New User? Register</a></p>
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
                <div class="social">
                    <ul>
                        <li>or login using : </li>
                        <li><a href="#" class="facebook"><span class="fa fa-facebook"></span></a></li>

                        <li><a href="#" class="google"><span class="fa fa-google-plus"></span></a></li>
                    </ul>
                </div>
            </div>

            <!-- copyright -->
            <div class="copyright">
                <p>© 2022 | Design by <a href="http://w3layouts.com/" target="_blank">A2</a></p>
            </div>
            <!-- //copyright -->
        </div>
    </div>
    <!-- //main -->

</body>

</html>