<?php 
require_once '../koneksi.php';
if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_admin()
{
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM user_detail WHERE level = 3");
    while($row=mysqli_fetch_object($query))
    {
        $data[] = $row;
    }
    $response=array(
        'status' => 1,
        'message' => 'Success',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

 ?>