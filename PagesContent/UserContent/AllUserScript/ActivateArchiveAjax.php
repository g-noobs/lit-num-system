
            $.ajax({
                type: "POST",
                url: action_url, // Update this with the correct URL
                data: {
                    selectedIds: selectedIds
                },
                success: function(response) {
                    alert(response); // Display a response message
                }
            });