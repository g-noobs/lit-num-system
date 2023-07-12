<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All user List</h3>
            </div>
            <!-- /.box-header -->

            <div class="container-fluid">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                    <i class="fa fa-plus"></i> <span> Add User</span>
                </button>
            </div>
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
                                            <option>Student</option>
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

            <?php include_once "../UserContent/CommonUser/EditActiveModal.php"; ?>


            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        $query = "
                        SELECT 
                            tbl_user_info.user_info_id, tbl_user_info.name,tbl_user_info.gender, tbl_user_info.email, tbl_user_info.birthdate,
                            tbl_user_level.user_level_description, tbl_status.status
                        FROM tbl_user_info
                        JOIN tbl_status ON tbl_user_info.status_id = tbl_status.status_id
                        JOIN tbl_user_level ON tbl_user_info.user_level_id = tbl_user_level.user_level_id;";

                        $userT = new DisplayAllTableClass();
                        $userT->userTable($query);
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