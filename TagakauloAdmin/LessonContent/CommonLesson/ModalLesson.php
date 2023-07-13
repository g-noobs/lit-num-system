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
                        <div class="form-group">
                            <label for="user">Object Type:</label>
                            <select class="form-control" name="objective_id">
                                <option value="" selected disabled hidden>Object Id</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user">Topic:</label>
                            <select class="form-control" name="topic_id">
                                <option value="" selected disabled hidden>Topic Id</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>

                        <div class="form-group">
                             <label for="user">Pick a Date:</label>
                            <input type="date" name="date_added" class="form-control" id="exampleInputPassword1"
                                placeholder="Date Added">
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