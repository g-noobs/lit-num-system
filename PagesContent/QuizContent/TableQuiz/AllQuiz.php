<?php include_once ("../CommonPHPClass/ModifiedSearchStyle.php");?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Quiz List</h3>
            </div>
            <!-- /.box-header -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-quiz">
                            <i class="fa fa-plus"></i> <span> New Quiz</span>
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="text" id="userInput" class="form-control" placeholder="Search..">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- /.modal ADD User-->

            <!-- /.modal EditActive User-->

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "QuizTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        $table = "tbl_quiz";
                        $sql = "SELECT * FROM $table;";
                        $userT = new DisplayAllTableClass();
                        $userT->quizTable($sql);
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>