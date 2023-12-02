<div class="modal fade" id="add-subj">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Enter Module Information</h4>
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
            <form id="subjForm">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="subj_name_add">Enter Module Name:</label>
                            <input type="text" name="subj_name_add" class="form-control" placeholder="Module Name" required>
                        </div>
                        <div class="form-group">
                            <label for="subj_add_desc">Module Description:</label>
                            <textarea  type="text" name="subj_add_desc" class="form-control" rows="10" cols="30" placeholder="Description" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning pull-left" id="submit_btn">Add Module</button>
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>