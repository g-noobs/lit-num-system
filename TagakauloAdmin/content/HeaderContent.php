<?php session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the login page
    header('Location: ../index.php');
    exit;
}
?>
<!-- Logo -->
<a href="dashboard.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="#" class="user-image" alt="User Image">
                    <span class="hidden-xs"> <?php echo $_SESSION['name']?></span>
                </a>
                <ul class="dropdown-menu">

                    <li class="user-header">
                        <img src="#" class="img-circle" alt="User Image">
                        <p>
                            Admin Information
                            <small>Small Adming information</small>
                        </p>
                    </li>

                    <li class="user-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>

                    </li>

                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="../index.php" class="btn btn-default btn-flat">
                                <i class="fa fa-sign-out"></i> <span>Sign Out</span>
                                <?php $SESSION['loggedin'] = false; ?>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" data-toggle="#"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>

</nav>