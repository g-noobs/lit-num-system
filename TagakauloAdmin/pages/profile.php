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
                    <b style="color:#3D3848;">Admin Profile</b>

                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php include_once("../PagesContent/ProfileContent/ProfileMain.php");?>

            </section>
            <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->


        <!-- Modal HTML -->
        <div id="messageModal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <div class="modal-body">
                        <p><?= urldecode($_GET['msg']) ?></p>
                    </div>

                </div>
            </div>
        </div>

        <?php include_once("../bootstrap/js.php")?>
        <script>
        // Check for message
        var msg = <?= json_encode($_GET['msg'] ?? '') ?>;
        if (msg) {
            $('#messageModal').modal('show');
        }
        </script>
        <?php include_once("../PagesContent/ProfileContent/JqueryProfile.php");?>

        <?php include_once "../CommonContent/CommonAllScript.php"?>
</body>

</html>