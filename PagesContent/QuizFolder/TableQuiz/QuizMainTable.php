<?php include_once ("../CommonPHPClass/ModifiedSearchStyle.php");?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning container">
            <div class="box-header with-border">
                <h3 class="box-title">All Quiz List</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning btn-sm" data-toggle='modal'
                            data-target="#add_quiz_modal">
                            <i class="fa fa-plus"></i> <span> Add Quiz</span>
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <div class="box-tools pull-right">
                            <div class="search-box" style="margin-right: 35px;">
                                <i class="fa fa-search"></i>
                                <input type="text" id="userInputTopic" class="form-control" placeholder="Search..">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "QuizTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../Database/QuizDisplayClass.php");
                        $quiztable = new QuizDisplayClass();
                        $quiztable->quizTable();
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