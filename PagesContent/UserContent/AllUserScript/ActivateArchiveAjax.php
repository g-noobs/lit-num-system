
            $.ajax({
                type: "POST",
                url: action_url, // Update this with the correct URL
                data: {
                    selectedIds: selectedIds
                },
                success: function(response) {
                    $modalControl.modal('hide');
                    alert(response); // Display a response message
                },
                error: function() {
                    $modalControl.modal('hide');
                    alert('Error');
                }
            });