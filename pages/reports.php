<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Template CSS -->
    <?php include_once("../bootstrap/css.php");?>
    <!-- Modified Style for Search -->
    <?php include_once "../CommonPHPClass/ModifiedSearchStyle.php";?>


    <!-- jQuery 3 -->
    <script src="../design/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../design/bower_components/jquery-ui/jquery-ui.min.js"></script>

</head>


<body class="sidebar-mini skin-yellow fixed" data-new-gr-c-s-check-loaded="14.1111.0" data-gr-ext-installed
    style="height: 100%; min-height: 100%;">

    <div class="wrapper" style="height: auto; min-height: 100%;">

        <header class="main-header">
            <?php include_once("../CommonContent/HeaderContent.php");?>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <?php include_once "../CommonContent/MainSideContent.php"?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1744.3px;">
            <div class="container">
                <!-- Banner Alert -->
                <?php include_once "../CommonContent/ModifiedAlert.php"; ?>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <b style="color:#3D3848;">Reports</b>
                    </h1>
                </section>

                <!-- Modified Style for dropdown -->
                <?php include_once "../CommonPHPClass/ModifiedDropdown.php";?>
                <br>
                <!-- Dropdown Section -->
                <section>
                    <div class="align-items-start">
                        <div class="col-sm-2">
                            <div class="custom-dropdown">

                                <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                    style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;">
                                    <b>Students Data</b> <!-- Updated the button text -->
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu custom-dropdown-menu">
                                    <li><a href="#" data-report="student-data"><b>Students Data</b></a></li>
                                    <li><a href="#" data-report="teacher-data"><b>Teachers Data</b></a></li>
                                    <li><a href="#" data-report="subject-data"><b>Subject Data</b></a></li>
                                    <li><a href="#" data-report="lesson-data"><b>Lesson Data</b></a></li>
                                    <li><a href="#" data-report="topic-data"><b>Topic Data</b></a></li>
                                    <li><a href="#" data-report="quiz-data"><b>Quiz Data</b></a></li>
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
                <section class="mainContent">
                    <?php include_once "../PagesContent/ReportsFolder/TableReportFolder/StudentData.php"?>
                </section>
            </div>
        </div>
    </div>
    <!-- Script From the template -->
    <?php include_once("../bootstrap/js.php");?>
    <!-- Modified Script for Search -->
    <?php include_once "../CommonContent/CommonAllScript.php"?>

    <!-- Exporting Data script And Search input bar script-->
    <?php include_once "../PagesContent/ReportsFolder/ScriptReportFolder/ExportScript.php"?>

    <!-- Dropdown Script and Navigation-->
    <?php include_once "../PagesContent/ReportsFolder/ScriptReportFolder/DropdownScript.php"?>
</body>

</html>