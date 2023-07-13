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
                    <b>Lessons</b>
                    <small></small>
                </h1>
            </section>
            <br>
            <div class="container-fluid">
                <row class="align-items-start">
                    <div class="col-sm-1">
                        <h4><b>Filter By: </b></h4>
                    </div>
                    <div class="col-sm-2">
                        <div class="custom-dropdown">

                            <button class="custom-dropdown-toggle btn" type="button" data-toggle="dropdown"
                                style="width:150px; border: 2px solid #E58A00; border-radius:10px; color: #E58A00;"> All
                                User
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a href="#" data-user-type="culture&arts">Culture & Arts</a></li>
                                <li><a href="#" data-user-type="folklore">Folklore</a></li>
                                <li><a href="#" data-user-type="numbers">Numbers</a></li>
                                <li><a href="#" data-user-type="letters">Letters</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <form>
                            <div class="input-group" style="border: 3px solid #E58A00; border-radius: 10px;">
                                <span class="input-group-addon" style="background-color: white;"><i
                                        class="glyphicon glyphicon-search" style="color: #E58A00;"></i></span>
                                <input type="text" class="form-control" id="userInput" placeholder="Search">
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-2"></div>
                </row>
            </div>

            <!-- Main content -->
            <section class="content">
                <?php include_once "../LessonContent/AllLessonContent.php"
                
                ?>
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