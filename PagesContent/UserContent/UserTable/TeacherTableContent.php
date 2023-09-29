<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Teacher</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                            <i class="fa fa-plus"></i> <span>Add Teacher</span>
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
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplayAllTableClass.php");
                        $table = "user_info_view";
                        $sql = "SELECT * FROM $table WHERE user_level_description = 'Teacher' AND status = 'Active';";
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