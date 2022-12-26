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
if ($_SESSION['level'] != "3") {
    header('Location: dashboard.php');
}

// view data pemilik
$API_url = 'http://localhost:8080/jkos/api/api.php?function=get_pemilik';
$json_data = file_get_contents($API_url);
$response_data = json_decode($json_data);
$user_data = $response_data->data;
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
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
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
                                    <h2>User</h2>
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
                                                    <h2>Pemilik</h2>
                                                </div>
                                            </div>
                                            <div class="table_section padding_infor_info">

                                                <table id="pemilik" class="table table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Username</th>
                                                            <th>NIK</th>
                                                            <th>Alamat</th>
                                                            <th>No hp</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Foto</th>
                                                            <th>Bukti Kontrak</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($user_data as $user) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= $user->user_nama; ?></td>
                                                                <td><?= $user->user_email; ?></td>
                                                                <td><?= $user->username; ?></td>
                                                                <td><?= $user->nik; ?></td>
                                                                <td><?= $user->alamat; ?></td>
                                                                <td><?= $user->no_hp; ?></td>
                                                                <td><?= $user->jenis_kelamin; ?></td>
                                                                <td><img src="img/<?= $user->foto;  ?>" alt="" width="50px"></td>
                                                                <td><?= $user->bukti_kontrak; ?></td>
                                                                <td><?= $user->status_user; ?></td>
                                                                <td>
                                                                    <a href="" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#edit<?= $user->id_user; ?>"><i class="fas fa-pen"></i></a>
                                                                    <a href="view?id_user=<?= $user->id_user; ?>" class="btn btn-warning m-1""><i class=" fa-solid fa-eye"></i></a>

                                                                    <a href="table_pemilik.php?id_user=<?= $user->id_user ?>" name="hapus" class="btn btn-danger btn-circle m-1" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="edit<?= $user->id_user; ?>" tabindex="-1" aria-labelledby="EditadminLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="EditadminLabel">Edit Admin</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form class="user" action="" method="POST">
                                                                            <div class="modal-body">
                                                                                <input type="hidden" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="txt_id" value="<?= $user->id_user; ?>">
                                                                                <div class="form-group">
                                                                                    <label for="name">Nama</label>
                                                                                    <input type="text" class="form-control form-control-user" id="name" placeholder="Name" name="txt_nama" value="<?= $user->user_nama; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">Email</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="txt_email" value="<?= $user->user_email; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">UserName</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username" name="txt_username" value="<?= $user->username; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">NIK</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="NIK" name="txt_nik" value="<?= $user->nik; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">Alamat</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Alamat" name="txt_alamat" value="<?= $user->alamat; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">No handphone</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="No.Handphone" name="txt_nohp" value="<?= $user->no_hp; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">Jenis Kelamin</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Jenis Kelamin" name="txt_jk" value="<?= $user->jenis_kelamin; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">Bukti Kontrak</label>
                                                                                    <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Bukti kontrak" name="txt_bukti" value="<?= $user->bukti_kontrak; ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="name">Status</label>
                                                                                    <select name="txt_status" id="" class="form-control form-control-user">
                                                                                        <option value="<?= $user->status_user;  ?>"><?= $user->status_user;  ?></option>
                                                                                        <option value="">------</option>
                                                                                        <option value="VERIFIED">VERIFIED</option>
                                                                                        <option value="NOT VERIFIED">NOT VERIFIED</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" name="update" class="btn btn-primary">Edit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $no++; ?>
                                                        <?php endforeach ?>

                                                        <!-- end model popup -->
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
            $('#pemilik').DataTable({
                scrollX: true,
            })
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//include library phpmailer
include("PHPMailer-master/src/Exception.php");
include("PHPMailer-master/src/PHPMailer.php");
include("PHPMailer-master/src/SMTP.php");
if (isset($_POST['update'])) {
    $Id     = $_POST['txt_id'];
    $email     = $_POST['txt_email'];
    $Status    = $_POST['txt_status'];

    $query = "UPDATE user_detail SET status_user='$Status' WHERE id_user='$Id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "data telah terupdate!";
        if ($user->status_user == 'VERIFIED') {
            $email_pengirim = 'jemberkost@gmail.com';
            $nama_pengirim = 'PT. JKost';
            $email_penerima = $email;
            $subject = 'Registrasi Kost PT. JKost';
            $pesan = 'Selamat akun anda telah ter veirifikasi,silahkan Daftarkan data kost anda untuk tahap yang selanjutnya,terima kasih!';
            $mail = new PHPMailer;
            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';
            $mail->Username = $email_pengirim;
            $mail->Password = 'nilzjaqzhtyrsywa';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPDebug = 2;

            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($email_penerima);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $pesan;

            $send = $mail->send();
            if ($send) {
                echo "<script>alert('Notifikasi telah dikirim dikirim')</script>";
            } else {
                echo "<script>alert('Notifikasi gagal dikirim dikirim')</script>";
            } # code...
        } else {
            $email_pengirim = 'jemberkost@gmail.com';
            $nama_pengirim = 'PT. JKost';
            $email_penerima = $email;
            $subject = 'Registrasi Kost PT. JKost';
            $pesan = 'Mohon maaf akun anda belom kami verifikasi,periksa kembali data anda dan lakukan verifikasi kembali,terima kasih!';
            $mail = new PHPMailer;
            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';
            $mail->Username = $email_pengirim;
            $mail->Password = 'nilzjaqzhtyrsywa';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPDebug = 2;

            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($email_penerima);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $pesan;

            $send = $mail->send();
            if ($send) {
                echo "<script>alert('Notifikasi telah dikirim dikirim')</script>";
            } else {
                echo "<script>alert('Notifikasi gagal dikirim dikirim')</script>";
            }
        }
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

<?php
$id = $_GET['id_user'];
$query =  "DELETE FROM user_detail WHERE id_user='$id'";
mysqli_query($koneksi, $query);
?>