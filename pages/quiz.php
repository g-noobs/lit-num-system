<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz| Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once("../bootstrap/css.php"); ?>
</head>

<!-- <style>
body {
    overflow: hidden;
}
</style> -->
<?php include_once "../CommonPHPClass/ModifiedSearchStyle.php";?>
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
                <h1 class="container">
                    <b style="color:#3D3848;">Manage Quiz</b>
                </h1>
            </section>
            <br>

            <section class="content" id="addQquizSection">
                <?php include_once "../PagesContent/QuizFolder/TableQuiz/AddQuizSection.php";?>
            </section>
            
            <section class="content" id="quizContent">
                <?php include_once("../PagesContent/QuizFolder/TableQuiz/QuizMainTable.php");?>
            </section>
        </div>
        <!-- Main content -->
        <?php include_once("../bootstrap/js.php");?>

        <!-- For Adding quiz including Jquery -->
        <?php include_once "../PagesContent/QuizFolder/QuizEssentials/AddQuizScript.php"?>  

        <!-- For chooosing correct answer from the provided multiplce choice -->
        <?php include_once "../PagesContent/QuizFolder/QuizEssentials/MultipleChoiceScript.php"?>

        <!-- For modification of quiz type -->
        <?php include_once "../PagesContent/QuizFolder/QuizEssentials/QuizOptionScript.php"?>

        <!-- This script assist on viewing the quiz data -->
        <?php include_once "../PagesContent/QuizFolder/QuizEssentials/ViewQuizScript.php";?>

        <!-- Script used for the the entire page includes: Search, logout, sidebar active class -->
        <?php include_once "../CommonContent/CommonAllScript.php"?>
</body>

</html>