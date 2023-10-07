<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
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
            alert('Status updated successfully');
        },
        error: function() {
            // Handle the error, e.g., display an error message
            console.error('Failed to update status');
        }
    });

}


</script>

</body>
</html>