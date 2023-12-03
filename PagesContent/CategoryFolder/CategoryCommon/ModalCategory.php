<div class='modal fade' id='add_category_modal'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h4 class='modal-title'>Enter Category's Information</h4>
            </div>
            <form id="add_category_form">
                <div class='modal-body'>
                    <div class='box-body'>
                        <div class='form-group' id='ctgy_name'>
                            <label for='category_name'>Enter Category Name: </label>
                            <input type='text' name='category_name' class='form-control' placeholder='Category Name'>
                        </div>

                        <div class="form-group" id='ctgy_info'>
                            <label for="comment">Category Description: </label>
                            <textarea class="form-control w-100" name='category_description' rows="5" placeholder='Description'></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div> <!-- Missing closing div tag for modal-body -->
                <div class='modal-footer'>
                    <button type='submit' class='btn btn-primary pull-left'>Add New Category</button>
                    <button type='reset' class='btn btn-default pull-left' data-dismiss='modal'>Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ADD User -->

<div class="modal fade" id="archive-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
                <form role="form" action="../AreaFolder/ActionArea/ArchiveCategory.php" onsubmit="return validateForm()"
                    method="post">
                    <div class="form-group">
                        <input type="text" readonly name="category_input" class="form-control" id="exampleInputEmail1">
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