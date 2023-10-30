<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!--  BootStrap Template -->
    <?php include_once "../bootstrap/css.php"?>

    <style>
    body {
        overflow: hidden;

    }
    </style>
</head>

<body class="sidebar-mini skin-yellow fixed" style="height: 100%; min-height: 100%;">

    <div class="wrapper" style="height: auto; min-height: 100%;">

        <!-- Main Header -->
        <header class="main-header">
            <?php include_once("../CommonContent/HeaderContent.php"); ?>
        </header>
        <!-- Left side bar-->
        <aside class="main-sidebar">
            <?php include_once "../CommonContent/MainSideContent.php"?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 902.55px;">

            <!-- Modified Alert Popup Alerts-->
            <?php include_once "../CommonContent/ModifiedAlert.php"; ?>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <b style="color:#3D3848;">Dashboard</b>
                </h1>
            </section>

            <!-- Main content -->
            <!-- <section class="content">
              //include_once("../CommonContent/DashboardContent.php"); ?>
            </section> -->

            <section class="content">
                <?php include_once("../PagesContent/DashboardFolder/UserAnalytics.php")?>
            </section>

        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- Bootstrap 3 template Scripts -->
    <?php include_once("../bootstrap/js.php")?>

    <!-- Common jquery script used on all pages. Consists of logout script, search input/bar for tables, add active class to sidebar menu, and add active class to treeview menu. -->
    <?php include_once "../CommonContent/CommonAllScript.php"?>

    <?php include_once "../PagesContent/DashboardFolder/DasboardScripts.php";?>
</body>

</html>