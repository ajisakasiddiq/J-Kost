<?php  
require('koneksi.php');

session_start();
if(isset($_SESSION['id_user'])){
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    
    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query      = "SELECT * FROM user WHERE user_email = '$email'";
        $result     = mysqli_query($koneksi, $query);
        $num        = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id_user'];
            $name = $row['user_nama'];
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['username'];
            $level = $row['level'];
            $image = $row['foto'];
        }

        if ($num != 0) {
            if ($userVal==$email && $passVal==$pass) {
                $_SESSION['id_user'] = $id;
                $_SESSION['username'] = $userName;
                $_SESSION['user_nama'] = $name;
                $_SESSION['user_email'] = $userVal;
                $_SESSION['level'] = $level;
                $_SESSION['foto'] = $image;
                header('Location: index.php');
            }else{
                $error = 'user atau password salah!!';
                echo "<script>alert('ERRORR COKKK')</script>";
                header('Location: login.php');
            }
        }else{
            $error = 'user tidak ditemukan!!';
            echo "<script>alert('$error')</script>";
            header('Location: login.php');
        }
    }else{
        $error = 'Data tidak boleh kosong!!';
        echo "<script>alert('$error')</script>";
    }
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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    
    <script>
        $(document).ready(function(){       
            $('.form-checkbox').click(function(){
                if($(this).is(':checked')){
                    $('.form-password').attr('type','text');
                }else{
                    $('.form-password').attr('type','password');
                }
            });
        });
    </script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 125px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="txt_email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="txt_pass">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input form-checkbox" id="show_password" name="show_password">
                                                <label class="custom-control-label" for="show_password">Show Password</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-custom btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){  
            $('#show_password').on('click', function(){  
                var passwordField = $('#password');  
                var passwordFieldType = passwordField.attr('type');
                if(passwordField.val() != '')
                {
                    if(passwordFieldType == 'password')  
                    {  
                        passwordField.attr('type', 'text');  
                        $(this).text('Hide Password');  
                    }  
                    else  
                    {  
                        passwordField.attr('type', 'password');  
                        $(this).text('Show Password');  
                    }
                }
                else
                {
                    alert("Please Enter Password");
                }
            });  
        }); 
    </script>
</body>

</html>