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
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <!-- <link rel="stylesheet" href="css/colors.css" /> -->
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- calendar file css -->
    <!-- <link rel="stylesheet" href="js/semantic.min.css" /> -->
    <!-- fancy box js -->
    <link rel="stylesheet" href="css/jquery.fancybox.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
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
                                    <h2>Transaksi</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->

                        <!-- admin start -->
                        <?php if ($sesLvl == 1) { ?>
                            <!-- admin start -->
                            <div class="row column1">
                                <div class="col-lg-12">
                                    <div class="white_shd full margin_bottom_30">
                                        <div class="full graph_head">
                                            <div class="table_section padding_infor_info">
                                                <!-- table section -->
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div class="mb-2">
                                                            <h4>Transaksi</h4>

                                                        </div>
                                                        <table id="trans" class="table table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Pemesanan</th>
                                                                    <th>Nama Kost</th>
                                                                    <th>No.kamar</th>
                                                                    <th>Nama Penyewa</th>
                                                                    <th>Durasi Sewa</th>
                                                                    <th>Tanggal Pemesanan</th>
                                                                    <th>Total Harga</th>
                                                                    <th>Status Pembayaran</th>
                                                                    <th>Bukti Pembayaran</th>
                                                                    <th>action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <?php
                                                                    $query = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
                                                                    ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_pembayaran as 'Status Pembayaran'
                                                                    , pemesanan.bukti_pembayaran as 'Bukti Pembayaran' FROM pemesanan 
                                                                    INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
                                                                    INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
                                                                    INNER JOIN user_detail ON  user_detail.id_user = data_kost.id_user
                                                                    WHERE user_detail.id_user = '$sesID'";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    $no = 1;
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        $idPesan = $row['id_pemesanan'];
                                                                        $kode = $row['Kode Pemesanan'];
                                                                        $namaKost = $row['Nama Kost'];
                                                                        $No = $row['No Kamar'];
                                                                        $NamaPenyewa = $row['Nama Penyewa'];
                                                                        $durasi = $row['Durasi Sewa'];
                                                                        $tgl = $row['Tanggal Pemesanan'];
                                                                        $total = $row['Total'];
                                                                        $status = $row['Status Pembayaran'];
                                                                        $bukti = $row['Bukti Pembayaran'];
                                                                    ?>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $kode; ?></td>
                                                                        <td><?= $namaKost; ?></td>
                                                                        <td><?= $No; ?></td>
                                                                        <td><?= $NamaPenyewa; ?></td>
                                                                        <td><?= $durasi; ?></td>
                                                                        <td><?= $tgl; ?></td>
                                                                        <td>Rp.<?= $total; ?></td>
                                                                        <td><?= $status; ?></td>
                                                                        <td><img src="img/<?= $bukti; ?>" alt="" width="50px"></td>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#cek<?= $idPesan; ?>"><i class="fa-solid mr-1 fa-check"></i>Check</a>
                                                                            <a href="" class="btn btn-warning btn-circle mt-2"><i class="fa-solid mr-1 fa-print"></i>Cetak</a>
                                                                        </td>
                                                                        <?= $no++; ?>
                                                                    <?php } ?>
                                                                </tr>
                                                                <!-- pembayaran pemilik start -->
                                                                <div class="modal fade" id="cek<?= $idPesan; ?>" tabindex="-1" aria-labelledby="EditadminLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-md">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="EditadminLabel">Bukti Pembayaran</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <form class="user" action="" method="POST">
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="txt_id" value="<?= $idPesan; ?>">
                                                                                    <div class="form-group">
                                                                                        <label for="kode">Bukti Pembayaran</label> <br>
                                                                                        <img src="img/<?= $bukti; ?>" alt="" width="90px" height="120px">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="kode">Kode Pemesanan</label>
                                                                                        <input type="disabled" class="form-control form-control-user " id="kode" placeholder="Name" name="txt_kode" value="<?= $kode; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="namaKost">Nama Kost</label>
                                                                                        <input type="text" class="form-control form-control-user" id="namaKost" placeholder="Email Address" name="txt_Namakost" value="<?= $namaKost; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username" name="txt_Namapenyewa" value="<?= $NamaPenyewa; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="NIK" name="txt_durasi" value="<?= $durasi; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Alamat" name="txt_tgl" value="<?= $tgl; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" placeholder="Jenis Kelamin" name="txt_jk" value="<?= $total; ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="status">Status pembayaran</label>
                                                                                        <select name="txt_status" id="status" class="form-control form-control-user">
                                                                                            <option value="<?= $status;  ?>"><?= $status; ?></option>
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
                                                                <!-- modal pembayaran pemilik end -->
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
                        <?php } else if ($sesLvl == 2) { ?>
                            <!-- admin start -->
                            <div class="row column1">
                                <div class="col-lg-12">
                                    <div class="white_shd full margin_bottom_30">
                                        <div class="full graph_head">
                                            <div class="table_section padding_infor_info">
                                                <!-- table section -->
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div class="mb-2">
                                                            <h4>Transaksi</h4>

                                                        </div>
                                                        <table id="trans" class="table table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Pemesanan</th>
                                                                    <th>Nama Kost</th>
                                                                    <th>No.kamar</th>
                                                                    <th>Nama Penyewa</th>
                                                                    <th>Durasi Sewa</th>
                                                                    <th>Tanggal Pemesanan</th>
                                                                    <th>Total Harga</th>
                                                                    <th>Status Pembayaran</th>
                                                                    <th>Bukti Pembayaran</th>
                                                                    <th>action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <?php
                                                                    $query = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
                                                                    ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_pembayaran as 'Status Pembayaran'
                                                                    , pemesanan.bukti_pembayaran as 'Bukti Pembayaran' FROM pemesanan 
                                                                    INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
                                                                    INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
                                                                    INNER JOIN user_detail ON  user_detail.id_user = data_kost.id_user
                                                                    WHERE user_detail.id_user = '$sesID'";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    $no = 1;
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        $kode = $row['Kode Pemesanan'];
                                                                        $namaKost = $row['Nama Kost'];
                                                                        $No = $row['No Kamar'];
                                                                        $NamaPenyewa = $row['Nama Penyewa'];
                                                                        $durasi = $row['Durasi Sewa'];
                                                                        $tgl = $row['Tanggal Pemesanan'];
                                                                        $total = $row['Total'];
                                                                        $status = $row['Status Pembayaran'];
                                                                        $bukti = $row['Bukti Pembayaran'];
                                                                    ?>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $kode; ?></td>
                                                                        <td><?= $namaKost; ?></td>
                                                                        <td><?= $No; ?></td>
                                                                        <td><?= $NamaPenyewa; ?></td>
                                                                        <td><?= $durasi; ?></td>
                                                                        <td><?= $tgl; ?></td>
                                                                        <td>Rp.<?= $total; ?></td>
                                                                        <td><?= $status; ?></td>
                                                                        <td><img src="img/<?= $bukti; ?>" alt="" width="50px"></td>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#bayar"><i class="fa-sharp fa-solid mr-1 fa-money-bill"></i>Bayar</a>
                                                                            <a href="" class="btn btn-warning btn-circle mt-2"><i class="fa-solid mr-1 fa-print"></i>Cetak</a>
                                                                        </td>
                                                                        <?= $no++; ?>
                                                                    <?php } ?>
                                                                </tr>
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
                        <?php } else { ?>


                            <div class="row column1">
                                <div class="col-lg-12">
                                    <div class="white_shd full margin_bottom_30">
                                        <div class="full graph_head">
                                            <div class="table_section padding_infor_info">
                                                <!-- table section -->
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div class="mb-2">
                                                            <h4>Transaksi</h4>

                                                        </div>
                                                        <table id="trans" class="table table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Pemesanan</th>
                                                                    <th>Nama Kost</th>
                                                                    <th>No.kamar</th>
                                                                    <th>Nama Penyewa</th>
                                                                    <th>Durasi Sewa</th>
                                                                    <th>Tanggal Pemesanan</th>
                                                                    <th>Total Harga</th>
                                                                    <th>Status Pembayaran</th>
                                                                    <th>Bukti Pembayaran</th>
                                                                    <th>action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <?php
                                                                    $query = "SELECT pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
                                                            ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_pembayaran as 'Status Pembayaran'
                                                            , pemesanan.bukti_pembayaran as 'Bukti Pembayaran' 
                                                            FROM pemesanan
                                                            INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar
                                                            INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    $no = 1;
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        $kode = $row['Kode Pemesanan'];
                                                                        $namaKost = $row['Nama Kost'];
                                                                        $No = $row['No Kamar'];
                                                                        $NamaPenyewa = $row['Nama Penyewa'];
                                                                        $durasi = $row['Durasi Sewa'];
                                                                        $tgl = $row['Tanggal Pemesanan'];
                                                                        $total = $row['Total'];
                                                                        $status = $row['Status Pembayaran'];
                                                                        $bukti = $row['Bukti Pembayaran'];
                                                                    ?>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $kode; ?></td>
                                                                        <td><?= $namaKost; ?></td>
                                                                        <td><?= $No; ?></td>
                                                                        <td><?= $NamaPenyewa; ?></td>
                                                                        <td><?= $durasi; ?></td>
                                                                        <td><?= $tgl; ?></td>
                                                                        <td>Rp.<?= $total; ?></td>
                                                                        <td><?= $status; ?></td>
                                                                        <td><img src="img/<?= $bukti; ?>" alt="" width="50px"></td>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#detail"><i class="fa-solid fa-circle-info mr-1"></i>Detail</a>
                                                                            <a href="" class="btn btn-warning mt-2 btn-circle"><i class="fa-solid fa-print"></i>Cetak</a>
                                                                        </td>
                                                                        <?= $no++; ?>
                                                                    <?php } ?>
                                                                </tr>
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
                        <?php } ?>
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
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#trans').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>

</html>