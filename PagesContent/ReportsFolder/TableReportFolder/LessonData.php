<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning container">
            <div class="box-header with-border">
                <h3 class="box-title">Lesson Data</h3>
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
                <button class="btn btn-success" id='exportButton' data-name="LessonData">EXPORT DATA TO XML</button>
                <br>
                <br>
                <!-- Table Data -->
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Lesson ID</th>
                            <th>lesson Name</th>
                            <th>Category Name</th>
                            <th>Subject Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include_once("../../../Database/ReportsDisplay.php");
                        $lessonData = new ReportsDisplay();
                        $lessonData->displayLesson();
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
<?php include_once "../../../CommonContent/CommonAllScript.php"?>
<?php include_once "../ScriptReportFolder/ExportScript.php"?>