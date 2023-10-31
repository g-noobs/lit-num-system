<div class="modal fade" id="add_learner_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Enter user Information</h4>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="box-body box-warning">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="personal_id">Enter Student:</label>
                                    <input type="text" name="personal_id" class="form-control input-sm"
                                        placeholder="Student ID" required>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="last_name">Enter Last Name:</label>
                                    <input type="text" name="last_name" class="form-control input-sm"
                                        placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="first_name">Enter First Name:</label>
                                    <input type="text" name="first_name" class="form-control input-sm"
                                        placeholder="First Name" required autocomplete="given-name" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="user_middle_initial">Middle Initial</label>
                                    <select name="user_middle_initial" id="user_middle_initial"
                                        class="form-control input-sm">
                                        <option value="">-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="gender">Select Gender:</label>
                                    <select class="form-control input-sm" name="gender" placeholder="Gender" required>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control input-sm"
                                        data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                        data-mask="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email">Enter Email Address:</label>
                                    <input type="email" name="email" class="form-control input-sm" placeholder="Email"
                                        required autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <h4><strong>Address:</strong></h4>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div clas="form-group">
                                    <label for="street_address">Street</label>
                                    <input type="text" name="street_address" class="form-control input-sm"
                                        placeholder="Street" required autocomplete="street-address" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Barangay">Baranggay</label>
                                    <input type="text" name="barangay_address" class="form-control input-sm"
                                        placeholder="Barangay" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="city">City</label>
                                <input type="text" name="city_address" class="form-control input-sm" placeholder="City"
                                    required autocomplete="address-level2" />
                            </div>
                            <div class="col-sm-4">
                                <label for="province">Province</label>
                                <input type="text" name="province_address" class="form-control input-sm"
                                    placeholder="Province" required autocomplete="address-level1" />
                            </div>
                            <div class="col-sm-4">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" name="zip_code_address" class="form-control input-sm"
                                    placeholder="Zip Code" required autocomplete="postal-code" />
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-left">Add Admin</button>
                                <button type="reset" class="btn btn-default pull-right"
                                    data-dismiss="modal">Cancel</button>
                            </div>
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