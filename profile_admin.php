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

 // view data admin
 $API_url='http://localhost:8080/jkos/api/api.php?function=get_admin';
 $json_data=file_get_contents($API_url);
 $response_data=json_decode($json_data);
 $user_data=$response_data->data;
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
    
    <!-- font awesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
   <body class="inner_page contact_page">
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
                                    <h2>Profile Admin</h2>
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
                                                <h2>Admin </h2>
                                            </div>
                                        </div>
                                        <div class="table_section padding_infor_info">
                                        <div class="mb-2">
                                                        <div id="toolbar">
                                                            <button id="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAdmin">
                                                                <i class="fa-solid fa-plus"></i> Tambah Admin
                                                             </button>
                                                        </div>
                                                 </div>
                                        <table id="admin" class="table table-borderless" style="width:100%" >
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
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                <?php 
                                                $no = 1; 
                                                foreach($user_data as $user) :      
                                                ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= $user -> user_nama; ?></td>
                                                                <td><?= $user -> user_email; ?></td>
                                                                <td><?= $user -> username; ?></td>
                                                                <td><?= $user -> nik; ?></td>
                                                                <td><?= $user -> alamat; ?></td>
                                                                <td><?= $user -> no_hp; ?></td>
                                                                <td><?= $user -> jenis_kelamin; ?></td>
                                                                <td><img src="img/profil.jpg" alt="" width="50px"></td>
                                                                <td>
                                                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAdmin<?= $user->id_user; ?>"><i class="fas fa-pen"></i></a>

                                                                    <a href="profile_admin.php?id_user=<?= $user -> id_user ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin deck?');"><i class="fas fa-trash"></i></a>
                                                                </td>

                                                            <!-- modal edit admin start -->

                                                            <div class="modal fade" id="editAdmin<?= $user->id_user; ?>" tabindex="-1" aria-labelledby="EditadminLabel" aria-hidden="true">
                                                                   <div class="modal-dialog modal-md">
                                                                     <div class="modal-content">
                                                                       <div class="modal-header">
                                                                         <h1 class="modal-title fs-5" id="EditadminLabel">Edit Admin</h1>
                                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                       </div>
                                                                       <form class="user" action="" method="POST">
                                                                       <div class="modal-body">
                                                                       <input type="hidden" class="form-control form-control-user" id="exampleInputName"
                                                                                placeholder="Name" name="txt_id" value="<?= $user->id_user; ?>">
                                                                       <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputName"
                                                                                placeholder="Name" name="txt_nama" value="<?= $user->user_nama; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                                                placeholder="Email Address" name="txt_email" value="<?= $user->user_email; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                                                                placeholder="Username" name="txt_username" value="<?= $user->username; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                                                                placeholder="NIK" name="txt_nik" value="<?= $user->nik; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                                                                placeholder="Alamat" name="txt_alamat" value="<?= $user->alamat; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                                                                placeholder="No.Handphone" name="txt_nohp" value="<?= $user->no_hp; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                                                                placeholder="Jenis Kelamin" name="txt_jk" value="<?= $user->jenis_kelamin; ?>">
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
                                                            <!-- modal edit admin end -->
                                                            </tr>
                                                            <?php $no++; ?>
                                                    <?php endforeach; ?>
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
               <!-- end row -->
            </div>
        </div>
    </div>
</div>
</div>


<!-- modal tambah admin start -->
<div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">
           <div class="modal-header">
             <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <form class="user" action="" method="POST">
           <div class="modal-body">
           <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleInputName"
                    placeholder="Name" name="txt_nama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Email Address" name="txt_email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                    placeholder="Username" name="txt_username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                    placeholder="Password" name="txt_pass">
            </div>
             
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
           </div>
           </form>
         </div>
       </div>
     </div>
<!-- modal tambah admin end -->












    <!-- footer -->
    <div class="container-fluid">
        <div class="footer">
            <p>Copyright © 2022 <br><br> Distributed By: <a href="https://themewagon.com/">Team Ruwett</a>
        </div>
    </div>
    <!-- end dashboard inner -->
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
            $(document).ready(function () {
                $('#admin').DataTable();
            });
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        
</body>

</html>


<?php 
if(isset($_POST['tambah']) ){
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
if( isset($_POST['update']) ){
    $userId     = $_POST['txt_id'];
    $Mail     = $_POST['txt_email'];
    $userName   = $_POST['txt_username'];
    $Name   = $_POST['txt_nama'];
    $Nik   = $_POST['txt_nik'];
    $alamat   = $_POST['txt_alamat'];
    $Nohp   = $_POST['txt_nohp'];
    $jk   = $_POST['txt_jk'];

    $query = "UPDATE user_detail SET user_nama='$Name', user_email='$Mail', username='$userName', nik='$Nik', alamat='$alamat', no_hp='$Nohp', jenis_kelamin='$jk' WHERE id_user='$userId'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        $success = "User data telah terupdate!";
    }else{
        $error =  "User data gagal update";
    }
}
$id = $_GET['id_user'];
$query =  "DELETE FROM user_detail WHERE id_user='$id'";
mysqli_query($koneksi, $query);

?>



<?php if(isset($success)){ ?>
    <script>
        swal({
  title: "<?= $success; ?>",
  icon: "success",
  button: "OKE!",
});
    </script>
    <?php }?>
    <?php if(isset($error)){ ?>
    <script>
        swal({
  title: "<?= $error; ?>",
  icon: "success",
  button: "OKE!",
});
    </script>
    <?php }?>