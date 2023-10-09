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

<style>
/* body {
    overflow: hidden;
} */
</style>

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
                    <b style="color:#3D3848;">Manage Users</b>
                </h2>
            </section>

            <section>
                <div class="align-items-start">
                    <div class="col-xs-1">
                        <h4><b>Filter By: </b></h4>
                    </div>
                    <div class="col-xs-2">
                        <div class="custom-dropdown">

                            <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;">
                                <b>All Users</b> <!-- Updated the button text -->
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a href="#" data-user-type="all-active"><b>All Active Users</b></a></li>
                                <li><a href="#" data-user-type="admin">Admin</a></li>
                                <li><a href="#" data-user-type="teacher">Teacher</a></li>
                                <li><a href="#" data-user-type="learner">Learner</a></li>


                                <li><a href="#" data-user-type="arch-all"><b>All Archive Users</b></a></li>
                                <li><a href="#" data-user-type="arch-admin"><small>Archived Admin</small></a>
                                </li>
                                <li><a href="#" data-user-type="arch-teacher"><small>Archived
                                            Teacher</small></a>
                                </li>
                                <li><a href="#" data-user-type="arch-learner"><small>Archived
                                            Learner</small></a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-3">
                    </div>

                    <div class="col-xs-6"></div>
                </div>
            </section>
            <br>
            <br>
            <section>
                <div class="container-fluid">
                    <button href="#" id="csvUploadIcon" data-toggle="tooltip" title="Upload Multiple User"
                        style="color:green">
                        <i class="fa fa-file-excel-o"></i>
                    </button>
                </div>
                <!-- <label>Download Template:<a href="Template/import-template.xlsx" download data-toggle="tooltip"
                    title="Download Template">
                    <i class="fa fa-file-excel-o"></i>
                </a>
            </label> -->
            </section>

            <section id="frmCsvGroup" class="container-fluid">
                <form id="uploadCSVForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user_file">Upload User</label>
                        <input type="file" name="user_file" id="user_file"/>
                    </div>
                    <div id="response"></div>
                    <div class="form-group">
                        <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </section>


            <!-- <div class="form-group">
                    <input type="file" name="file" id="file" class="file">
                </div>
                <div class></div>
                <div class="import">
                    <button type="submit" id="submit" name="import" class="btn btn-success">Import
                        CSV and Save Data</button>
                </div> -->


            <!-- Main content -->
            <section class="content" id="mainContent">
                <!-- Small boxes (Stat box) -->
                <?php include_once "../PagesContent/UserContent/UserTable/AllUserTableContent.php";?>
            </section>
        </div>
        <!-- All Modal for user-->
        <?php include_once("../PagesContent/UserContent/CommonUser/UserModal.php");?>

        <!-- ./wrapper -->
        <?php include_once("../bootstrap/js.php");?>

        <!-- Script contain the Dropdown and Search -->
        <?php include_once("../PagesContent/UserContent/CommonUser/JQueryUser.php");?>

        <!-- Script for Adding a new user -->
        <?php include_once("../PagesContent/UserContent/CommonUser/AddUserScript.php");?>

        <!-- Script for Editing a user -->
        <?php include_once("../PagesContent/UserContent/CommonUser/EditUserScript.php");?>

        <!-- Script for Archive and Activate a user -->
        <?php include_once("../PagesContent/UserContent/CommonUser/ArchiveActivateUserScript.php");?>

        <!-- Common Script with other pages -->
        <?php include_once "../CommonContent/CommonAllScript.php"?>

        <script>
        // Check for saved user type
        var userType = localStorage.getItem('userType');

        if (userType) {

            // Update dropdown 
            $('.custom-dropdown-toggle').text('Teacher');

            // Load content
            loadContent(userType);

            // Clear saved selection from dashboard.php
            localStorage.removeItem('userType');

        }

        function loadContent(userType) {

            var contentPath;

            if (userType === 'teacher') {
                contentPath = '../PagesContent/UserContent/UserTable/TeacherTableContent.php';
            }

            // ... other user types

            if (contentPath) {
                $("#mainContent").load(contentPath);
            }
        }
        </script>
    </div>
</body>

</html>