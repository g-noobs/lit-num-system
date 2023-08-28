<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Student</h3>
            </div>
            <!-- /.box-header -->

            <div class="container-fluid">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                    <i class="fa fa-plus"></i> <span> Add Learner</span>
                </button>
            </div>

            
            <?php include_once "../../../PagesContent/UserContent/CommonUser/ModalClass.php"; 
                $btnName = "Update";
                $editActive = new ModalClass();
                $editActive->editModal($btnName);

                $addAdmin= new ModalClass();
                $addAdmin->addUserModal("Add Learner", "Learner");

            ?>


            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover table-condensed text-center">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplayAllTableClass.php");
                        $table = "user_info_view";
                        $sql = "SELECT * FROM $table WHERE user_level_description = 'Learner' AND status = 'Active';";
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