<?php 
class ModalArea{
    function addNewArea(){
        echo "<div class='modal fade' id='add_area'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <h4 class='modal-title'>Enter Area's Information</h4>
                </div>
                <form role='form' action='../AreaFolder/ActionArea/ActionRegisterArea.php' onsubmit='return validateForm()' method='post'>
                    <div class='modal-body'>
                        <div class='box-body'>
                            <div class='form-group' id='area_name'>
                                <label for='area_name'>Enter Area Name: </label>
                                <input type='text' name='area_name' class='form-control' placeholder='Area Name'>
                            </div>
                            <div class='form-group' id='area_address'>
                                <label for='area_name'>Area Address: </label>
                                <input type='text' name='area_address' class='form-control' placeholder='Address'>
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

    function archiveArea(){
        echo '<div class="modal fade" id="archive-area">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
                    <form role="form" action="../AreaFolder/ActionArea/ArchiveArea.php" onsubmit="return validateForm()" method="post">
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