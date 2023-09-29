<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h2>All user List</h2>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                            <i class="fa fa-plus"></i> <span> Add User</span>
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


            <br>


            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        $query = "SELECT * FROM user_info_view";

                        $userT = new DisplayAllTableClass();
                        $userT->userTable($query);
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