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
            <section>
                <div class="align-items-start">
                    <div class="col-sm-2">
                        <div class="custom-dropdown">

                            <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;">
                                <b>Active Lesson</b> <!-- Updated the button text -->
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a href="#" data-lesson-type="active-lesson"><b>Active Lesson</b></a></li>
                                <li><a href="#" data-lesson-type="arch-lesson"><b>Archived Lessonlesson</b></a></li>
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
            <section class="content container" id="lesson-table">
                <?php include_once "../PagesContent/LessonContent/TableFolder/LessonTable.php"?>
            </section>

            <!-- Section for topic -->
            <section class="content container" id="add-topic-panel">
                <?php include_once("../PagesContent/LessonContent/TopicFolder/LessonTopic.php");?>
            </section>
        </div>
    </div>
    <?php include_once("../bootstrap/js.php");?>
    <?php include_once("../PagesContent/LessonContent/CommonLesson/ModalLesson.php");?>
    <!-- Script for adding lesson -->
    <?php include_once("../PagesContent/LessonContent/CommonLesson/AddLessonScript.php");?>

    <!-- Script when button is click to view topic in lesson -->
    <?php include_once("../PagesContent/LessonContent/CommonLesson/ViewLessonScript.php");?>

    <!-- modified jquery for lesson - will modify if view button is click from the lesson-->
    <?php include_once("../PagesContent/LessonContent/CommonLesson/JqueryLesson.php");?>

    <!-- All Jquery for topic -->
    <?php include_once("../PagesContent/LessonContent/CommonLesson/JqueryTopic.php");?>

    <?php include_once "../PagesContent/LessonContent/TopicFolder/TopicScript.php";?>

    <!-- Script use accross the page and other pages -->
    <?php include_once "../CommonContent/CommonAllScript.php"?>

</body>

</html>