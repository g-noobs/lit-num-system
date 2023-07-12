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
            <!-- /.modal ADD User-->

            <?php include_once "../../UserContent/CommonUser/ModalClass.php";
                $btnName = "Update";
                $editActive = new ModalClass();
                $editActive->editModal($btnName,'');

                $addNewUser = new ModalClass();
                $addNewUser->addAnyModal();

            ?>
             <!-- /.modal EditActive User-->

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../Database/DisplayAllTableClass.php");
                        $table = "user_info_view";
                        $sql = "SELECT * FROM $table WHERE status = 'Active'";
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