<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Lesson</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once("../bootstrap/css.php");?>


</head>

<?php include_once "../CommonPHPClass/ModifiedSearchStyle.php";?>

<body class="sidebar-mini skin-yellow fixed" style="height: 100%; min-height: 100%;">

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
                    <b style="color:#3D3848;">Manage Lesson</b>
                </h1>
            </section>
            <br>
            
            <!-- Main content -->
            <section class="container" id="lesson-table">
                <?php include_once "../PagesContent/LessonContent/TableFolder/LessonTable.php"?>
            </section>

            <!-- Section for topic -->
            <section class="container" id="add-topic-panel">
                <?php include_once("../PagesContent/LessonContent/TopicFolder/LessonTopic.php");?>
            </section>
        </div>
    </div>
    <?php include_once("../bootstrap/js.php");?>
    <?php include_once("../PagesContent/LessonContent/CommonLesson/ModalLesson.php");?>
    <!-- Script for adding lesson -->
    <?php include_once("../PagesContent/LessonContent/CommonLesson/AddLessonScript.php");?>

    <?php include_once("../PagesContent/LessonContent/CommonLesson/ViewLessonScript.php");?>

    <?php include_once("../PagesContent/LessonContent/CommonLesson/JqueryTopic.php");?>

    <?php include_once "../PagesContent/LessonContent/TopicFolder/TopicScript.php";?>
    <?php include_once "../CommonContent/CommonAllScript.php"?>

</body>

</html>