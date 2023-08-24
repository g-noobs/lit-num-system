<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once "../bootstrap/css.php"?>

    <style>
    body {
        overflow: hidden;

    }
    </style>
</head>

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
        <div class="content-wrapper" style="min-height: 902.55px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <b style="color:#3D3848;">Dashboard</b>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php include_once("../CommonContent/DashboardContent.php"); ?>
            </section>
            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
        </div>
        <!-- ./wrapper -->

    </div>
    <?php include_once("../bootstrap/js.php")?>

    <script>
    // Wait for document ready
    $(document).ready(function() {

        // Click handler for teacher count button
        $('#teacher-count').click(function() {

            // Save selection
            localStorage.setItem('userType', 'teacher');

            // Redirect
            window.location.href = 'user.php';

        });

    });
    </script>
</body>

</html>