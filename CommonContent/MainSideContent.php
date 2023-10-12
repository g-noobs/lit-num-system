<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <!-- Avatar Here -->
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
        <li>
            <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <!-- <li>
            <a href="user.php">
                <i class="fa fa-users"></i> <span>Manage User</span>
            </a>
        </li> -->
        <!-- // Tree view for user -->
        <li class="treeview" style="height: auto;">
            <a href="user.php">
                <i class="fa fa-users"></i> <span>Manage User</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li>
                    <a href="user_all.php">
                        <span>All User</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-yelow">
                                <?php 
                                    include_once "../Database/ColumnCountClass.php";
                                    $columnCountClass = new ColumnCountClass();
                                    $sql = "SELECT COUNT(user_info_id) as count FROM tbl_user_info WHERE status_id = 1 AND user_level_id = 1;";
                                    echo $columnCountClass->columnCountNum($sql);
                                ?>
                            </small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="user_admin.php">
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a href="user_teacher.php">
                        <span>Teacher</span>
                    </a>
                </li>
                <li>
                    <a href="user_learner.php">
                        <span>Learner</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- //Tree view for Lesson -->
        <li class="treeview" style="height: auto;">
            <a href="#">
                <i class="fa fa-book"></i> <span>Manage Lesson</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li>
                    <a href="subject.php">
                        <i class="fa fa-list-alt"></i> <span>Subject</span>
                    </a>
                </li>
                <li>
                    <a href="lesson.php">
                        <i class="fa fa-copy"></i> <span>Lesson</span>
                    </a>
                </li>
                <li>
                    <a href="quiz.php">
                        <i class="fa fa-lightbulb-o"></i> <span>Quiz</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="category.php">
                <i class="glyphicon glyphicon-level-up"></i><span>Category</span>
            </a>
        </li>
        <li>
            <a href="class.php">
                <i class="fa fa-sticky-note-o"></i> <span>Class</span>
            </a>
        </li>
        <li>
            <a href="schoolyr.php">
                <i class="fa fa-calendar-check-o"></i> <span> School Year</span>
            </a>
        </li>
        <li>
            <a href="reports.php">
                <i class="fa fa-bar-chart"></i> <span>Reports</span>
            </a>
        </li>
        <!-- <li>
            <a href="learning.php">
                <i class="fa fa-book"></i> <span>Manage Level of Learning</span>
            </a>
        </li> -->

        <!-- <li>
            <a href="batch.php">
                <i class="fa fa-group"></i> <span>Manage Batch</span>
            </a>
        </li> -->

        <!-- <li>k
            <a href="area.php">
                <i class="fa fa-map-marker"></i> <span>Manage Area</span>
            </a>
        </li> -->

        <!-- <li>
            <a href="designation.php">
                <i class="fa fa-user-plus"></i> <span>Manage Designation</span>
            </a>
        </li> -->

    </ul>
</section>
<!-- /.sidebar -->