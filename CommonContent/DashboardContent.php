<div class="row">
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    
      <div class="inner">
        <h3>
          <?php 
                include_once "../Database/ColumnCountClass.php";
                $columnCountClass = new ColumnCountClass();
                echo $columnCountClass->columnCount("user_info_Id","tbl_user_info");
        ?>
        </h3>
        <p>Total # of Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="../pages/user_all.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>
        <?php 
                include_once "../Database/ColumnCountClass.php";
                $columnCountClass = new ColumnCountClass();
                $sql = "SELECT COUNT(lesson_id) as count FROM tbl_lesson;";
                echo $columnCountClass->columnCountNum($sql);
        ?>
      </h3>
      <p>Lesson</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="../pages/lesson.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>
        <?php 
                include_once "../Database/ColumnCountClass.php";
                $columnCountClass = new ColumnCountClass();
                $sql = "SELECT COUNT(user_info_id) as count FROM tbl_user_info WHERE status_id = 1 AND user_level_id = 1;";
                echo $columnCountClass->columnCountNum($sql);
        ?>
      </h3>

      <p>Teachers</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="../pages/user_teacher.php" id="teacher-count" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>65</h3>

      <p>Guest Access</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="../pages/reports.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
</div>
<!-- /.row -->

