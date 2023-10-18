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