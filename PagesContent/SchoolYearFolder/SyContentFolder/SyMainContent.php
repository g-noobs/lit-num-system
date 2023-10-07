<?php include_once ("../CommonPHPClass/ModifiedSearchStyle.php");?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Area List</h3>
            </div>
            <!-- /.box-header -->
            <br>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addModal">
                            <i class="fa fa-plus"></i> <span> Add New S.Y.</span>
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="text" id="userInput" class="form-control" placeholder="Search..">
                        </div>
                    </div>

                </div>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <a href="#" id="set-sy" type="button" data-toggle="tooltip" title="Set School Yr!"
                            style="color:burlywood">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <br>
                        <button id="update-sy" type="button" class="btn btn-sm btn-success">
                            </i> <span> Update Active S.Y.</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <?php include_once("SyTableHeader.php");?>
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