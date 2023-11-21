<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning container">
            <div class="box-header with-border">
                <h3 class="box-title">Student Data</h3>
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
                <button class="btn btn-success" id='exportButton' data-name="StudentData">EXPORT DATA</button>
                <br>
                <br>
                <!-- Table Data -->
                <table id="dataTable" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Initial</th>
                            <th>Gender</th>
                            <th>Phone#</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Guardian Last Name</th>
                            <th>Guardian First Name</th>
                            <th>Guardian Contact Number</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include_once("../Database/ReportsDisplay.php");
                        $stduentData = new ReportsDisplay();
                        $stduentData->fullStudentData();
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


<!-- Common Script with other pages -->
<?php include_once "../CommonContent/CommonAllScript.php"?>
<?php include_once "../PagesContent/ReportsFolder/ScriptReportFolder/ExportScript.php"?>