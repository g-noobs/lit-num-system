<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning container">
            <div class="box-header with-border">
                <h3 class="box-title">Subject Data</h3>
                <div class="box-tools pull-right">
                    <div class="search-box" style="margin-right: 35px;">
                        <i class="fa fa-search"></i>
                        <input type="text" id="userInput" class="form-control" placeholder="Search..">
                    </div>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <!-- export button -->
                <button class="btn btn-success" id='exportButton' data-name="SubjectData">EXPORT DATA</button>
                <br>
                <br>
                <!-- Table Data -->
                <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover tex-center">
                    <thead>
                        <tr>
                            <th>Module ID</th>
                            <th>Module Name</th>
                            <th>Module Description</th>
                            <th>Date Added</th>
                            <th>Added (by ID)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include_once("../../../Database/ReportsDisplay.php");
                        $subjectData = new ReportsDisplay();
                        $subjectData->displayModule();
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


<!-- Common Script with other pages -->
<?php include_once "../../../CommonContent/CommonAllScript.php"?>
<?php include_once "../ScriptReportFolder/ExportScript.php"?>