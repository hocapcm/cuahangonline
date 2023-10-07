$(document).ready(function() {
    $('.cart_quantity_input').keyup(function(event) {
        if (event.keyCode === 13) { // Kiểm tra xem người dùng đã nhấn Enter chưa
            event.preventDefault(); // Ngăn chặn mặc định hành vi của Enter
            var form = $(this).closest('form'); // Tìm biểu mẫu gần nhất chứa trường nhập
            form.submit(); // Gửi biểu mẫu
        }
    });

    $('.cart_quantity_down, .cart_quantity_up').click(function(event) {
        event.preventDefault();

        var input = $(this).siblings('.cart_quantity_input');
        var currentQty = parseInt(input.val());

        if ($(this).data('action') === 'add') {
            input.val(currentQty + 1);
        } else if ($(this).data('action') === 'subtract' && currentQty > 1) {
            input.val(currentQty - 1);
        }
    });
});
