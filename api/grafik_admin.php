<?php
require("koneksi.php");
header('Content-Type: application/json');

$sqlQuery = "SELECT pemesanan.id_pemesanan,pemesanan.kode_pemesanan as 'Kode Pemesanan', data_kost.nama_kost as 'Nama Kost' , kamar_kost.no_kamar as 'No Kamar' , pemesanan.nama_pemesan as 'Nama Penyewa' 
,pemesanan.tgl_pemesanan AS 'Tanggal Pemesanan',pemesanan.durasi_sewa 'Durasi Sewa',pemesanan.total_pembayaran as 'Total',pemesanan.status_penyewaan as 'Status Pembayaran'
, pemesanan.bukti_pembayaran as 'Bukti Pembayaran',user_detail.no_hp ,rekening.Nama_bank,rekening.Nama_rek,rekening.no_rek,DATE_ADD(pemesanan.tgl_pembayaran, INTERVAL 1 DAY ) as 'Batas_Pembayaran',pemesanan.tgl_pembayaran
FROM pemesanan 
INNER JOIN kamar_kost ON pemesanan.id_kamar = kamar_kost.id_kamar 
INNER JOIN data_kost ON  kamar_kost.id_kost = data_kost.id_kost
INNER JOIN user_detail ON  user_detail.id_user = data_kost.id_user
INNER JOIN rekening ON  rekening.id_rek = pemesanan.id_rek ";

$result = mysqli_query($koneksi, $sqlQuery);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($koneksi);
echo json_encode($data);
