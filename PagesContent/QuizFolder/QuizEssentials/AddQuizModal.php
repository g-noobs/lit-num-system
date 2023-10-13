<div class="modal fade" id="add_quiz_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Enter Initial Quiz Information</h4>
            </div>
            <form id="addQuizForm">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="quiz_name_label">Quiz Name</label>
                            <input type="text" name="quiz_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="quiz_instruction_label">Quiz Instruction</label>
                            <input type="text" name="quiz_instruction" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="topic_id_label">Select a level of Category</label>
                            <select class="form-control" name="topic_id">
                                <?php include_once("../Database/QuizDisplayClass.php");
                                    $topicList = new QuizDisplayClass();
                                    $topicList->displayTopicOption();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning pull-left">Add Quiz</button>
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>