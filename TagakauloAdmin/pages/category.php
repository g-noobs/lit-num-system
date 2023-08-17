<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_once "../bootstrap/css.php"?>

    <?php include_once("../CommonPHPClass/ModifiedDropdown.php");?>
</head>

<body class="sidebar-mini skin-yellow fixed" data-new-gr-c-s-check-loaded="14.1111.0" data-gr-ext-installed
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
                    <b style="color:#3D3848;">Manage Category</b>
                </h1>
            </section>
            <br>

            <section>
                <div class="container-fluid">
                    <row class="align-items-start">
                        <div class="col-xs-1">
                            <h4><b>Filter By: </b></h4>
                        </div>


                        <div class="col-xs-3">
                            <form>
                                <div class="input-group" style="border: 3px solid #E58A00; border-radius: 10px;">
                                    <span class="input-group-addon" style="background-color: white;"><i
                                            class="glyphicon glyphicon-search" style="color: #E58A00;"></i></span>
                                    <input type="text" class="form-control" id="userInput" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-2">

                        </div>

                        <div class="col-xs-6"></div>
                    </row>
                </div>
            </section>

            <?php include_once("../CategoryFolder/CategoryCommon/ModalCategory.php");
                $modal = new ModalCategory();
                $modal->addNewCategory();
                $modal->archiveCategory();
            ?>
            <!-- Main content -->
            <section class="content" id="categoryMainCont">
                <?php include_once("../CategoryFolder/CategoryTable.php");?>

            </section>
            <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->
        <?php include_once("../bootstrap/js.php")?>
        <?php include_once "../AreaFolder/AreaCommon/JQueryArea.php"; ?>
</body>

</html>