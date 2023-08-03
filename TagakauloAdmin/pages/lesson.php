<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Lesson</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once("../bootstrap/css.php");?>

    <?php include_once("../CommonPHPClass/ModifiedDropdown.php");?>
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
                    <b style="color:#3D3848;">Manage Lesson</b>
                </h1>
            </section>
            <br>
            <div class="container-fluid well">

                <button type="button" class="btn btn-default">Lesson</button>
                <button type="button" class="btn btn-default">Quiz</button>
                <button type="button" class="btn btn-default">Assignment</button>

            </div>

            <!-- Main content -->
            <section class="content" id="lesson-table">
                <?php include_once "../LessonContent/TableFolder/LessonTable.php"
                
                ?>
            </section>

            <section class="content" id="lesson-info">

            </section>

            <section class="content" id="lesson-info">

            </section>
        </div>
        <!-- ./wrapper -->

        <?php include_once("../bootstrap/js.php"); ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#userInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("tbody tr").filter(function() {
                    var rowText = $(this).text().toLowerCase();
                    var pText = $(this).find("p").text().toLowerCase();
                    $(this).toggle(rowText.indexOf(value) > -1 || pText.indexOf(value) > -1);
                });
            });
        });
        </script>
</body>

</html>