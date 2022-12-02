    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="index.php">
                                    <img class="img-responsive rounded-circle" src="img/kost.png" alt="Home"/>
                                    Kembali ke Home
                                </a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>

                                        <ul class="user_profile_dd">
                                            <li>
                                                <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="img/<?= $sesImg;  ?>" alt="#" /><span class="name_user"><?php echo $name; ?></span></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="profile.php">My Profile</a>
                                                    <a class="dropdown-item" href="ResetPass.php">Setting</a>
                                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>