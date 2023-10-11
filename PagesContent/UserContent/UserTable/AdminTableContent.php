<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Admin</h3>

                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                            <i class="fa fa-plus"></i> <span>Add Admin</span>
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

            <div class="box-body">
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
                        $sql = "SELECT * FROM $table WHERE user_level_description = 'Admin' AND status = 'Active'";
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

<!-- Jquery-- on user.php DOM> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php include_once "../CommonUser/ArchiveActivateUserScript.php";?>
<?php include_once "../CommonUser/ArchiveActivateUserScript.php";?>
<?php include_once "../CommonUser/JQueryUser.php";?>