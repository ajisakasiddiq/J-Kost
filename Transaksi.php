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
    <link rel="stylesheet" href="css/jquery.fancybox.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                                                                <th>No Hp Penyewa</th>
                                                                <th>Durasi Sewa</th>
                                                                <th>Tanggal Mulai Ngekos</th>
                                                                <th>Total Harga</th>
                                                                <th>Status</th>
                                                                <th>Bukti Pembayaran</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <?php if ($sesLvl == 1) { ?>
                                                            <tbody>
                                                                <?php
                                                                $query = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
                                                                    ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa AS 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_penyewaan as 'Status Pembayaran'
                                                                    , pemesanan.bukti_pembayaran as 'Bukti Pembayaran' , user_detail.no_hp FROM pemesanan 
                                                                    INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
                                                                    INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
                                                                    INNER JOIN user_detail ON  user_detail.id_user = pemesanan.id_user
                                                                    WHERE data_kost.id_user = '$sesID'";
                                                                $result = mysqli_query($koneksi, $query);
                                                                $no = 1;
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $idPesan = $row['id_pemesanan'];
                                                                    $kode = $row['Kode Pemesanan'];
                                                                    $namaKost = $row['Nama Kost'];
                                                                    $No = $row['No Kamar'];
                                                                    $NamaPenyewa = $row['Nama Penyewa'];
                                                                    $durasi = $row['Durasi Sewa'];
                                                                    $No_hp = $row['no_hp'];
                                                                    $tgl = $row['Tanggal Pemesanan'];
                                                                    $total = $row['Total'];
                                                                    $status = $row['Status Pembayaran'];
                                                                    $bukti = $row['Bukti Pembayaran'];
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $kode; ?></td>
                                                                        <td><?= $namaKost; ?></td>
                                                                        <td><?= $No; ?></td>
                                                                        <td><?= $NamaPenyewa; ?></td>
                                                                        <td><?= $No_hp; ?></td>
                                                                        <td><?= $durasi; ?></td>
                                                                        <td><?= $tgl; ?></td>
                                                                        <td>Rp.<?= number_format($total); ?></td>
                                                                        <td><?= $status; ?></td>
                                                                        <?php if ($bukti == 'Menunggu Pembayaran') { ?>
                                                                            <td><?= $bukti; ?></td>
                                                                        <?php  } else { ?>
                                                                            <td><img src="file/<?= $bukti; ?>" alt="" width="100px"></td>
                                                                        <?php     } ?>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#cek<?= $idPesan; ?>"><i class="fa-solid mr-1 fa-check"></i>Check</a>
                                                                            <a href="print.php?id_pemesanan=<?= $idPesan; ?>" class="btn btn-warning btn-circle mt-2"><i class="fa-solid mr-1 fa-print"></i>Cetak</a>
                                                                        </td>
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
                                                                                            <div class="form-group text-center">
                                                                                                <label for="kode">Bukti Pembayaran</label> <br>
                                                                                                <img src="img/<?= $bukti; ?>" alt="" width="90px" height="120px">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="kode">Kode Pemesanan</label>
                                                                                                <input type="disabled" class="form-control form-control-user " id="kode" placeholder="Kode Transaksi" name="txt_kode" value="<?= $kode; ?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="namaKost">Nama Kost</label>
                                                                                                <input type="text" class="form-control form-control-user" id="namaKost" placeholder="Nama Kost" name="txt_Namakost" value="<?= $namaKost; ?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="penyewa">Nama Penyewa</label>
                                                                                                <input type="text" class="form-control form-control-user" id="penyewa" placeholder="Nama Penyewa" name="txt_Namapenyewa" value="<?= $NamaPenyewa; ?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="lama">Lama Sewa</label>
                                                                                                <input type="text" class="form-control form-control-user" id="lama" placeholder="Lama sewa" name="txt_durasi" value="<?= $durasi; ?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="bayar">Tanggal Pembayaran</label>
                                                                                                <input type="text" class="form-control form-control-user" id="bayar" placeholder="Tanggal Pembayaran" name="txt_tgl" value="<?= $tgl; ?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="total">Total Pembayaran</label>
                                                                                                <input type="text" class="form-control form-control-user" id="total" placeholder="Total Pembayaran" name="txt_jk" value="<?= $total; ?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="status">Status pembayaran</label>
                                                                                                <select name="txt_status" id="status" class="form-control form-control-user">
                                                                                                    <option value="<?= $status;  ?>"><?= $status; ?></option>
                                                                                                    <option value="">------</option>
                                                                                                    <option value="SUKSES">Sukses</option>
                                                                                                    <option value="DITOLAK">Di Tolak</option>
                                                                                                </select>
                                                                                                <small>Periksa terlebih dahulu bukti pembayaran sebelum approve pembayaran*</small>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <button type="submit" name="edit" class="btn btn-primary">Tambah</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                    <?php $no++; ?>
                                                                <?php } ?>
                                                                <!-- pembayaran pemilik start -->

                                                                <!-- modal pembayaran pemilik end -->
                                                            </tbody>
                                                        <?php    } else if ($sesLvl == 2) { ?>
                                                            <tbody>

                                                                <?php
                                                                $queryPenyewa = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
                                                                ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_penyewaan as 'Status Pembayaran'
                                                                , pemesanan.bukti_pembayaran as 'Bukti Pembayaran',user_detail.no_hp ,rekening.Nama_bank,rekening.Nama_rek,rekening.no_rek
                                                                FROM pemesanan 
                                                                INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
                                                                INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
                                                                INNER JOIN user_detail ON  user_detail.id_user = data_kost.id_user
                                                                INNER JOIN rekening ON  rekening.id_rek = pemesanan.id_rek
                                                                    WHERE pemesanan.id_user = '$sesID'";
                                                                $hasil = mysqli_query($koneksi, $queryPenyewa);
                                                                $no = 1;
                                                                while ($row = mysqli_fetch_array($hasil)) {
                                                                    $idPesan = $row['id_pemesanan'];
                                                                    $kode = $row['Kode Pemesanan'];
                                                                    $namaKost = $row['Nama Kost'];
                                                                    $No = $row['No Kamar'];
                                                                    $NamaPenyewa = $row['Nama Penyewa'];
                                                                    $No_hp = $row['no_hp'];
                                                                    $durasi = $row['Durasi Sewa'];
                                                                    $tgl = $row['Tanggal Pemesanan'];
                                                                    $total = $row['Total'];
                                                                    $status = $row['Status Pembayaran'];
                                                                    $bukti = $row['Bukti Pembayaran'];
                                                                    $Norek = $row['no_rek'];
                                                                    $Namarek = $row['Nama_rek'];
                                                                    $Namabank = $row['Nama_bank'];
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $kode; ?></td>
                                                                        <td><?= $namaKost; ?></td>
                                                                        <td><?= $No; ?></td>
                                                                        <td><?= $NamaPenyewa; ?></td>
                                                                        <td><?= $No_hp; ?></td>
                                                                        <td><?= $durasi; ?></td>
                                                                        <td><?= $tgl; ?></td>
                                                                        <td>Rp.<?= number_format($total); ?></td>
                                                                        <td><?= $status; ?></td>
                                                                        <?php if ($bukti == 'Menunggu Pembayaran') { ?>
                                                                            <td><?= $bukti; ?></td>
                                                                        <?php  } else { ?>
                                                                            <td><img src="file/<?= $bukti; ?>" alt="" width="100px"></td>
                                                                        <?php     } ?>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#bayar<?= $idPesan; ?>"><i class="fa-sharp fa-solid mr-1 fa-money-bill"></i>Bayar</a>
                                                                            <a href="print.php?id_pemesanan=<?= $idPesan; ?>" class="btn btn-warning btn-circle mt-2"><i class="fa-solid mr-1 fa-print"></i>Cetak</a>
                                                                            <a type="submit" name="batal" data-bs-toggle="modal" data-bs-target="#batal<?= $idPesan; ?>" class="btn btn-danger btn-circle mt-2"><i class="fa-solid fa-ban mr-1"></i>Batalkan Sewa</a>
                                                                        </td>
                                                                        <!-- modal bayar -->
                                                                        <div class="modal fade" id="bayar<?= $idPesan; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>

                                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                                        <div class="modal-body">
                                                                                            <input type="hidden" value="<?= $idPesan; ?>" name="txt_id">
                                                                                            <div class="form-group">
                                                                                                <label for="bank">Nama Bank</label>
                                                                                                <h5><?= $Namabank; ?></h5>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="NamaPemilik">Atas Nama</label>
                                                                                                <h5><?= $Namarek; ?></h5>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="NamaPemilik">No Rekening</label>
                                                                                                <h5><?= $Norek; ?></h5>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="bukti">Bukti Pembayaran</label>
                                                                                                <input type="file" id="bukti" class="form-control form-control-user" name="gambar">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <button name="tambah" type="submit" class="btn btn-primary">Simpan</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- modal batal pemesanan -->
                                                                        <div class="modal fade" id="batal<?= $idPesan; ?>" tabindex="-1" aria-labelledby="EditadminLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-md">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="EditadminLabel">Pembatalan Sewa</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form class="user" action="" method="POST">
                                                                                        <div class="modal-body">
                                                                                            <input type="hidden" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="txt_id" value="<?= $idPesan; ?>">

                                                                                            <p>ANDA YAKIN INGIN MEMBATALKAN SEWA?</p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <button type="submit" name="batal" class="btn btn-danger">Batalkan</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                    <?php $no++; ?>
                                                                <?php } ?>

                                                            </tbody>
                                                        <?php } else { ?>
                                                            <tbody>

                                                                <?php
                                                                $no = 1;
                                                                $query = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
                                                                    ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_penyewaan as 'Status Pembayaran'
                                                                    , pemesanan.bukti_pembayaran as 'Bukti Pembayaran', user_detail.no_hp FROM pemesanan 
                                                                    INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
                                                                    INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
                                                                    INNER JOIN user_detail ON  user_detail.id_user = pemesanan.id_user
                                                                    ";
                                                                $result = mysqli_query($koneksi, $query);
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $idPesan = $row['id_pemesanan'];
                                                                    $kode = $row['Kode Pemesanan'];
                                                                    $namaKost = $row['Nama Kost'];
                                                                    $No = $row['No Kamar'];
                                                                    $NamaPenyewa = $row['Nama Penyewa'];
                                                                    $No_hp = $row['no_hp'];
                                                                    $durasi = $row['Durasi Sewa'];
                                                                    $tgl = $row['Tanggal Pemesanan'];
                                                                    $total = $row['Total'];
                                                                    $status = $row['Status Pembayaran'];
                                                                    $bukti = $row['Bukti Pembayaran'];
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $kode; ?></td>
                                                                        <td><?= $namaKost; ?></td>
                                                                        <td><?= $No; ?></td>
                                                                        <td><?= $NamaPenyewa; ?></td>
                                                                        <td><?= $No_hp; ?></td>
                                                                        <td><?= $durasi; ?></td>
                                                                        <td><?= $tgl; ?></td>
                                                                        <td>Rp.<?= number_format($total); ?></td>
                                                                        <td><?= $status; ?></td>
                                                                        <?php if ($bukti == 'Menunggu Pembayaran') { ?>
                                                                            <td><?= $bukti; ?></td>
                                                                        <?php  } else { ?>
                                                                            <td><img src="file/<?= $bukti; ?>" alt="" width="100px"></td>
                                                                        <?php     } ?>
                                                                        <td>
                                                                            <a href="" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#detail<?= $idPesan; ?>"><i class="fa-solid fa-circle-info mr-1"></i>Detail</a>
                                                                            <a href="print.php?id_pemesanan=<?= $idPesan; ?>" class="btn btn-warning btn-circle mt-2"><i class="fa-solid mr-1 fa-print"></i>Cetak</a>
                                                                        </td>
                                                                        <div class="modal fade" id="detail<?= $idPesan; ?>" tabindex="-1" aria-labelledby="EditadminLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-md">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="EditadminLabel">Bukti Pembayaran</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form class="user" action="" method="POST">
                                                                                        <div class="modal-body">
                                                                                            <input type="hidden" class="form-control form-control-user" id="exampleInputName" placeholder="Name" name="txt_id" value="<?= $idPesan; ?>" readonly>

                                                                                            <div class="form-group">
                                                                                                <label for="kode">Kode Pemesanan</label>
                                                                                                <input type="disabled" class="form-control form-control-user " id="kode" placeholder="Kode Transaksi" name="txt_kode" value="<?= $kode; ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="namaKost">Nama Kost</label>
                                                                                                <input type="text" class="form-control form-control-user" id="namaKost" placeholder="Nama Kost" name="txt_Namakost" value="<?= $namaKost; ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="penyewa">Nama Penyewa</label>
                                                                                                <input type="text" class="form-control form-control-user" id="penyewa" placeholder="Nama Penyewa" name="txt_Namapenyewa" value="<?= $NamaPenyewa; ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="lama">Lama Sewa</label>
                                                                                                <input type="text" class="form-control form-control-user" id="lama" placeholder="Lama sewa" name="txt_durasi" value="<?= $durasi; ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="bayar">Tanggal Pembayaran</label>
                                                                                                <input type="text" class="form-control form-control-user" id="bayar" placeholder="Tanggal Pembayaran" name="txt_tgl" value="<?= $tgl; ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="total">Total Pembayaran</label>
                                                                                                <input type="text" class="form-control form-control-user" id="total" placeholder="Total Pembayaran" name="txt_jk" value="<?= $total; ?>" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="total">Status Pembayaran</label>
                                                                                                <input type="text" class="form-control form-control-user" id="total" placeholder="Total Pembayaran" name="txt_status" value="<?= $status; ?>" readonly>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <button type="submit" name="edit" class="btn btn-primary">Tambah</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </tr>
                                                                    <?php $no++; ?>
                                                                <?php } ?>

                                                            </tbody>
                                                        <?php } ?>
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



<!-- pemilik cek pembayaran -->
<?php
if (isset($_POST['edit'])) {
    $Id     = $_POST['txt_id'];
    $Stat  = $_POST['txt_status'];

    $query = "UPDATE pemesanan SET status_pembayaran='$Stat' WHERE id_pemesanan='$Id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "User data telah terupdate!";
    } else {
        $error =  "User data gagal update";
    }
}
if (isset($_POST['batal'])) {
    $Id     = $_POST['txt_id'];
    $query = "UPDATE pemesanan SET status_pembayaran='Dibatalkan' WHERE id_pemesanan='$Id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "Penyewaan dibatalkan!";
    } else {
        $error =  "Gagal";
    }
}
if (isset($_POST['tambah'])) {
    $Id     = $_POST['txt_id'];
    $img = upload();

    $query = "UPDATE pemesanan SET bukti_pembayaran='$img' WHERE id_pemesanan='$Id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $succes = "Pembayaran Sukses!";
    } else {
        echo mysqli_error($koneksi);
    }
}
function upload()
{

    $file = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek file apakah diupload atau tidak
    if ($error === 4) {
        echo "<script> 
        alert('Pilih gambar terlebih dahulu');
      </script>";
        return false;
    }

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




    //lolos cek 
    move_uploaded_file($tmpName, 'file/' . $extensGambar);
    return $extensGambar;
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

</html>