<script>
$(function(){
    $(".quiz_info_btn").on('click', function(e){
        e.preventDefault();

        var btn_id = $(this).data('id');
        $('#quiz_id_data').text(btn_id);
        $.ajax({
            type: "POST",
            url: "",
            data: {id: btn_id},
            success: function(response){
                var responseData = JSON.parse(response);

                //modals id


            },
            error:function(){
                console.log('Possible Ajx Issue');
            }
        });
    });
});
</script>