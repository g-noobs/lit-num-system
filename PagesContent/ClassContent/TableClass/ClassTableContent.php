

<?php include_once "../CommonPHPClass/ModifiedSearchStyle.php"?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <!-- <h2 class="box-title">All Class List</h2> -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add_class_modal">
                            <i class="fa fa-plus"></i> <span> New Class</span>
                        </button>
                        <button id="archive_btn" type="button" class="btn btn-danger" data-toggle="modal"
                            modal-target="">
                            <i class="glyphicon glyphicon-trash"></i>
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
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover dataTable text-center">
                                    <thead>
                                        <tr>
                                            <th><input type='checkbox' id="select-all" class='checkbox'></th>
                                            <th></th>
                                            <th>Class ID</th>
                                            <th>Class Name</th>
                                            <th>School Year</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include_once("../Database/ClassEssentialsClass.php");
                                        $classTable = new ClassEssentialsClass();
                                        $sql = "SELECT * FROM class_view;";
                                        $classTable->classTable($sql);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
