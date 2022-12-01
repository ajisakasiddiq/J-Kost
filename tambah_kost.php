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
    <!-- fancy box js -->
    <link rel="stylesheet" href="css/jquery.fancybox.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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
               <h2>Tambahkan Kost</h2>
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
                       <h2>Kost baru</h2>
                   </div>
               </div>
               <div class="card">
 <!--Start Card Body --> 
            <div class="card-body">
                 <!-- Start Form -->
<form id="bookingForm" action="#" method="post" class="needs-validation" novalidate autocomplete="off">
                   <!-- Start Input Name -->

          <input type="text" class="form-control" id="inputName" name="name" placeholder="Id user" required />
        
        
          <div class="form-group">
          <label for="inputName">Name</label>
          <input type="text" class="form-control" id="inputName" name="name" placeholder="Your name" required />
          <small class="form-text text-muted">Please fill your name</small>
        </div>
        <!-- End Input Name -->

        <!-- Start Input Email -->
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
          <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!-- End Input Email -->

        <!-- Start Input Telephone -->
        <div class="form-group">
          <label for="inputPhone">Phone</label>
          <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="099xxxxxxx" pattern="\d{3}\d{3}\d{4}" required />
          <small class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        <!-- End Input Telephone -->

        <!-- Start Check Room Type -->
        <div class="form-group">
          <legend class="col-form-label pt-0">Fasilitas : </legend>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="inlineRadioType1" name="roomType" value="type1" required />
            <label class="form-check-label" for="inlineRadioType1">Room 1 (10 People)</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="inlineRadioType2" name="roomType" value="type2" required />
            <label class="form-check-label" for="inlineRadioType2">Room 2 (20 People)</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="inlineRadioType3" name="roomType" value="type3" required />
            <label class="form-check-label" for="inlineRadioType3">Room 3 (30 People)</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="inlineRadioType4" name="roomType" value="type4" required />
            <label class="form-check-label" for="inlineRadioType4">Room 4 (40 People)</label>
          </div>
        </div>
        <!-- End Check Room Type -->


        <!-- Start Input Remark -->
        <div class="form-group">
          <label for="textAreaRemark">Deskripsi</label>
          <textarea class="form-control" name="remark" id="textAreaRemark" rows="2" placeholder="Tell us you want more..."></textarea>
        </div>
        <!-- End Input Remark -->

        <!-- get location -->
        <input type="text" class="form-control" id="Latitude" name="latitude" placeholder="latitude" required />
        <input type="text" class="form-control" id="Longitude" name="longitude" placeholder="longitude" required />
        <div class="mb-5" id="mapid" style="width: 1000px; height: 400px;"></div>
        <script>
            const map = L.map('mapid').setView([-8.231935485535336, 113.60678852931734], 13);
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            var Latinput = document.querySelector("[name=latitude]");
            var Lnginput = document.querySelector("[name=longitude]");
            var curLocation = [-8.231935485535336, 113.60678852931734];
            mymap.attributionControl.setPrefix(false);
            var marker = new L.marker(curLocation,{
                draggable: 'true'
            });

            marker.on('dragend', function(event){
                var position = marker.getLatLng();
                marker.setLatLng(position,{
                    draggable: 'true'
                }).bindPopup(position).update();
                $("#Latitude").val(position.Lat);
                $("#Longitude").val(position.Lng).keyup();
            });

            mymap.addLayer(marker);
        </script>

        <!-- Start Submit Button -->
        <button class="btn btn-primary btn-block col-lg-2 ms-auto" type="submit">Submit</button>
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
                            <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</body>

</html>