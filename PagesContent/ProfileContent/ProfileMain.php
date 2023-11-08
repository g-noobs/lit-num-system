<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Title</h3>
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
    <div class="box-body" style="">
        <div class="row" style="margin-left:20px;"><a href='#' id="edit-icon"><span
                    class='glyphicon glyphicon-edit'></span></a></div>

        <form id="edit_profile_form" method="post">

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                    placeholder="First Name" value="'.$row['first_name'].'">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last Name"
                    value="'.$row['last_name'] .'">
            </div>
            <div class="form-group">
                <label for="gender">Select Gender:</label>
                <select class="form-control" name="gender" value="'.$row['gender'].' placeholder="'.$row[' gender'].'">
                    <option>MALE</option>
                    <option>FEMALE</option>
                    <option>None</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Enter Email Address:</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email"
                    value="'.$row['email'].'">
            </div>
            <div class="form-group">
                <label for="date">Select Birthday:</label>
                <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="Birthdate"
                    value="'.$row['birthdate'].'">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username"
                    value="'.$row['username'].'">
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Passoword"
                    value="'.$row['password'].'">
            </div>
            <button class="btn btn-primary pull-left" id="update-btn" type="submit">Update Profile</button>
            <button class="btn btn-default pull-left" id="cancel_btn">Cancel</button>
        </form>


    </div>
</div>