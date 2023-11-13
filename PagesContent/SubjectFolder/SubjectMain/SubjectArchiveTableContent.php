<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Module List</h3>
                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <button id="activate_btn" type="button" class="btn btn-success" data-toggle="modal"
                            data-target="">
                            <i class="fa fa-check-circle"></i> <span>Activate</span>
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
            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th><input type='checkbox' id="select-all" class='checkbox'></th>
                            <th>Module ID</th>
                            <th>Module</th>
                            <th>Module Description</th>
                            <th>Module Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplaySubject.php");
                        $subjTable = new DisplaySubject();
                        $subjTable->archivedSubj();
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