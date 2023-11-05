<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Class</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once "../bootstrap/css.php"?>

</head>
<style>
body {
    overflow: hidden;
}
</style>

<body class="sidebar-mini skin-yellow fixed" data-new-gr-c-s-check-loaded="14.1111.0" data-gr-ext-installed
    style="height: auto; min-height: 100%;">

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
            <?php include_once "../CommonContent/ModifiedAlert.php"; ?>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <b style="color:#3D3848;">Manage Class</b>

                </h1>
            </section>
            <br>
            <section>
                <div class="align-items-start">
                    <div class="col-sm-2">
                        <div class="custom-dropdown">

                            <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;">
                                <b>Active Class</b> <!-- Updated the button text -->
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a href="#" data-class-type="active-class"><b>Active Class</b></a></li>
                                <li><a href="#" data-class-type="archive-class"><b>Archived Class</b></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-10">
                    </div>
                </div>
            </section>
            <br>
            <br>
            <!-- Main content -->
            <section class="content" id="classTable">
                <?php include_once("../PagesContent/ClassContent/TableClass/ClassTableContent.php"); ?>
            </section>

        </div>
        <!-- ./wrapper -->

        <?php include_once("../bootstrap/js.php");?>
        <?php include_once("../PagesContent/ClassContent/AllClassScript/ClassJquery.php");?>
        <?php include_once("../PagesContent/ClassContent/AllClassScript/ArchiveScript.php");?>

        <?php include_once "../CommonContent/CommonAllScript.php"?>
</body>

</html>