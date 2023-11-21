<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | User</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once("../bootstrap/css.php");?>

</head>
<!-- !!Modfied style-->

<?php include_once "../CommonPHPClass/ModifiedSearchStyle.php";?>

<!-- <style>
/* body {
    overflow: hidden;
} */
</style> -->

<body class="sidebar-mini skin-yellow fixed" style="height: 100%; min-height: 100%;">


    <div class="wrapper" style="height: auto; min-height: 100%;">

        <header class="main-header">
            <?php include_once("../CommonContent/HeaderContent.php"); ?>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <?php include_once "../CommonContent/MainSideContent.php"?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1744.3px;">
            <!-- Banner Alert -->
            <?php include_once "../CommonContent/ModifiedAlert.php"; ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h2>
                    <b style="color:#3D3848;">All Users</b>
                </h2>
            </section>

            <section>
                <div class="align-items-start">
                    <div class="col-sm-1">
                        <h4><b>Filter By: </b></h4>
                    </div>
                    <div class="col-sm-1">
                        <div class="custom-dropdown">

                            <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;">
                                <b>All Users</b> <!-- Updated the button text -->
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a href="#" data-user-type="all-active"><b>All Active Users</b></a></li>
                                <li><a href="#" data-user-type="arch-all"><b>All Archive Users</b></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-10">
                    </div>
                </div>
            </section>
            <br>
            <br>

            <!-- <section id="frmCsvGroup" class="container-fluid">
                <form id="uploadCSVForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user_file">Upload User</label>
                        <input type="file" name="user_file" id="user_file"/>
                    </div>
                    <div id="response"></div>
                    <div class="form-group">
                        <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
                        <button type="reset" class="btn btn-default pull-left">Clear</button>
                    </div>
                </form>
            </section> -->

            <!-- Modal to view User data -->
            <?php include_once("../PagesContent/UserContent/CommonUser/ViewUserDataModal.php");?>

            <!-- Main content -->
            <section class="content" id="mainContent">
                <!-- Small boxes (Stat box) -->
                <?php include_once "../PagesContent/UserContent/UserTable/AllUserTableContent.php";?>
            </section>
        </div>

        

        <!-- ./wrapper -->
        <?php include_once("../bootstrap/js.php");?>

        <!-- Common Script with other pages -->
        <?php include_once "../CommonContent/CommonAllScript.php"?>
        
        <!-- Script for Editing a user -->
        <?php include_once("../PagesContent/UserContent/CommonUser/EditUserScript.php");?>
        
        <!-- Script for Archive and Activate a user -->
        <?php include_once("../PagesContent/UserContent/CommonUser/ArchiveActivateUserScript.php");?>
    
        <!-- Script contain the Dropdown and Search -->
        <?php include_once("../PagesContent/UserContent/CommonUser/JQueryUser.php");?>

        <!-- Script to see all user data -->
        <?php include_once "../PagesContent/UserContent/CommonUser/ScriptViewUserData.php";?>
    </div>
</body>

</html>