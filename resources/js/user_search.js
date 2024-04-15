$(document).ready(function() {

    // Listen for input in the search input field
    $('#search-input').on('input', function() {
        // Get the value entered in the search input field
        var searchValue = $(this).val();

        // Make an AJAX request to the server
        $.ajax({
            type: 'GET',
            url: '/admin/user-search', // Update the URL with your actual search endpoint
            data: { query: searchValue }, // Pass the search query to the server
            success: function(response) {
                $('#user-table-body').html(response);
            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                console.error(error);
            }
        });
    });
});
