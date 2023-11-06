<div class="modal fade" id="assign_class_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Enter Student Information</h4>
            </div>
            <div class="modal-body">
                <form id="assign_class_form">
                    <div class="box-body box-warning">
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label for="personal_id">Enter Student:</label>
                                <input type="text" name="personal_id" class="form-control input-xs"
                                    placeholder="Student ID" required>
                            </div>
                            <div class="col-xs-3">
                                <label for="last_name">Enter Last Name:</label>
                                <input type="text" name="last_name" class="form-control input-xs"
                                    placeholder="Last Name" required>
                            </div>
                            <div class="col-xs-3">
                                <label for="first_name">Enter First Name:</label>
                                <input type="text" name="first_name" class="form-control input-xs"
                                    placeholder="First Name" required autocomplete="given-name" />
                            </div>
                            <div class="col-xs-3">
                                <label for="user_middle_initial">Middle Initial</label>
                                <select name="user_middle_initial" id="user_middle_initial"
                                    class="form-control input-xs">
                                    <option value="">-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
                <!-- /.end of form -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal assign class to teacher -->