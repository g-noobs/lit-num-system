<script>
$(function() {
    $('#quiz_type').on('change', function(){
        var selectedoption =$(this).val();

        var trueFalse = "";
        var multipleChoice = "";

        if(selectedoption === 0){
            $("#set_answer_col").empty();
            $('#answer_options').append();
        }
        else if(selectedoption === 1){
            $("#answer_options").empty();
            $('#answer_options').append();
        }
        else if(selectedoption === 2){
            $("#answer_options").empty();                                
            $('#answer_options').append();
        }
    });
});
</script>                            