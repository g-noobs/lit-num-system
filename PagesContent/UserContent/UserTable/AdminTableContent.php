<style>
.table thead {
    position: sticky;
    top: 0;
    background-color: #fff;
    /* Set your preferred background color */
}
</style>

<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Admin</h3>

                <div class="row">
                    <div class="col-xs-6">
                        <button id="btnAddAdmin" type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#add_user_modal">
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
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Type</th>
                                <th>Account Status</th>
                                <!-- <th>Actions</th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        $adminTable = new DisplayAllTableClass();
                        $status = "Active";
                        $adminTable->displayAdmin($status);
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

<!-- Jquery-- on user.php DOM> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>