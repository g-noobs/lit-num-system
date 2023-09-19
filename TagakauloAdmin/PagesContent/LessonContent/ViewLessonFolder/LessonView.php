<html style="height: auto; min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teacher Portal</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php include_once "../ViewLessonFolder/lessonStyle.php";?>
</head>

<body class="skin-yellow layout-top-nav" style="height: auto; min-height: 100%;"
    data-new-gr-c-s-check-loaded="14.1117.0" data-gr-ext-installed="">
    <div class="wrapper" style="height: auto; min-height: 100%;">
        <?php 
            include_once "../ViewLessonFolder/ViewHeader.php";
        ?>

        <div class="content-wrapper" style="min-height: 606.2px;">
            <div class="container">

                <section class="content-header">
                    <h1>
                        Top Navigation
                        <small>Example </small>
                    </h1>
                    <!-- Breadcrumb   
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Layout</a></li>
                        <li class="active">Top Navigation</li>
                    </ol> -->
                </section>

                <!-- Main Content-->
                <section class="content">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Blank Box</h3>
                        </div>
                        <div class="box-body">
                            The great content goes here
                        </div>

                    </div>

                </section>

            </div>

        </div>

        <?php
        include_once "../ViewLessonFolder/ViewFooter.php"; 
        ?>
    </div>
    <?php include_once "../ViewLessonFolder/lessonQuery.php"?>
</body>


</html>