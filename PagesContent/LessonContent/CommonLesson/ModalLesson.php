<div class="modal fade" id="add_lesson">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter Lesson Information</h4>
            </div>
            <form role="form" action="../PagesContent/LessonContent/ActionLesson/ActionAddLesson.php"
                onsubmit="return validateForm()" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="lesson_name">Lesson Name</label>
                            <input type="text" name="lesson_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="level_learning">Select a level of Category</label>
                            <select class="form-control" name="level_learning">
                                <?php include_once("../Database/LessonDisplayClass.php");
                                    $categoryList = new LessonDisplayClass();
                                    $categoryList->displayCategoryList();
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning pull-left">Add Lesson</button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>