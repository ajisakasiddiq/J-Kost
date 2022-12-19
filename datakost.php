<?php
require("koneksi.php");

session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
}

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
                                            <!-- table section -->
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div class="mb-2">
                                                        <h4>Data Kost</h4>
                                                        <div id="toolbar">
                                                            <button id="button" class="btn btn-primary">
                                                                <i class="fa-solid fa-plus"></i> <a href="tambah_kost.php" class="text-white">Tambah Kost</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <table id="kost" class="table table-borderless" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Gambar</th>
                                                                <th>Nama Kost</th>
                                                                <th>Deskripsi</th>
                                                                <th>Alamat</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = "SELECT * FROM data_kost WHERE id_user = '$sesID'";
                                                            $result = mysqli_query($koneksi, $query);
                                                            $no = 1;
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $idKost = $row['id_kost'];
                                                                $NameKost = $row['nama_kost'];
                                                                $Address = $row['alamat'];
                                                                $Dess = $row['deskripsi'];
                                                                $Img = $row['foto'];
                                                                $Maps = $row['maps'];
                                                                $Status = $row['status'];
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><img src="img/<?= $Img; ?>" alt="" width="50px"></td>
                                                                    <td><?= $NameKost; ?></td>
                                                                    <td><?= $Dess; ?></td>
                                                                    <td><?= $Address; ?></td>
                                                                    <td><?= $Status; ?></td>
                                                                    <td>
                                                                        <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#editKost<?= $idKost; ?>"><i class="fas fa-pen"></i></a>

                                                                        <a href="datakost.php?id_kost=<?php echo $row['id_kost']; ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                                                                    </td>


                                                                    <!-- edit kost -->
                                                                    <div class="modal fade" id="editKost<?= $idKost; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                                                                    <div class="modal-body">
                                                                                        <div class="img">
                                                                                            <img src="img/<?= $Img; ?>" alt="" width="100%" height="300px">
                                                                                        </div>
                                                                                        <input type="hidden" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="txt_id" value="<?= $idKost; ?>">
                                                                                        <div class="form-group">
                                                                                            <label for="img">Kost tampak depan</label>
                                                                                            <input id="img" type="file" class="form-control" name="gambar">
                                                                                            <input id="img" type="hidden" class="form-control" name="gambarLama" value="<?= $Img; ?>">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="inputName">Nama Kost</label>
                                                                                            <input value=" <?= $NameKost; ?>" type="text" class="form-control" id="inputName" name="txt_nama" placeholder="Nama kost anda!" required />
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="textAreaRemark">Deskripsi</label>
                                                                                            <textarea class="form-control" name="txt_deskripsi" id="textAreaRemark" rows="5" placeholder="Tell us you want more..."> <?= $Dess; ?></textarea>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail">Alamat</label>
                                                                                            <textarea class="form-control" rows="5" type="text" id="alamat" name="txt_alamat"> <?= $Address; ?></textarea>
                                                                                            <small class="form-text text-muted">Isi alamat selengkap mungkin!.</small>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        <button name="edit" type="submit" class="btn btn-primary">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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


                <div class="container-fluid">
                    <div class="footer">
                        <p>Copyright © 2022 Designed by A2.<br><br> Distributed By: Team ruweet</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kost').DataTable();
        });
    </script>
</body>

</html>


<?php
if (isset($_POST['edit'])) {
    $Id     = $_POST['txt_id'];
    $Alamat  = $_POST['txt_alamat'];
    $deskripsi  = $_POST['txt_deskripsi'];
    $Name   = $_POST['txt_nama'];
    $Address   = $_POST['txt_alamat'];
    $gambarLama   = $_POST['gambarLama'];
    if ($_FILES['gambar']['error'] === 4) {
        $Img = $gambarLama;
    } else {
        $Img = upload();
    }

    $query = "UPDATE data_kost SET nama_kost='$Name', alamat='$Alamat', deskripsi='$deskripsi',foto='$Img' WHERE id_kost='$Id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "User data telah terupdate!";
    } else {
        $error =  "User data gagal update";
    }
}

function upload()
{

    $file = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek file apakah diupload atau tidak
    // if ($error === 4) {
    //     echo "<script> 
    //     alert('Pilih gambar terlebih dahulu');
    //   </script>";
    //     return false;
    // }

    //cek apakah benar gambar
    $extensGambarValid = ['jpg', 'jpeg', 'png'];
    $extensGambar = explode('.', $file);
    $extensGambar = strtolower(end($extensGambar));
    if (!in_array($extensGambar, $extensGambarValid)) {
        echo "<script> 
      alert('Yang anda upload bukan berupa file gambar');
    </script>";
        return false;
    }

    //cek jika ukuran nya terlalu besar 
    if ($size > 1000000) {

        echo "<script> 
        alert('Ukuran gambar terlalu besar');
      </script>";
    }

    //generate nama gambar baru
    $namaFIlebaru = uniqid();
    $namaFIlebaru .= '.';
    $namaFIlebaru .= $extensGambar;



    //lolos cek 
    move_uploaded_file($tmpName, 'img/' . $namaFIlebaru);
    return $namaFIlebaru;
}




// hapus
$id = $_GET['id_kost'];
$query =  "DELETE FROM data_kost WHERE id_kost='$id'";
mysqli_query($koneksi, $query);
unlink($Img);
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