<div class="modal fade" id="add-subj">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Enter Subject Information</h4>
            </div>
            <form id="subjForm">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="subj_name_add">Enter Subject Name:</label>
                            <input type="text" name="subj_name_add" class="form-control" placeholder="Subject Name" required>
                        </div>
                        <div class="form-group">
                            <label for="subj_add_desc">Subject Description:</label>
                            <input type="text" name="subj_add_desc" class="form-control" placeholder="Description" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning pull-left">Add Subj</button>
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>