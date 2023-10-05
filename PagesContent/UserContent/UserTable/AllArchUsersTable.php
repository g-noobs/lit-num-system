<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                
                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <h3>All Archived user List</h3>
                        <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                            <i class="fa fa-plus"></i> <span> Add User</span>
                        </button> -->
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
            <br>
            <div class="modal fade" id="add-user">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Enter the User Information</h4>
                        </div>
                        <form role="form" action="../UserContent/ActionsUsers/ActionRegisterUser.php"
                            onsubmit="return validateForm()" method="post">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="gender" placeholder="Gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control" id="exampleInputPassword1"
                                            placeholder="Birthdate">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="user" placeholder="User Type">
                                            <option>Admin</option>
                                            <option>Teacher</option>
                                            <option>Learner</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-left">Add User</button>
                                <button type="reset" class="btn btn-default pull-left"
                                    data-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal ADD User-->

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplayAllTableClass.php");
                        $table = "user_info_view";
                        $sql = "SELECT * FROM $table WHERE status = 'Inactive'";
                        $userT = new DisplayAllTableClass();
                        $userT->userTable($sql);
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
