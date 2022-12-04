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

    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
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
<form id="bookingForm" action="" method="post" class="needs-validation" novalidate autocomplete="off">
        <input type="hidden" class="form-control" id="inputName" name="id_user" placeholder="Id user" required value="<?= $sesID;  ?>"/>
        <div class="text-center col-lg-3">
             <img src="../jkos/img/<?= $userImg; ?>" class="avatar img-circle" alt="avatar" width="100px">
             <h6>Upload a different photo...</h6>
             <input type="file" class="form-control" name="img">
         </div>
        <div class="form-group">
          <label for="inputName">Nama Kost</label>
          <input type="text" class="form-control" id="inputName" name="txt_nama" placeholder="Nama kost anda!" required />
        </div>
        <div class="form-group">
          <label for="textAreaRemark">Deskripsi</label>
          <textarea class="form-control" name="txt_deskripsi" id="textAreaRemark" rows="5" placeholder="Tell us you want more..."></textarea>
        </div>
        <div class="form-group">
          <label for="inputEmail">Alamat</label>
          <textarea class="form-control" rows="5"  type="text" id="alamat" name="txt_alamat"></textarea>
          <small class="form-text text-muted">Isi alamat selengkap mungkin!.</small>
        </div>

        <!-- get location start-->
        <input type="hidden" class="form-control" id="Latitude" name="Latitude" placeholder="latitude" required />
        <input type="hidden" class="form-control" id="Longitude" name="Longitude" placeholder="longitude" required />
        <div class="mt-2 mb-2" id="mapid" style="width: 100%; height: 400px;"></div>
        <script>
            const mymap = L.map('mapid').setView([-8.231935485535336, 113.60678852931734], 13);
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(mymap);

            var Latinput = document.querySelector("[name=Latitude]");
            var Lnginput = document.querySelector("[name=Longitude]");
            
            var curLocation = [-8.231935485535336, 113.60678852931734];
            mymap.attributionControl.setPrefix(false);

            var marker = new L.marker(curLocation,{
                draggable: 'true',
            });

            marker.on('dragend', function(event){
                var position = marker.getLatLng();
                marker.setLatLng(position,{
                    draggable: 'true',
                }).bindPopup(position).update();
                $("#Latitude").val(position.lat);
                $("#Longitude").val(position.lng);
            });

            mymap.addLayer(marker);
            

            mymap.on("click", function(e){
              var lat = e.latlng.lat;
              var lng = e.latlng.lng;
              if(!marker){
                marker = L.marker(e.latlng).addTo(mymap);
              }else{
                marker.setLatLng(e.latlng);
              }
              Latinput.value = lat;
              Lnginput.value = lng;
            });
        </script>
<!-- get location end-->

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
                           
</body>

</html>

<?php if(isset($_POST['tambah']) ){
    $id = $_POST['id_user'];
    $Name = $_POST['txt_nama'];
    $Deskripsi = $_POST['txt_deskripsi'];
    $Alamat = $_POST['txt_alamat'];
    $lng = $_POST['Latitude'];
    $lat = $_POST['Longitude'];
    $gambar = $_FILES['img']['name'];
    $ekstensi_diperbolehkan	= array('png','jpg');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($file_tmp, 'img/'.$gambar);

    $query = "INSERT INTO data_kost VALUES (null,'$id','$Name','$Alamat','$Deskripsi','$gambar',null,'PENDING','$lng','$lat')";
    $result = mysqli_query($koneksi,$query);
    if ($result) {
        $succes = "Data berhasil terinput!";
    }else{
        $errorr =  $query ."Error ".mysqli_error($koneksi);
    }
} ?>

<?php if(isset($succes)){ ?>
    <script>
        swal({
  title: "<?= $succes; ?>",
  icon: "success",
  button: "OKE!",
});
    </script>
    <?php }?>
    <?php if(isset($errorr)){ ?>
    <script>
        swal({
  title: "<?= $errorr; ?>",
  icon: "success",
  button: "OKE!",
});
    </script>
    <?php }?>