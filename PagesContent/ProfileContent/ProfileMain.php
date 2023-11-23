<div class="container">
    <div class="box box-warning container">
        <div class="box-header with-border">
            <h3 class="box-title"><b style="color:#3D3848;">Admin Profile</b></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                    data-original-title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""
                    data-original-title="Remove">
                    <i class="fa fa-times"></i>
                </button> -->
            </div>
        </div>
        <div class="box-body">
            <button id="edit-icon" type="button" class="btn btn-primary">
                <i class='glyphicon glyphicon-edit'></i><span>Edit</span>
            </button>

            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible" id="edit_user_validate_alert" role="alert"
                        style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <span id="edit_user_validate_alert_text">test alerttext</span>
                    </div>
                </div>
            </div>

            <form id="editUserForm">
                <div class="modal-body">
                    <div class="box-body box-warning">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="last_name">Enter Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="first_name">Enter First Name:</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                        required autocomplete="given-name" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="user_middle_initial">M.I. (**optional)</label>
                                    <input type="text" name="user_middle_initial" class="form-control" maxlength="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="gender">Select Gender:</label>
                                    <select class="form-control" name="gender" placeholder="Gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="phone_num">Phone:</label>
                                    <input type="text" class="form-control" name="phone_num" id="phone_num" required
                                        maxlength="13">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email">Enter Email Address:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required
                                        autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="username:">Username: </label>
                                    <input type="text" name="username" id="username" required class="form-control"
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" required class="form-control"
                                        placeholder="Password">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="togglePassword">
                                            <span class="glyphicon glyphicon-eye-open" id="password-icon"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="confirm_pass">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="confirmPassword" id="confirmPassword" required
                                        class="form-control" placeholder="Confirm Password">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="toggleConfirmPassword">
                                            <span class="glyphicon glyphicon-eye-open"
                                                id="confirm-password-icon"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-left" id="update-btn">Update
                                Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>