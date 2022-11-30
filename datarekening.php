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
    <title>J-KOST</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
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
                                    <br>
                                    <h2>Data Rekening</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-lg-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="table_section padding_infor_info">
                                            <!-- table section -->
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                <div class="mb-2">
                                                        <div id="toolbar">
                                                            <button id="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahRek">
                                                                <i class="fa-solid fa-plus"></i> Tambah Rekening
                                                             </button>
                                                        </div>
                                                 </div>

                                                <table id="pemilik" class="table table-borderless" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Bank</th>
                                                                <th>Atas Nama</th>
                                                                <th>No.Rekening</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                        $query = "SELECT * FROM rekening WHERE id_user = '$sesID'";
                                                        $result= mysqli_query($koneksi, $query);
                                                        $no = 1;
                                                        while ($row = mysqli_fetch_array($result)){
                                                            $id = $row['id_user'];
                                                            $Namebank = $row['Nama_bank'];
                                                            $userName = $row['Nama_rek'];
                                                            $userNo = $row['no_rek'];
                                                        
                                                 ?>
                                                            <tr>
                                                                <td><?php echo $no; ?></td>
                                                                <td><?php echo $Namebank; ?></td>
                                                                <td><?php echo $userName; ?></td>
                                                                <td><?php echo $userNo; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#validate"><i class="fas fa-pen"></i></button>
                                                                    <a name="delete" type="button" href="datarekening.php?id_rek=<?php echo $row['id_rek']; ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php $no++; ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>

                <!-- table section -->
                <!-- dashboard inner -->
                <!-- footer -->
                <div class="container-fluid">
                    <div class="footer">
                        <p>Copyright © 2022 Designed by A2.<br><br> Distributed By: Team ruweet</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- end dashboard inner -->
        </div>
    </div>
    <!-- model popup -->
    <!-- The Modal -->
    <div class="modal fade" id="tambahRek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
           <div class="modal-header">
             <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Rekening</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <form class="user" action="" method="POST">
           <div class="modal-body">
                 <div class="form-group">
                     <input type="hidden" class="form-control form-control-user" id="idUser" aria-describedby="emailHelp" placeholder="NAMA BANK" name="txt_user" value="<?php echo $sesID; ?>">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="Bank" aria-describedby="emailHelp" placeholder="NAMA BANK" name="txt_bank">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="Nama" placeholder="Atas Nama ....." name="txt_nama">
                 </div>
                 <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="noRek" placeholder="No Rekening" name="txt_rek">
                 </div>
             
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
           </div>
           </form>
         </div>
       </div>
     </div>
    <!-- end model popup -->
    </div>
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- chart js -->
        <script src="js/Chart.min.js"></script>
        <script src="js/Chart.bundle.min.js"></script>
        <script src="js/utils.js"></script>
        <script src="js/analyser.js"></script>
        <!-- wow animation -->
        <script src="js/animate.js"></script>
        <!-- select country -->
        <script src="js/bootstrap-select.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.js"></script>
        <!-- nice scrollbar -->
        <script src="js/perfect-scrollbar.min.js"></script>
        <!-- sidebar -->
        <script>
            var ps = new PerfectScrollbar('#sidebar');
        </script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#pemilik').DataTable();
            });
        </script>
        </body>

<?php 
if(isset($_POST['tambah']) ){
    $user = $_POST['txt_user'];
    $bank = $_POST['txt_bank'];
    $name = $_POST['txt_nama'];
    $noRek = $_POST['txt_rek'];;

    $query = "INSERT INTO rekening VALUES (null,'$user','$bank','$name','$noRek')";
    mysqli_query($koneksi, $query);
 
    
    if (mysqli_affected_rows($koneksi) > 0 ) {
        echo 'Berhasil';
    } else {
        echo mysqli_error($koneksi);
    }
}



    $id = $_GET['id_rek'];

    $query =  "DELETE FROM rekening WHERE id_rek='$id'";
    mysqli_query($koneksi, $query);



?>

</html>