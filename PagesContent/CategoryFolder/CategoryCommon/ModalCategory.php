<div class='modal fade' id='add_category_modal'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h4 class='modal-title'>Enter Category's Information</h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible" id="add_user_modal_alert" role="alert"
                        style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <span id="add_user_modal_alert_text"></span>
                    </div>
                </div>
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
                            <textarea class="form-control w-100" name='category_description' rows="5"
                                placeholder='Description'></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div> <!-- Missing closing div tag for modal-body -->
                <div class='modal-footer'>
                    <button type='submit' class='btn btn-primary pull-left' id="submit_btn">Add New Category</button>
                    <button type='reset' class='btn btn-default pull-left' data-dismiss='modal'>Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ADD User -->