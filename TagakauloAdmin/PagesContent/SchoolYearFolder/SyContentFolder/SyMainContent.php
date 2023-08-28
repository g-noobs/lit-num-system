<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Area List</h3>
            </div>
            <!-- /.box-header -->

            <div class="container-fluid">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-plus"></i> <span> Add New S.Y.</span>
                </button>
            </div>
            <br>
            <div class="container-fluid" >
                <a href="#" type="button">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>
            </div>

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover text-center table-condensed">
                    <thead class="bg-warning">
                        <tr>
                            <?php include_once("SyTableheader.php");?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once("../Database/SchoolYearClass.php");
                        $display = new SchoolYearClass();
                        $display->displaySyTable();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>