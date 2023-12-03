<?php include_once ("../CommonPHPClass/ModifiedSearchStyle.php");?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" id="add_category_btn" data-toggle="tooltip" title="Add new Category!">
                            <i class="fa fa-plus"></i> <span></span>
                        </button>
                        <button id="archive_btn" type="button" class="btn btn-danger" data-toggle="tooltip" title="Archive Category!">
                            <i class="glyphicon glyphicon-trash"></i> <span></span>
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
            <br>

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <?php include_once("TableHeader.php");?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once("../Database/TableCategoryClass.php");
                        $display = new TableCategoryClass();
                        $query = "SELECT * FROM tbl_category WHERE category_status = 1;";
                        $display->tableCategory($query);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>