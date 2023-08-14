<?php 
class ModalCategory{
    function addNewCategory(){
        echo "<div class='modal fade' id='add_area'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <h4 class='modal-title'>Enter Area's Information</h4>
                </div>
                <form role='form' action='../CategoryFolder/ActionCategory/ActionRegisterCategory.php' onsubmit='return validateForm()' method='post'>
                    <div class='modal-body'>
                        <div class='box-body'>
                            <div class='form-group' id='ctgy_name'>
                                <label for='category_name'>Enter Category Name: </label>
                                <input type='text' name='category_name' class='form-control' placeholder='Category Name'>
                            </div>
                            <div class='form-group' id='ctgy_info'>
                                <label for='category_info'>Category Information: </label>
                                <input type='text' name='category_info' class='form-control' placeholder='Information'>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div> <!-- Missing closing div tag for modal-body -->
                    <div class='modal-footer'>
                        <button type='submit' class='btn btn-primary pull-left'>Register</button>
                        <button type='reset' class='btn btn-default pull-left' data-dismiss='modal'>Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal ADD User -->
    ";}

    function archiveCategory(){
        echo '<div class="modal fade" id="archive-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
                    <form role="form" action="../AreaFolder/ActionArea/ArchiveCategory.php" onsubmit="return validateForm()" method="post">
                        <div class="form-group">
                            <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                            <button type="submit" class="btn btn-danger pull-left">Archive</button>
                            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal for Activate User-->';
    }
}
?>