<?php
require('koneksi.php');
if (isset($_POST['register'])) {
    $Mail = $_POST['txt_email'];
    $Pass = $_POST['txt_pass'];
    $userName = $_POST['txt_username'];
    $Name = $_POST['txt_nama'];
    $Lvl = $_POST['txt_level'];

    $query = "INSERT INTO user_detail VALUES (null,'$Name','$userName','$Mail','$Pass','$Lvl',null,null,'profil.jpg',null,null,null,'NOT VERIFIED')";
    mysqli_query($koneksi, $query);


    if (mysqli_affected_rows($koneksi) > 0) {
        header('Location: login.php');
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>J-KOST</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
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
        .header-left-bottom input[type="text"] {
            outline: none;
            font-size: 15px;
            color: #222;
            border: none;
            width: 90%;
            display: inline-block;
            background: transparent;
            letter-spacing: 1px;
        }

        .header-left-bottom .option {
            outline: none;
            font-size: 15px;
            color: #222;
            border: none;
            width: 90%;
            display: inline-block;
            background: transparent;
            letter-spacing: 1px;
        }

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
            <h1>Register</h1>
            <div class="header-main">
                <div class="main-icon pb-2" style="display:block; margin:auto; margin-bottom : 30px !important">
                </div>
                <div class="header-left-bottom">
                    <form action="#" method="post">
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="text" placeholder="Your Name" name="txt_nama" required />
                        </div>
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="email" placeholder="Email Address" name="txt_email" required />
                        </div>
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="text" placeholder="Username" name="txt_username" required />
                        </div>
                        <div class="icon1">
                            <span class="fa fa-lock"></span>
                            <input type="password" placeholder="Password" name="txt_pass" required />
                        </div>
                        <div class="icon1">
                            <select class="option" placeholder="Pilih Daftar Sebagai" class="form-control  form-select" name="txt_level" id="OptionLevel">
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
                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
                        </div>
                        <div class="bottom">
                            <button class="btn" name="register">Log In</button>
                        </div>
                        <div class="links">
                            <p class="right"><a href="login.php">Have account?Login</a></p>
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- copyright -->
            <!-- //copyright -->
        </div>
    </div>
    <!-- //main -->

</body>

</html>