<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>All Active User</h3>
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
                        include_once("../../../Database/DisplayAllTableClass.php");
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