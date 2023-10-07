<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once "../bootstrap/css.php"?>
    <style>
    body {
        overflow: hidden;
    }
    </style>
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
                    <b style="color:#3D3848;">Manage Subjects</b>
                </h1>
            </section>
            <?php include_once "../PagesContent/SubjectFolder/EssentialsSubj/ModalSubj.php"?>
            <!-- Main content -->
            <section class="content">
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
</body>

</html>