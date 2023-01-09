<?php
require("koneksi.php");
header('Content-Type: application/json');

$sqlQuery = "SELECT * FROM sample_jual s join user_detail u ON s.id_user = u.id_user ";

$result = mysqli_query($koneksi, $sqlQuery);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($koneksi);
echo json_encode($data);
