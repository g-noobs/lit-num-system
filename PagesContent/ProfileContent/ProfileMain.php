<?php include_once("../Database/DisplayInfoClass.php");?>

<div class="container"
    style="padding-bottom:30px; border: 2px solid #F4F0EA; border-radius: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="row" style="margin-left:20px;">
        <h3 class="admin-name">Admin Name: 
            <?php $name = new DisplayInfoClass();
            $query = "SELECT * FROM user_info_view WHERE user_info_id = '{$_SESSION['id']}'";
            $name->displayUserName($query);
            ?>
        </h3>
    </div>
    <div class="row" style="margin-left:20px;"><a href='#' id="edit-icon"><span
                class='glyphicon glyphicon-edit'></span></a></div>

    <form role="form" action="../PagesContent/ProfileContent/ActionProfile.php" onsubmit="return validateForm()" method="post">           

        <?php
            $formCont = new DisplayInfoClass();
            $query = "SELECT * FROM user_info_view WHERE user_info_id = '{$_SESSION['id']}'";
            $formCont->displayAdminProfile($query);
        ?>


        <button class="btn btn-primary" id="update-btn" type="submit">Update Profile</button>
    </form>
</div>