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
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <!-- font awesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page map">
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
                                    <h2>Data Kost</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-lg-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="table_section padding_infor_info">

                                            <div class="full graph_head">
                                                <div class="heading1 margin_0">
                                                    <h2>Data Kost</h2>
                                                </div>
                                            </div>
                                            <div class="table_section padding_infor_info">
                                                <div class="table-responsive-sm">
                                                    <table id="datakost" class="table table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Kost</th>
                                                                <th>Pemilik</th>
                                                                <th>Alamat</th>
                                                                <th>Jumlah</th>
                                                                <th>Deskripsi</th>
                                                                <th>Foto</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = "SELECT user_detail.user_nama AS 'NAMA PEMILIK',user_detail.no_hp AS 'NO HP PEMILIK',data_kost.id_kost,data_kost.nama_kost,data_kost.alamat,data_kost.deskripsi,data_kost.foto,data_kost.status
                                                            FROM data_kost
                                                            INNER JOIN user_detail ON data_kost.id_user= user_detail.id_user;";
                                                            $result = mysqli_query($koneksi, $query);
                                                            $no = 1;
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $id = $row['id_kost'];
                                                                $Pemilik = $row['NAMA PEMILIK'];
                                                                $Nop = $row['NO HP PEMILIK'];
                                                                $Namakost = $row['nama_kost'];
                                                                $Alamat = $row['alamat'];
                                                                $Deskripsi = $row['deskripsi'];
                                                                $Img = $row['foto'];
                                                                $Status = $row['status'];
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><?= $Namakost; ?></td>
                                                                    <td><?= $Pemilik; ?></td>
                                                                    <td><?= $Alamat; ?></td>
                                                                    <td>22</td>
                                                                    <td><?= $Deskripsi; ?></td>
                                                                    <td><img src="img/<?= $Img; ?>" alt="" width="50px"></td>
                                                                    <td><?= $Status; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#validate<?= $id; ?>"><i class="fas fa-pen"></i></button>
                                                                    </td>

                                                                    <!-- Modal start -->
                                                                    <div class="modal fade" id="validate<?= $id; ?>" tabindex="-1" aria-labelledby="EditadminLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5" id="EditadminLabel">Edit Admin</h1>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form class="user" action="" method="POST">
                                                                                    <div class="modal-body">
                                                                                        <input type="hidden" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="txt_id" value="<?= $id; ?>">
                                                                                        <div class="form-group">
                                                                                            <select name="txt_status" id="" class="form-control form-control-user">
                                                                                                <option value="<?= $Status;  ?>"><?= $Status; ?></option>
                                                                                                <option value="">------</option>
                                                                                                <option value="APPROVED">APPROVED</option>
                                                                                                <option value="NOT APPROVED">NOT APPROVED</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button type="submit" name="update" class="btn btn-primary">Tambah</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Modal end -->
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
                        <!-- footer -->
                        <div class="container-fluid">
                            <div class="footer">
                                <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-header">
                                    <h5 class="modal-title">Validate Kost</h5>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end dashboard inner -->
                </div>
            </div>
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
            $(document).ready(function() {
                $('#datakost').DataTable();
            });
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>


<?php
if (isset($_POST['update'])) {
    $kostId     = $_POST['txt_id'];
    $Status    = $_POST['txt_status'];

    $query = "UPDATE data_kost SET status='$Status' WHERE id_kost='$kostId'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "data telah terupdate!";
    } else {
        $error =  "data gagal update";
    }
}

?>
<?php if (isset($success)) { ?>
    <script>
        swal({
            title: "<?= $success; ?>",
            icon: "success",
            button: "OKE!",
        });
    </script>
<?php } ?>
<?php if (isset($error)) { ?>
    <script>
        swal({
            title: "<?= $error; ?>",
            icon: "success",
            button: "OKE!",
        });
    </script>
<?php } ?>