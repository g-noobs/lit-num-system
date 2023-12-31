<?php include_once "../CommonPHPClass/ModifiedSearchStyle.php"?>
<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Subject List</h3>
                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-subj">
                            <i class="fa fa-plus"></i> <span>Add Subject</span>
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
            <!-- /.box-header -->

            <!-- /.modal for Edit User-->

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <?php include_once "../PagesContent/SubjectFolder/SubjectMain/SubjTableHeader.php"?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../Database/DisplaySubject.php");
                        $subjTable = new DisplaySubject();
                        $subjTable->displaySubjectList();
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