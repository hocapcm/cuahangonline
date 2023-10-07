function updateStatus(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var newStatus = selectedOption.value;
    var orderCode = selectedOption.getAttribute('data-order-code');

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("order/updateAll/") ?>' + orderCode, // Adjust the URL as needed
        data: {
            status: newStatus
        },
        success: function(response) {
            // Handle the success response, e.g., display a success message
            console.log('Status updated successfully');
        },
        error: function() {
            // Handle the error, e.g., display an error message
            console.error('Failed to update status');
        }
    });
}
