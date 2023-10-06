<style>
/* Custom class for navbar */
.btn-li {
    margin-top: 10.5px;
    /* Center items vertically */
    
}
table {
  overflow-y: scroll; 
}
table {
  height: 150px;
  overflow-y: scroll;
}
</style>

<?php include_once ("../PagesContent/ClassContent/ClassEssentials/ModalClass.php");
    include_once ("../CommonPHPClass/ModifiedSearchStyle.php");
?>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                
                <div class="container-fluid">
                    
                </div>
                

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th style='white-space: nowrap;'></th>
                                        <th>Class ID</th>
                                        <th>Class Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include_once("../Database/ClassEssentialsClass.php");
                                        $classTable = new ClassEssentialsClass();
                                        $sql = "SELECT * FROM tbl_class;";
                                        $classTable->classTable($sql);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>