<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>J-KOS</title>
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

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">Tentang Kami</a>
                        <a href="service.php" class="nav-item nav-link">Pelayanan</a>
                        <a href="order.php" class="nav-item nav-link">Pemesanan</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="ml-auto">
                        <?php if(isset($_SESSION['id_user']) ){ ?>
                            <ul class="navbar-nav d-lg-flex">
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    Hi, <?php echo $name; ?>
                                    <img src="img/team-2.jpg" alt="" class="rounded-circle m-0 p-0 profile-picture " height="50px">
                                </a>
                                <div class="dropdown-menu bg-dark">
                                    <a href="dashboard.php" class="dropdown-item text-danger">Dashboard</a>
                                    <a href="ResetPass.php" class="dropdown-item text-danger">Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="logout.php" class="dropdown-item text-danger">Logout</a>
                                </div>
                            </li>
                        </ul>
                        <?php 
                    }elseif(!isset($_SESSION['id_user'])) {?>
                        <a href="register2.php" class="btn-regis ">Register</a>
                        <a href="login2.php" class="btn btn-custom">Login</a>
                       
                        <?php } ?>
                    </div>

                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->