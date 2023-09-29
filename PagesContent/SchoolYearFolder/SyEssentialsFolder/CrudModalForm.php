<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">School Year</h4>
            </div>
            <form role="form" id="form_addsy">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sy_name">School Year Date:</label>
                            <input type="text" name="sy_name" class="form-control">
                            <span class="help-block">Format: YYYY-YYY</span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left" id='btnSubmit'>Add School Year</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">School Year</h4>
            </div>
            <form id="form_editsy">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="sy_id" readonly class="form-control">
                            <label for="sy_name_edit">School Year Date:</label>
                            <input type="text" name="sy_name_edit" class="form-control">
                            <span class="help-block">Format: YYYY-YYY</span>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left" id='btnSubmit'>Add School Year</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="archiveModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-danger"><b>Do you wish to continue on Archiving this data?</b></h4>
            </div>
            <form role="form" action="../PagesContent/SchoolYearFolder/ActionFolder/ArchiveSy.php"
                onsubmit="return validateForm()" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" name="sy_id" readonly class="form-control">
                            <label for="sy_name">School Year Date:</label>
                            <input type="text" readonly name="sy_name" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger pull-left" id='btnSubmit'>Archive</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
