<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once("../bootstrap/css.php");?>
</head>

<style>
body {
    overflow-y: hidden;
}
</style>

<body class="sidebar-mini skin-yellow" data-new-gr-c-s-check-loaded="14.1111.0" data-gr-ext-installed
    style="height: auto; min-height: 100%;">

    <div class="wrapper">

        <header class="main-header">
            <?php include_once("../content/HeaderContent.php"); ?>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <?php include_once "../content/MainSideContent.php"?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1744.3px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <b>Manage Users</b>
                </h1>
            </section>
            <br>


            <div class="container-fluid">
                <row class="align-items-start">
                    <div class="col-sm-1">
                        <h4><b>Filter By: </b></h4>
                    </div>
                    <div class="col-sm-2">
                        <div class="dropdown">

                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;"> All
                                User
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-user-type="allUsers"><b>All Users</b></a></li>
                                <li><a href="#" data-user-type="admin">Admin</a></li>
                                <li><a href="#" data-user-type="teacher">Teacher</a></li>
                                <li><a href="#" data-user-type="student">Student</a></li>

                                <li class="divider"></li>
                                <li><a href="#" data-user-type="arch-all"><b>All Archive Users</b></a></li>
                                <li><a href="#" data-user-type="arch-admin"><small>Archived Admin</small></a></li>
                                <li><a href="#" data-user-type="arch-teacher"><small>Archived Teacher</small></a></li>
                                <li><a href="#" data-user-type="arch-student"><small>Archived Student</small></a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <form>
                            <div class="input-group" style="border: 3px solid #E58A00; border-radius: 10px;">
                                <span class="input-group-addon" style="background-color: white;"><i
                                        class="glyphicon glyphicon-search" style="color: #E58A00;"></i></span>
                                <input type="text" class="form-control" id="userInput" placeholder="Search">
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-2"></div>
                </row>
            </div>

            <!-- Main content -->;
            <section class="content" id="mainContent">
                <!-- Small boxes (Stat box) -->
                <?php include_once("../UserContent/UserTable/AllUserTableContent.php");?>
            </section>
        </div>
        <!-- ./wrapper -->
        <?php include_once("../bootstrap/js.php");?>
        <?php include_once("../UserContent/CommonUser/JQueryUser.php")?>
</body>

</html>