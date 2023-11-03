<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Teacher</h3>
                <div class="row">
                    <div class="col-xs-6">
                        <button id="btnAddTeacher" data-user-level="Teacher" type="button" class="btn btn-warning"
                            data-toggle="modal" data-target="#add_user_modal">
                            <i class="fa fa-plus"></i> <span>Add Teacher</span>
                        </button>
                        <button id="archive_btn" type="button" class="btn btn-danger" data-toggle="modal" modal-target="">
                        <i class="glyphicon glyphicon-trash"></i> <span>Archive</span>
                        </button>
                    </div>

                    <div class="col-xs-4">
                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="text" id="userInput" class="form-control" placeholder="Search..">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                            <th></th>
                            <th><input type='checkbox' id="#select-all" class='checkbox'></th>
                            <th>ID</th>
                            <th>Personal ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>User Type</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        
                        $teacherTable = new DisplayAllTableClass();
                        $status = "Active";
                        $teacherTable->displayTeacher($status);
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