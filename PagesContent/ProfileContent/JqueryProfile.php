<script>
$(document).ready(function() {
    var editMode = false; // Flag to track the edit mode status

    // Hide the update button initially
    $('#update-btn').hide();
    $('input, select').prop('readonly', true).prop('disabled', true);

    // Function to toggle the edit mode
    function toggleEditMode() {
        if (editMode) {
            // If edit mode is active, hide the update button and disable the inputs
            $('#update-btn').hide();
            $('input').prop('readonly', true).prop('disabled', true);
            $('select').prop('readonly', true).prop('disabled', false);
            
        } else {
            // If edit mode is inactive, show the update button and enable the inputs
            $('#update-btn').show();
            $('input, select').prop('readonly', false).prop('disabled', false);
        }
        editMode = !editMode; // Toggle the edit mode flag
    }

    // Enable input and show the update button when edit icon is clicked
    $('#edit-icon').click(function() {
        toggleEditMode();
    });

    // Hide the update button when the update button is clicked
    $('#update-btn').click(function() {
        $(this).hide();
    });
});
</script>






<!-- hide password srcript -->
<script>
$(document).ready(function() {
    $('#togglePassword').click(function() {
        var passwordInput = $('#password');
        var passwordIcon = $('#password-icon');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            passwordIcon.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
        } else {
            passwordInput.attr('type', 'password');
            passwordIcon.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $('#toggleConfirmPassword').click(function() {
        var passwordInput = $('#confirmPassword');
        var passwordIcon = $('#confirm-password-icon');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            passwordIcon.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
        } else {
            passwordInput.attr('type', 'password');
            passwordIcon.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
        }
    });
});
</script>