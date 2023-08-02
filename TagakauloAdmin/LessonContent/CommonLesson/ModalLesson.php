<div class="modal fade" id="add-lesson">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter Lesson Information</h4>
            </div>
            <form role="form" action="../LessonContent/ActionLesson/ActionAddLesson.php"
                onsubmit="return validateForm()" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user">Lesson Type:</label>
                            <select class="form-control" name="lesson_name">
                                <option value="" selected disabled hidden>Lesson</option>
                                <option>Folklore</option>
                                <option>Numbers</option>
                                <option>Letters</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Add Lesson</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>