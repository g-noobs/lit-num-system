<style>
/* Custom class for navbar */
.btn-li {
    margin-top: 10.5px;
    /* Center items vertically */
}
</style>

<?php include_once "../ClassContent/ClassEssentials/ModalClass.php";?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">

                <nav class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="btn-li">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-class">
                                <i class="fa fa-plus"></i> <span> Add Class</span>
                            </button>
                        </li>
                        <li>
                            <form class="navbar-form">
                                <div class="form-group form-group-custom">
                                    <div class="input-group" style="border: 3px solid #E58A00; border-radius: 10px;">
                                        <span class="input-group-addon" style="background-color: white;"><i
                                                class="glyphicon glyphicon-search" style="color: #E58A00;"></i></span>
                                        <input type="text" class="form-control" id="userInput" placeholder="Search"
                                            style="outline: none; border:none; box-shadow: none;">
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </nav>


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
                                        include_once("../Database/TableDisplayClass.php");
                                        $classTable = new TableDisplayClass();
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