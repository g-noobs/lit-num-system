<div class="row">
    <div class="col-xs-12">
        <div class="box container">
            <div class="box-header">
                <h3>Admin</h3>

                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-user">
                            <i class="fa fa-plus"></i> <span>Add Admin</span>
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <div class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="text" id="userInput" class="form-control" placeholder="Search..">
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-header -->

            <!-- /.modal for Edit User-->

            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "AllTableHeader.php";?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../../../Database/DisplayAllTableClass.php");

                        $table = "user_info_view";
                        $sql = "SELECT * FROM $table WHERE user_level_description = 'Admin' AND status = 'Active'";
                        $userT = new DisplayAllTableClass();
                        $userT->userTable($sql);
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>

<!-- Jquery-- on user.php DOM> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!--// *This will disable the personal id input field if selected user is admin-->
<script>
$(document).ready(function() {

    $('#user, #edit_user_option').on('change', function() {
        var selectedUser = $(this).val();

        var $personalIdinput = $('#personal-id, #edit_personal_i');
        var $personalIdFrmGrp = $("#personal_id_form, #edit_personal_id_form");

        if (selectedUser === 'Admin') {
            // Set personal_id as readonly and set its value to a default
            $personalIdinput.prop("disabled", true);
            $personalIdFrmGrp.fadeOut();


        } else {
            // If another option is selected, remove readonly and clear the value
            $personalIdinput.prop("disabled", false);
            $personalIdFrmGrp.fadeIn();
        }
    });
});
</script>


<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var userType = $(this).data('user-type');
        var contentPath = '';

        if (userType === 'all-active') {
            contentPath = '../PagesContent/UserContent/UserTable/AllActiveUserTable.php';
        } else if (userType === 'teacher') {
            contentPath = '../PagesContent/UserContent/UserTable/TeacherTableContent.php';
        } else if (userType === 'learner') {
            contentPath = '../PagesContent/UserContent/UserTable/StudentTableContent.php';
        } else if (userType === 'admin') {
            contentPath = '../PagesContent/UserContent/UserTable/AdminTableContent.php';
        } else if (userType === 'arch-all') {
            contentPath = '../PagesContent/UserContent/UserTable/AllArchUsersTable.php';
        } else if (userType === 'arch-admin') {
            contentPath = '../PagesContent/UserContent/UserTable/ArchiveAdminTable.php';
        } else if (userType === 'arch-teacher') {
            contentPath = '../PagesContent/UserContent/UserTable/ArchivedTeacherTable.php';
        } else if (userType === 'arch-learner') {
            contentPath = '../PagesContent/UserContent/UserTable/ArchivedStudentTable.php';
        }
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
        if (contentPath !== '') {
            $("#mainContent").fadeOut(400, function() {
                $(this).load(contentPath, function() {
                    $(this).fadeIn(400);
                });
            });
        }
    });
});
</script>

<!-- CSV for hiding and showing upload batch form -->
<script>
$(function() {
    $('#frmCsvGroup').hide();
    $('#csvUploadIcon').click(function() {
        $('#frmCsvGroup').fadeToggle("slow");
    });
});
</script>