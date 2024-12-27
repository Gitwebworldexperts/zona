jQuery(document).ready(function($){
    // When the 'remove' button is clicked
    $('a[data-name="remove"]').on('click', function(e){
        e.preventDefault();

        // Get the associated post ID and ACF field name (using 'pdf_file' here)
        var post_id = $(this).closest('.acf-field').data('post-id');  // Assuming post ID is stored in the closest .acf-field container
        var field_name = 'pdf_file';  // The ACF field name for the PDF file

        // Send AJAX request to WordPress to delete the file
        $.ajax({
            url: ajaxurl,  // WordPress AJAX URL
            type: 'POST',
            data: {
                action: '/wp-admin/admin-ajax.php',  // Custom action hook to process the file removal
                post_id: post_id,
                field_name: field_name,
            },
            success: function(response) {
                // Handle success (maybe hide the file info or update the UI)
                if (response.success) {
                    // Optionally, remove the file info from the DOM
                    $(e.target).closest('.file-wrap').remove();
                } else {
                    alert('Error removing the file.');
                }
            },
            error: function() {
                alert('AJAX error occurred.');
            }
        });
    });
});
