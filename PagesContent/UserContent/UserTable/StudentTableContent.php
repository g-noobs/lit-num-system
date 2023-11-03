<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Student</h3>

                <div class="row">
                    <div class="col-xs-6">
                        <button id="btnAddLearner" data-user-level="Learner" type="button" class="btn btn-warning"
                            data-toggle="modal" data-target="#add_user_modal">
                            <i class="fa fa-plus"></i> <span> Add Learner</span>
                        </button>
                        <button id="archive_btn" type="button" class="btn btn-danger" data-toggle="modal"
                            modal-target="">
                            <i class="glyphicon glyphicon-trash"></i> <span>Archive</span>
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
                <div class="table-response">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th><input type='checkbox' id="select-all" class='checkbox'></th>
                                <th colspan="2"></th>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>User Type</th>
                                <th>Account Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        $status = "Active";
                        $studentTable = new DisplayAllTableClass();
                        $studentTable->displayStudent($status);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>