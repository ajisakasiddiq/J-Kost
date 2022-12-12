<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="dashboard.php"><img class="logo_icon img-responsive" src="img/<?= $sesImg;  ?>" alt="logo" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="img/<?= $sesImg;  ?>" alt="profil" /></div>
                <div class="user_info">
                    <h6><?php echo $name; ?></h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <?php if ($sesLvl == 3) { ?>


            <!-- admin start -->
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="dashboard"><i class="fa fa-home yellow_color"></i> <span>Home</span></a>
                </li>
                <li><a href="profile_admin"><i class="fa fa-group orange_color"></i> <span>Profile Admin</span></a></li>
                <li><a href="Transaksi_admin"><i class="fa fa-money purple_color2"></i> <span>Transaksi</span></a></li>
                <li><a href="data_kost"><i class="fa fa-university red_color"></i> <span>Data Rumah Kost</span></a></li>
                <li class="active">
                    <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user yellow_color"></i> <span>User</span></a>
                    <ul class="collapse list-unstyled" id="user">
                        <li><a href="table_penyewa">> <span>Penyewa</span></a></li>
                        <li><a href="table_pemilik">> <span>Pemilik</span></a></li>
                    </ul>
                    <!-- <li><a href="datakamar.html"><i class="fa fa-university red_color"></i> <span>Data Kamar</span></a></li>
                            <li><a href="datarekening.html"><i class="fa fa-money purple_color2"></i> <span>Data Rekening</span></a></li>-->
            </ul>
            <!-- admin end -->


        <?php    } else if ($sesLvl == 2) { ?>


            <!-- pencari kos start -->
            <ul class="list-unstyled components">
                <li><a href="kamarAktif"><i class="fa-solid fa-house-chimney red_color"></i></i> <span>Kost ku</span></a></li>
                <li><a href="datarekening"><i class="fa fa-money purple_color2"></i> <span>Data Rekening</span></a></li>
                <li><a href="Transaksi_user"><i class="fa fa-money purple_color2"></i> <span>Transaksi</span></a></li>
            </ul>
            <!-- pencari kos end -->



        <?php  } else { ?>



            <!-- pemilik kos start -->
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="dashboard"><i class="fa fa-house-user yellow_color"></i> <span>Home</span></a>
                </li>
                <li><a href="datakost"><i class="fa-solid fa-house red_color"></i> <span>Data Kost</span></a></li>
                <li><a href="datakamar"><i class="fa fa-university "></i> <span>Data Kamar</span></a></li>
                <li><a href="datarekening"><i class="fa-solid fa-money purple_color2"></i> <span>Data Rekening</span></a></li>
                <li><a href="Transaksi_user"><i class="f-sharp fa-solid fa-money-bill-transfer purple_color2"></i> <span>Transaksi</span></a></li>
            </ul>
            <!-- pemilik kos end -->



        <?php } ?>

    </div>
</nav>