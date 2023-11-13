<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Module</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once "../bootstrap/css.php"?>

    <?php include_once "../CommonPHPClass/ModifiedSearchStyle.php"?>
</head>

<body class="sidebar-mini skin-yellow fixed" data-new-gr-c-s-check-loaded="14.1111.0" data-gr-ext-installed
    style="height: 100%; min-height: 100%;">

    <div class="wrapper">

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
                <h1>
                    <b style="color:#3D3848;">Manage Module</b>
                </h1>
            </section>
            <br>
            <section>
                <div class="align-items-start">
                    <div class="col-sm-2">
                        <div class="custom-dropdown">

                            <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;">
                                <b>Active Module</b> <!-- Updated the button text -->
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a href="#" data-module-type="active-module"><b> Active Module</b></a></li>
                                <li><a href="#" data-module-type="arch-module"><b> Archive Module</b></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-10">
                    </div>
                </div>
            </section>
            <br>
            <br>
            <?php include_once "../PagesContent/SubjectFolder/EssentialsSubj/ModalSubj.php"?>
            <?php include_once "../PagesContent/SubjectFolder/EssentialsSubj/ConfirmationModal.php"?>

            <!-- Main content -->
            <section class="content" id="mainContent">
                <?php include_once "../PagesContent/SubjectFolder/SubjectMain/SubjectMainContent.php"?>
            </section>
            <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->


        <?php include_once("../bootstrap/js.php")?>

        <!-- Script for search bar and other common Script use accross the page -->
        <?php include_once "../CommonContent/CommonAllScript.php"?>

        <!-- Adding Subject Script -->
        <?php include_once "../PagesContent/SubjectFolder/ScriptSubj/AddSubjScript.php"?>

        <!-- Main Script -->
        <?php include_once "../PagesContent/SubjectFolder/ScriptSubj/MainSubjSript.php"?>

</body>

</html>