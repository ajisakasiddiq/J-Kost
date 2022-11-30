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

function input_admin()
{
    global $koneksi;
    $Mail = $_POST['txt_email'];
    $Pass = $_POST['txt_pass'];
    $userName = $_POST['txt_username'];
    $Name = $_POST['txt_nama'];

    $query = "INSERT INTO user_detail VALUES (null,'$Name','$userName','$Mail','$Pass',3,null,null,null,null,null)";
    if (mysqli_query($koneksi,$query)) {
        $response=array(
            'status' => 1,
            'message' => 'Tambah data sukses'
        );
    }else{
        $response=array(
            'status' => 0,
            'message' => 'failed',
            'query' => $query
        );
    }
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