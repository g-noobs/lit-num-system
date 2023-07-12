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

<body class="sidebar-mini skin-yellow" data-new-gr-c-s-check-loaded="14.1111.0" data-gr-ext-installed
    style="height: 100%; min-height: 100%;">

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
                    Profile
                    <small></small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container" style="background: white;">
                    <h3>Admin Name: <?php echo $_SESSION['name'];?></h3>
                    <a href='#'><span class='glyphicon glyphicon-edit'></span></a>
                    <br>
                    <button class="btn btn-primary" type="button" data-toggle="modal">Update</button>
                </div>

            </section>
            <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->

        <?php include_once("../bootstrap/js.php")?>
</body>

</html>