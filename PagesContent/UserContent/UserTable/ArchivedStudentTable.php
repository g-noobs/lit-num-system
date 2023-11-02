<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Archived Learner's List</h3>
                <div class="row">
                    <div class="col-xs-6">
                        
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
                <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplayAllTableClass.php");
                        $status = "Inactive";
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


<!-- Script for Adding a new user -->
<?php include_once("../CommonUser/AddUserScript.php");?>

<!-- Script for Editing a user -->
<?php include_once("../CommonUser/EditUserScript.php");?>

<!-- Script for Archive and Activate a user -->
<?php include_once("../CommonUser/ArchiveActivateUserScript.php");?>

<!-- Script contain the Dropdown and Search -->
<?php include_once("../CommonUser/JQueryUser.php");?>

<!-- Common Script with other pages -->
<?php include_once "../../../CommonContent/CommonAllScript.php"?>

<!-- Script to see all user data -->
<?php include_once "../CommonUser/ScriptViewUserData.php";?>