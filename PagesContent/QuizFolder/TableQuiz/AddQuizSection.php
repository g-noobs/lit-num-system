<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning container">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Add new Quiz Question</strong></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <form id="addQuizForm" action="post">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="quiz_type_option">Type of Quiz</label>
                                <select name="quiz_type_option" id="quiz_type_option" class="form-control" requried>
                                    <option value="0">Multiple Choice</option>
                                    <option value="1">True or False</option>
                                    <option value="2">Essay</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quiz_question" class="control-label">Description:</label>
                                <textarea name="quiz_question" id="quiz_question" cols="60" rows="5"
                                    class="form-control" style="resize: vertical;" required></textarea>
                            </div>
                        </div>
                        <div class="col-xs-6" id="answer_col_right">
                            
                        </div>
                    </div>
                    <div class=row>
                        <button id="submit" class="btn btn-warning">Submit</button>
                        <button id="reset-cancel" type="reset" class="btn btn-default">Cancel</button>
                    </div>
                </form>
                <!-- /..End of Form -->
            </div>
        </div>
        <!-- /.. End of box body -->
    </div>
</div>
<!-- /.. End of row for AddQuizSection-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





<!-- <form id="addQuizForm">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-group">
                <label for="quiz_name_label">Quiz Name</label>
                <input type="text" name="quiz_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quiz_question_label">Quiz Question</label>
                <input type="text" name="quiz_question" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="topic_id_label">Select Topic</label>
                <select class="form-control" name="topic_id">
                    // database options
                </select>
            </div>
            <div class="form-group">
                <label for="quiz_type_label">Quiz Type</label>
                <select class="form-control" name="quiz_type" id="quiz_type_option">
                    <option value="1">Multiple Choice</option>
                    <option value="2">True or False</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning pull-left">Add Quiz</button>
            <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</form> -->