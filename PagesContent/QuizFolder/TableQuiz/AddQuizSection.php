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
<script>
$(function() {
    $('#quiz_type_option').on('change', function() {

        
        var selectedoption = $(this).val();
        
        var trueFalse = "";
        var multipleChoice = "<div class='form-group'>" +
            "<label for='quiz_answer'>Set the Correct Answer</label>" +
            "<select name='quiz_answer' id='quiz_answer'>" +
            "<option></option>" +
            "<option></option>" +
            "<option></option>" +
            "<option></option>" +
            "</select>" +
            "<small>*Choose the correct answer based on the option provided</small>" +
            "</div>" +
            "<div class='row'>" +
            "<div class='col-xs-6'>" +
            "<div class='form-group'>" +
            "<label for='option1'>Option 1</label>" +
            "<input type='text' name='option1'>" +
            "</div>" +
            "<div class='form-group'>" +
            "<label for='option2'>Option 2</label>" +
            "<input type='text' name='option2'>" +
            "</div>" +
            "</div>" +
            "<div class='col-xs-6'>" +
            "<div class='form-group'>" +
            "<label for='option3'>Option 3</label>" +
            "<input type='text' name='option3'>" +
            "</div>" +
            "<div class='form-group'>" +
            "<label for='option4'>Option 4</label>" +
            "<input type='text' name='option4'>" +
            "</div>" +
            "</div>" +
            "</div>";

        // Now 'multipleChoice' contains your HTML code as a single string, ready to be appended or manipulated.

        // by default place 
        $('#answer_col_right').append(multipleChoice);
        if (selectedoption === '0') {
            $("#answer_col_right").empty();
            $('#answer_col_right').append(multipleChoice);
        } else if (selectedoption === '1') {
            $("#answer_col_right").empty();
            
        } else if (selectedoption === '2') {
            $("#answer_col_right").empty();
            
        }
    });
});
</script>

<script>
$(document).ready(function() {
    // Cache the select element and its options
    var $quizAnswer = $("#quiz_answer");
    var $quizOptions = $quizAnswer.find("option");

    // Cache the input fields
    var $option1 = $("input[name='option1']");
    var $option2 = $("input[name='option2']");
    var $option3 = $("input[name='option3']");
    var $option4 = $("input[name='option4']");

    // Function to update the options based on input values
    function updateQuizAnswerOptions() {
        var optionValues = [];

        // Push the values of input fields to the array
        optionValues.push($option1.val());
        optionValues.push($option2.val());
        optionValues.push($option3.val());
        optionValues.push($option4.val());

        // Update the select options with the new values
        $quizOptions.each(function(index) {
            $(this).text(optionValues[index]);
            $(this).val(optionValues[index]);
        });
    }

    // Call the function when any of the input fields change
    $option1.on("input", updateQuizAnswerOptions);
    $option2.on("input", updateQuizAnswerOptions);
    $option3.on("input", updateQuizAnswerOptions);
    $option4.on("input", updateQuizAnswerOptions);
});
</script>




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