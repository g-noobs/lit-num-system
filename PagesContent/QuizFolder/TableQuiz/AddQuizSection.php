<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning container">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <br>
            <form id="addQuizForm" action="post">
                <div class="box-body" style="overflow-y: scroll; max-height: 400px;">

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="quiz_type">Type of Quiz</label>
                                <select name="quiz_type" id="quiz_type_id" class="form-control" requried>
                                    <option value="0">Multiple Choice</option>
                                    <option value="1">True or False</option>
                                    <option value="2">Essay</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="question" class="control-label">Description:</label>
                                <textarea name="question" id="question" cols="60" rows="5" class="form-control"
                                    style="resize: vertical;" required></textarea>
                            </div>
                        </div>
                        <div class="col-xs-6" id="options">

                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <button id="submit" class="btn btn-warning">Submit</button>
                    <button id="reset-cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


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