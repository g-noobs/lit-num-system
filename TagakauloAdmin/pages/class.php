<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once "../bootstrap/css.php"?>

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
                    <b style="color:#3D3848;">Manage Class</b>

                </h1>
            </section>
            <br>

            <!-- Main content -->
            <section class="content" id="classContent">
                <?php include_once("../ClassContent/TableClass/ClassTableContent.php"); ?>

            </section>

            <!-- 
            <form role="form" action="../LessonContent/ActionLesson/ActionRegisterLesson.php" method="post" id="form-add" class="container well">
                <section class="content" id="lesson-info">
                </section>

                <section class="content" id="lesson-resource">

                </section>

                <section class="content" id="learning-obj">
                </section>

                <section class="content" id="lesson-permission">
                </section>
            </form>

            -->
        </div>
        <!-- ./wrapper -->

        <?php include_once("../bootstrap/js.php");
            include_once("../ClassContent/ClassEssentials/ClassJquery.php");
        ?>
</body>

</html>