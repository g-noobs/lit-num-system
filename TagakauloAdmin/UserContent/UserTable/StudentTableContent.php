<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Student</h3>
            </div>
            <!-- /.box-header -->

            <div class="container-fluid">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                    <i class="fa fa-plus"></i> <span> Add Student</span>
                </button>
            </div>

            <div class="modal fade" id="add-user">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Enter Student Information</h4>
                        </div>
                        <form role="form" action="../UserContent/ActionsUsers/ActionRegisterUser.php" onsubmit="return validateForm()"
                            method="post">
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
                                    <input type="hidden" name="user" value="Student">
                                        <input type="text" readonly name="user" class="form-control" value="Student">
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

            <?php include_once "../../UserContent/CommonUser/EditActiveModal.php"; ?>


            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../Database/DisplayAllTableClass.php");
                        $table = "tbl_user_info";
                        $sql = "SELECT * FROM $table WHERE isActive = 1 AND userType = 'Student'";
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
<?php include_once "../CommonUser/JQueryUser.php"; ?>