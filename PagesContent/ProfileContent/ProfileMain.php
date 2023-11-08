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

            <form id="edit_profile_form" method="post">

                <div class="form-group row">
                    <div class="col-xs-5">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="col-xs-5">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="middle_name">Middle Initial <span>*optional</span></label>
                        <select name="middle_name" id="middle_name" class="form-control">
                            <option value="-">-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <label for="gender">Select Gender:</label>
                    <select class="form-control" name="gender">
                        <option>MALE</option>
                        <option>FEMALE</option>
                        <option>None</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Enter Email Address:</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="date">Select Birthday:</label>
                    <input type="date" name="date" class="form-control" id="exampleInputPassword1"
                        placeholder="Birthdate">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="text" name="password" class="form-control" placeholder="Passoword">
                </div>
                <button class="btn btn-primary pull-left" id="update-btn" type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</div>