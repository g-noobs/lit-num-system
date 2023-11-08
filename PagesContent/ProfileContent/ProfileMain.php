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
            <a href='#' id="edit-icon" type="button" class="btn btn-primary">Edit<span
                    class='glyphicon glyphicon-edit'></span></a>

            <form id="addUserForm">
                <div class="modal-body">
                    <div class="box-body box-warning">
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
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="phone_num">Phone:</label>
                                    <input type="text" class="form-control input-sm" name="phone_num" id="phone_num"
                                        required>
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
                    </div>
                    <div class="form-group" data-select2-id="41">
                        <label>Multiple</label>
                        <select class="form-control select2 select2-hidden-accessible" multiple=""
                            data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1"
                            aria-hidden="true">
                            <option data-select2-id="42">Alabama</option>
                            <option data-select2-id="43">Alaska</option>
                            <option data-select2-id="44">California</option>
                            <option data-select2-id="45">Delaware</option>
                            <option data-select2-id="46">Tennessee</option>
                            <option data-select2-id="47">Texas</option>
                            <option data-select2-id="48">Washington</option>
                        </select><span
                            class="select2 select2-container select2-container--default select2-container--below"
                            dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span
                                    class="select2-selection select2-selection--multiple" role="combobox"
                                    aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                    <ul class="select2-selection__rendered">
                                        <li class="select2-search select2-search--inline"><input
                                                class="select2-search__field" type="search" tabindex="0"
                                                autocomplete="off" autocorrect="off" autocapitalize="none"
                                                spellcheck="false" role="textbox" aria-autocomplete="list"
                                                placeholder="Select a State" style="width: 469.6px;"></li>
                                    </ul>
                                </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-left">Update Profile</button>
                            <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>