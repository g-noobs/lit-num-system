<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin</h3>
            </div>
            <!-- /.box-header -->

            <div class="container-fluid">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                    <i class="fa fa-plus"></i> <span>Add Admin</span>
                </button>
                <!--
                <button type="button" class="btn bg-maroon margin" data-toggle="modal" data-target="#remove-user">
                    <i class="fa fa-minus"></i> <span></span> <span></span>
                </button>
            -->
            </div>
            <br>

     
            <!-- /.modal ADD User-->
            <?php include_once "../../../PagesContent/UserContent/CommonUser/ModalClass.php"; 
                $btnName = "Update";
                $editActive = new ModalClass();
                $editActive->editModal($btnName);

                $addAdmin= new ModalClass();
                $addAdmin->addUserModal("Add User", "Admin");

            ?>
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



<?php include_once "../CommonUser/JQueryUser.php"; ?>
