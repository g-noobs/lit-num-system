<?php 
class ModalClass{

    function addUserModal($btnName,$value){
        echo '<div class="modal fade" id="add-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Enter Learners Information</h4>
                </div>
                <form role="form" action="../UserContent/ActionsUsers/ActionRegisterUser.php" onsubmit="return validateForm()"
                    method="post">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group" id="personal-id">
                                <label for="personal_id">Enter ID:</label>
                                <input type="text" name="personal_id" class="form-control" placeholder="ID">
                            </div>
                            <div class="form-group">
                                <label for="first_name">Enter First Name:</label>
                                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Enter Last Name:</label>
                                <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="gender">Select Gender:</label>
                                <select class="form-control" name="gender" placeholder="Gender">
                                    <option value="" selected disabled hidden>Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>None</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Email Address:</label>
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="date">Select Birthday:</label>
                                <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="Birthdate">
                            </div>
                            <div class="form-group">
                                <label for="user">Select Type of User:</label>
                                <input type="hidden" name="user" value="'. $value .'" id="user">
                                <input type="text" readonly id="user" name="user" class="form-control" value="'. $value .'">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-left">'.$btnName.'</button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal ADD User -->
    ';
    }

    function editModal($btnName){
        echo    '<div class="modal fade" id="edit-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Enter the Preferred Information</h4>
                    <form role="form" action="../UserContent/ActionsUsers/ActionArchiveUser.php" method="post">
                        <div class="form-group">
                            <input type="text" name="userId" class="form-control" style="display: none;">
                            <button type="submit" class="btn btn-danger pull-left btn-sm">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </div>
                    </form>
                </div>
                <form role="form" action="../UserContent/ActionsUsers/ActionEditUser.php" onsubmit="return validateForm()" method="post">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group" id="personal-id">
                                <label for="personal_id">Enter ID:</label>
                                <input type="text" name="personal_id" class="form-control" id="exampleInputEmail1" placeholder="ID">
                            </div>
                            <div class="form-group">
                                <label for="first_name">Enter First Name:</label>
                                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Enter Last Name:</label>
                                <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>None</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Birthdate:</label>
                                <input type="date" name="date" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="user">User:</label>
                                <select class="form-control" name="user" id="user">
                                    <option>Admin</option>
                                    <option>Teacher</option>
                                    <option>Learner</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-left">'.$btnName.'</button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal for Edit User -->
    ';
    }

    function addAnyModal(){
        echo '<div class="modal fade" id="add-user">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">User Information</h4>
                        </div>
                        <form role="form" action="../UserContent/ActionsUsers/ActionRegisterUser.php" onsubmit="return validateForm()"
                            method="post">
                            <div class="modal-body">
                                <div class="form-group" id="personal-id">
                                    <label for="personal_id">Enter ID:</label>
                                    <input type="text" name="personal_id" class="form-control" placeholder="ID">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Enter First Name:</label>
                                    <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Enter Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Last Name">
                                </div>                
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" name="gender" placeholder="Gender">
                                        <option value = "" selected disabled hidden>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>None</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="date">Birthdate:</label>
                                    <input type="date" name="date" class="form-control" id="exampleInputPassword1"
                                        placeholder="Birthdate">
                                </div>
                                <div class="form-group">
                                    <label for="user">User Type:</label>
                                    <select class="form-control" name="user" id="user">
                                        <option>Admin</option>
                                        <option>Teacher</option>
                                        <option>Learner</option>
                                    </select>
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
            </div>';
    }
    function activateUserModal(){
        echo    '<div class="modal fade" id="activate-user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure you wanted to activate this user?</h4>
                                <form role="form" action="../UserContent/ActionsUsers/ActionActivateUser.php" method="post">
                                    <div class="form-group">
                                        <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                                        <button type="submit" class="btn btn-success pull-left">Activate</button>
                                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal for Activate User-->';
    }
    function archiveUserModal(){
        echo    '<div class="modal fade" id="archive-user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
                                <form role="form" action="../UserContent/ActionsUsers/ActionArchiveUser.php" method="post">
                                    <div class="form-group">
                                        <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                                        <button type="submit" class="btn btn-danger pull-left">Archive</button>
                                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal for Activate User-->';
    }

}
?>