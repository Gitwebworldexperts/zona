$(document).ready(function() {

    // Handle category checkbox change
    $('.category').change(function() {
        // Collect checked category values
        var checkedValues = [];
        $('.category:checked').each(function() {
            checkedValues.push($(this).val());
        });

        // Collect search term value
        var searchTerm = $('#search').val().trim();

        // Send AJAX request with both categories and search term
        filterPosts(searchTerm, checkedValues);
    });

    // Handle search input keyup
    $('#search').on('keyup', function() {
        var searchTerm = $(this).val().trim();

        // Collect checked category values
        var checkedValues = [];
        $('.category:checked').each(function() {
            checkedValues.push($(this).val());
        });

        // Send AJAX request with both categories and search term
        filterPosts(searchTerm, checkedValues);
    });

    // Function to handle the AJAX request
    function filterPosts(searchTerm, checkedValues) {
        $.ajax({
            type: 'POST',
            url: ajaxfilter.ajaxurl,
            data: {
                action: 'filter_posts',
                searchData: searchTerm,
                categories: checkedValues
            },
            success: function(response) {
                // Update search results with the response from the server
                $('#search-results').html(response);
            }
        });
    }

});
