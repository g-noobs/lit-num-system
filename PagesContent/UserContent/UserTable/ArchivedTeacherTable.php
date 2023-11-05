<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Archived Teacher's List</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <button id="activate_btn" type="button" class="btn btn-success" data-toggle="modal"
                            modal-target="">
                            <i class="fa fa-trash"></i> <span>Activate</span>
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="text" id="userInput" class="form-control" placeholder="Search..">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="3"><input type='checkbox' id="select-all" class='checkbox'></th>
                            <th>ID</th>
                            <th>Personal ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>User Type</th>
                            <th>Account Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplayAllTableClass.php");
                        $teacherTable = new DisplayAllTableClass();
                        $status = "Inactive";
                        $teacherTable->displayTeacher($status);
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


<!-- Script for Adding a new user -->
<?php include_once("../CommonUser/AddUserScript.php");?>

<!-- Script for Editing a user -->
<?php include_once("../CommonUser/EditUserScript.php");?>



<!-- Script contain the Dropdown and Search -->
<?php include_once("../CommonUser/JQueryUser.php");?>

<!-- Common Script with other pages -->
<?php include_once "../../../CommonContent/CommonAllScript.php"?>

<!-- Script to see all user data -->
<?php include_once "../CommonUser/ScriptViewUserData.php";?>

<!-- Activate User Script -->
<?php include_once "../AllUserScript/ActivateUserScript.php";?>