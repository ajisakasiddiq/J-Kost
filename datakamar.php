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
                                    <h2>Data Kamar</h2>
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
                                                        <h4>Data Kamar</h4>
                                                        <div id="toolbar">
                                                            <button id="button" class="btn btn-primary">
                                                                <i class="fa-solid fa-plus"></i> <a href="tambah_kamar.php" class="text-white">Tambah Kamar</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <table id="kamar" class="table table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Foto depan kamar</th>
                                                                <th>Foto dalam kamar</th>
                                                                <th>Foto kamar mandi</th>
                                                                <th>Foto dapur</th>
                                                                <th>Nama Kost</th>
                                                                <th>No. Kamar</th>
                                                                <th>Jenis Kamar</th>
                                                                <th>Deskripsi</th>
                                                                <th>Harga</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = "SELECT kamar_kost.id_kamar,kamar_kost.foto_kamar_pertama,kamar_kost.foto_kamar_kedua,kamar_kost.foto_kamar_ketiga,kamar_kost.foto_kamar_keempat , data_kost.nama_kost,kamar_kost.jenis_kamar,kamar_kost.no_kamar,kamar_kost.deskripsi,kamar_kost.status_kamar,kamar_kost.harga
                                                                FROM kamar_kost
                                                                INNER JOIN data_kost ON data_kost.id_kost=kamar_kost.id_kost
                                                                WHERE data_kost.id_user='$sesID'";
                                                            $result = mysqli_query($koneksi, $query);
                                                            $no = 1;
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $id = $row['id_kamar'];
                                                                $img = $row['foto_kamar_pertama'];
                                                                $img1 = $row['foto_kamar_kedua'];
                                                                $img2 = $row['foto_kamar_ketiga'];
                                                                $img3 = $row['foto_kamar_keempat'];
                                                                $Name = $row['nama_kost'];
                                                                $Jenis = $row['jenis_kamar'];
                                                                $No = $row['no_kamar'];
                                                                $Dess = $row['deskripsi'];
                                                                $status = $row['status_kamar'];
                                                                $harga = $row['harga'];
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><img src="img/<?= $img; ?>" alt="" width="80px"></td>
                                                                    <td><img src="img/<?= $img1; ?>" alt="" width="80px"></td>
                                                                    <td><img src="img/<?= $img2; ?>" alt="" width="80px"></td>
                                                                    <td><img src="img/<?= $img3; ?>" alt="" width="80px"></td>
                                                                    <td><?= $Name; ?></td>
                                                                    <td><?= $No; ?></td>
                                                                    <td><?= $Jenis; ?></td>
                                                                    <td><?= $Dess; ?></td>
                                                                    <td><?= $harga; ?></td>
                                                                    <?php if ($status == 0) { ?>
                                                                        <td>Tersedia</td>
                                                                    <?php  } else if ($status == 1) { ?>
                                                                        <td>BOOKING</td>
                                                                    <?php } else { ?>
                                                                        <td>Berpenghuni</td>
                                                                    <?php } ?>
                                                                    <td>
                                                                        <a href="" class="btn btn-primary btn-circle m-1" data-bs-toggle="modal" data-bs-target="#editKamar<?= $id; ?>"><i class="fas fa-pen"></i></a>

                                                                        <a href="datakamar.php?id_kamar=<?= $row['id_kamar']; ?>" class="btn btn-danger btn-circle m-1" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                                                                    </td>

                                                                    <!-- edit kamar -->
                                                                    <div class="modal fade" id="editKamar<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="txt_id" value="<?= $id; ?>">
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-4">
                                                                                                    <img src="img/<?= $img; ?>" alt="" width="150px" style="max-height:100px;">
                                                                                                </div>
                                                                                                <div class="col-6">
                                                                                                    <label for="img">Foto Depan Kamar kost</label>
                                                                                                    <input id="img" type="file" class="form-control" name="gambar">
                                                                                                </div>
                                                                                            </div>

                                                                                            <input id="img" type="hidden" class="form-control" name="gambarLama" value="<?= $img; ?>">
                                                                                            <input id="img" type="hidden" class="form-control" name="gambarLama1" value="<?= $img1; ?>">
                                                                                            <input id="img" type="hidden" class="form-control" name="gambarLama2" value="<?= $img2; ?>">
                                                                                            <input id="img" type="hidden" class="form-control" name="gambarLama3" value="<?= $img3; ?>">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-4">
                                                                                                    <img src="img/<?= $img1; ?>" alt="" width="150px" style="max-height:100px;">
                                                                                                </div>
                                                                                                <div class="col-6">
                                                                                                    <label for="img">Foto Dalam kamar kost</label>
                                                                                                    <input id="img" type="file" class="form-control" name="gambarDalam">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-4">
                                                                                                    <img src="img/<?= $img2; ?>" alt="" width="150px" style="max-height:100px;">
                                                                                                </div>
                                                                                                <div class="col-6">
                                                                                                    <label for="img">Foto kamar mandi kost</label>
                                                                                                    <input id="img" type="file" class="form-control" name="gambarMandi">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-4">
                                                                                                    <img src="img/<?= $img3; ?>" alt="" width="150px" style="max-height:100px;">
                                                                                                </div>
                                                                                                <div class="col-6">
                                                                                                    <label for="img">Foto dapur kost</label>
                                                                                                    <input id="img" type="file" class="form-control" name="gambarDapur">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="inputName">No kamar</label>
                                                                                            <input value=" <?= $No; ?>" type="text" class="form-control" id="inputName" name="txt_no" placeholder="Nama kost anda!" required />
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="inputName">Jenis Kamar</label>
                                                                                            <select name="txt_jenis" id="" class="form-control form-control-user" required>
                                                                                                <option value="<?= $Jenis; ?>"><?= $Jenis; ?></option>
                                                                                                <option value="">----</option>
                                                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                                                <option value="Perempuan">Perempuan</option>
                                                                                                <option value="Campur">Campur</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="inputName">Harga</label>
                                                                                            <input value=" <?= $harga; ?>" type="text" class="form-control" id="inputName" name="txt_harga" placeholder="Nama kost anda!" required />
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="textAreaRemark">Deskripsi</label>
                                                                                            <textarea class="form-control" name="txt_deskripsi" id="textAreaRemark" rows="5" placeholder="Tell us you want more..."> <?= $Dess; ?></textarea>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="inputName">Status Kamar</label>
                                                                                            <select name="txt_status" id="" class="form-control form-control-user" required>
                                                                                                <option value="<?= $status; ?>">
                                                                                                    <?php if ($status == 0) { ?>
                                                                                                        <p>Tersedia</p>
                                                                                                    <?php  } else if ($status == 1) { ?>
                                                                                                        <p>Booking</p>
                                                                                                    <?php } else { ?>
                                                                                                        <p>Berpenghuni</p>
                                                                                                    <?php } ?>
                                                                                                </option>
                                                                                                <option value="">----</option>
                                                                                                <option value="0">Tersedia</option>
                                                                                                <option value="2">Berpenghuni</option>
                                                                                            </select>
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
                                                            <?php  } ?>
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
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end model popup -->
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
            $('#kamar').DataTable();
        });
    </script>
</body>


<?php
if (isset($_POST['edit'])) {
    $Id     = $_POST['txt_id'];
    $jenis  = $_POST['txt_jenis'];
    $deskripsi  = $_POST['txt_deskripsi'];
    $Nokamar   = $_POST['txt_no'];
    $Status  = $_POST['txt_status'];
    $Harga  = $_POST['txt_harga'];
    $gambarLama   = $_POST['gambarLama'];
    $gambarLama1   = $_POST['gambarLama1'];
    $gambarLama2  = $_POST['gambarLama2'];
    $gambarLama3   = $_POST['gambarLama3'];
    if ($_FILES['gambar']['error'] === 4) {
        $Img = $gambarLama;
    } else {
        $Img = upload();
    }

    if ($_FILES['gambarDalam']['error'] === 4) {
        $ImgDalam = $gambarLama1;
    } else {
        $ImgDalam = uploadDalam();
    }

    if ($_FILES['gambarMandi']['error'] === 4) {
        $ImgMandi = $gambarLama2;
    } else {
        $ImgMandi = uploadMandi();
    }

    if ($_FILES['gambarDapur']['error'] === 4) {
        $ImgDapur = $gambarLama3;
    } else {
        $ImgDapur = uploadDapur();
    }

    $query = "UPDATE kamar_kost SET jenis_kamar='$jenis', no_kamar='$Nokamar', harga='$Harga',status_kamar='$Status',foto_kamar_pertama='$Img',foto_kamar_kedua='$ImgDalam',foto_kamar_ketiga='$ImgMandi',foto_kamar_keempat='$ImgDapur',deskripsi='$deskripsi' WHERE id_kamar='$Id'";
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
function uploadDalam()
{
    $fileDalam = $_FILES['gambarDalam']['name'];
    $size = $_FILES['gambarDalam']['size'];
    $error = $_FILES['gambarDalam']['error'];
    $tmpName = $_FILES['gambarDalam']['tmp_name'];
    //cek file apakah diupload atau tidak
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
        return false;
    }
    //cek apakah benar gambar
    $extensGambarValid = ['jpg', 'jpeg', 'png'];
    $extensGambar = explode('.', $fileDalam);
    $extensGambar = strtolower(end($extensGambar));
    if (!in_array($extensGambar, $extensGambarValid)) {
        echo "<script>alert('Yang anda upload bukan berupa file gambar');</script>";
        return false;
    }
    //cek jika ukuran nya terlalu besar 
    if ($size > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
    }
    //generate nama gambar baru
    $namaFIlebaruDalam = uniqid();
    $namaFIlebaruDalam .= '.';
    $namaFIlebaruDalam .= $extensGambar;
    //lolos cek 
    move_uploaded_file($tmpName, 'img/' . $namaFIlebaruDalam);
    return $namaFIlebaruDalam;
}
function uploadMandi()
{
    $fileMandi = $_FILES['gambarMandi']['name'];
    $size = $_FILES['gambarMandi']['size'];
    $error = $_FILES['gambarMandi']['error'];
    $tmpName = $_FILES['gambarMandi']['tmp_name'];
    //cek file apakah diupload atau tidak
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
        return false;
    }
    //cek apakah benar gambar
    $extensGambarValid = ['jpg', 'jpeg', 'png'];
    $extensGambar = explode('.', $fileMandi);
    $extensGambar = strtolower(end($extensGambar));
    if (!in_array($extensGambar, $extensGambarValid)) {
        echo "<script>alert('Yang anda upload bukan berupa file gambar');</script>";
        return false;
    }
    //cek jika ukuran nya terlalu besar 
    if ($size > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
    }
    //generate nama gambar baru
    $namaFIlebaruMandi = uniqid();
    $namaFIlebaruMandi .= '.';
    $namaFIlebaruMandi .= $extensGambar;
    //lolos cek 
    move_uploaded_file($tmpName, 'img/' . $namaFIlebaruMandi);
    return $namaFIlebaruMandi;
}
function uploadDapur()
{
    $fileDapur = $_FILES['gambarDapur']['name'];
    $size = $_FILES['gambarDapur']['size'];
    $error = $_FILES['gambarDapur']['error'];
    $tmpName = $_FILES['gambarDapur']['tmp_name'];
    //cek file apakah diupload atau tidak
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu');</script>";
        return false;
    }
    //cek apakah benar gambar
    $extensGambarValid = ['jpg', 'jpeg', 'png'];
    $extensGambar = explode('.', $fileDapur);
    $extensGambar = strtolower(end($extensGambar));
    if (!in_array($extensGambar, $extensGambarValid)) {
        echo "<script>alert('Yang anda upload bukan berupa file gambar');</script>";
        return false;
    }
    //cek jika ukuran nya terlalu besar 
    if ($size > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
    }
    //generate nama gambar baru
    $namaFIlebaruDapur = uniqid();
    $namaFIlebaruDapur .= '.';
    $namaFIlebaruDapur .= $extensGambar;
    //lolos cek 
    move_uploaded_file($tmpName, 'img/' . $namaFIlebaruDapur);
    return $namaFIlebaruDapur;
}



// hapus
$id = $_GET['id_kamar'];
$query =  "DELETE FROM kamar_kost WHERE id_kamar='$id'";
mysqli_query($koneksi, $query);
?>

</html>