<?php 
require_once '../koneksi.php';
if (function_exists($_GET['function'])) {
    $_GET['function']();
}
// start admin
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


// end admin

// pemilik start
function get_pemilik()
{
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM user_detail WHERE level = 1");
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

// pemilik end

// penyewa start
function get_penyewa()
{
    global $koneksi;
    $query = $koneksi->query("SELECT * FROM user_detail WHERE level = 2");
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

// penyewa end
 ?>