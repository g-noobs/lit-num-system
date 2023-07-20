



<div class="row">
    <div class="col-xs-12">
        <div class="box-header">
            <h3 class="box-title">Area List</h3>
        </div>
        <!-- /.box-header -->

        <div class="container-fluid">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add_area">
                <i class="fa fa-plus"></i> <span> Add New Area</span>
            </button>
        </div>
        <br>

        <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <?php include_once("TableHeader.php");?>
                    </tr>
                </thead>
                <tbody>
                    <?php include_once("../Database/TableAreaClass.php");
                        $display = new TableAreaClass();
                        $query = "SELECT * FROM tbl_area";
                        $display->tableArea($query);
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
