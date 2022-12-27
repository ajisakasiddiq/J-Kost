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

    $id = $_GET['id_pemesanan'];
    $query = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' ,kamar_kost.harga, kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
        ,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_pembayaran as 'Status Pembayaran'
        , pemesanan.bukti_pembayaran as 'Bukti Pembayaran', user_detail.no_hp FROM pemesanan 
        INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
        INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
        INNER JOIN user_detail ON  user_detail.id_user = pemesanan.id_user
        WHERE pemesanan.id_pemesanan = '$id'";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($result)) {
        $idPesan = $row['id_pemesanan'];
        $kode = $row['Kode Pemesanan'];
        $namaKost = $row['Nama Kost'];
        $No = $row['No Kamar'];
        $harga = $row['harga'];
        $NamaPenyewa = $row['Nama Penyewa'];
        $No_hp = $row['no_hp'];
        $durasi = $row['Durasi Sewa'];
        $tgl = $row['Tanggal Pemesanan'];
        $total = $row['Total'];
        $status = $row['Status Pembayaran'];
        $bukti = $row['Bukti Pembayaran'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <meta charset="utf-8">
    <title>J KOST</title>
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
</head>

<body>
    <h1 class="text-center">------------------Bukti Pemesanan------------------</h1>
    <div class="row">
        <div class="col-4">
            <h3>Nama penyewa</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $NamaPenyewa; ?></h3>
        </div>
        <div class="col-4">
            <h3>Tanggal mulai kos</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $tgl; ?></h3>
        </div>
        <div class="col-4">
            <h3>Nama Kos</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $namaKost; ?></h3>
        </div>
        <div class="col-4">
            <h3>Nomor Kamar</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $No; ?></h3>
        </div>
        <div class="col-4">
            <h3>Harga Kost Per-bulan</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $harga; ?></h3>
        </div>
        <p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
        <div class="col-4">
            <h3>Durasi Sewa</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $durasi; ?></h3>
        </div>
        <div class="col-4">
            <h3>Total</h3>
        </div>
        <div class="col-8">
            <h3>:<?= $total; ?></h3>
        </div>
    </div>

    <script>
        window.print();
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>