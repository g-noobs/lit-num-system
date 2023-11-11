<div class="modal fade" id="add_user_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Enter user Information</h4>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible" id="add_user_modal_alert" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <span id="add_user_modal_alert_text">test alerttext</span>
                    </div>
                </div>
            </div>
            
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="box-body box-warning">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="last_name">Enter Last Name:</label>
                                    <input type="text" name="last_name" class="form-control input-sm" placeholder="Last Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="first_name">Enter First Name:</label>
                                    <input type="text" name="first_name" class="form-control input-sm" placeholder="First Name"
                                        required autocomplete="given-name" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="user_middle_initial">M.I. (**optional)</label>
                                    <input type="text" name="user_middle_initial" id="user_middle_initial" class="form-control input-sm"  maxlength="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="gender">Select Gender:</label>
                                    <select class="form-control input-sm" name="gender" placeholder="Gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="phone_num">Phone:</label>
                                    <input type="tel" class="form-control input-sm" name="phone_num" id="phone_num" placeholder="Phone Number" required maxlength="13">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email">Enter Email Address:</label>
                                    <input type="email" name="email" class="form-control input-sm" placeholder="Email" required
                                        autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-left"  data-user-level="Admin">Add Admin</button>
                            <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ADD User -->