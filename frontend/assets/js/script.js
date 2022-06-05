//frontend/assets/js/script.js

$(document).ready(function (){
    $('.add-to-cart').click(function () {
        event.preventDefault();
        // Lấy id sản phẩm hiện tại đang click
        var product_id = $(this).attr('data-id');
        // Gọi ajax để php xử lý
        $.ajax({
            url: 'index.php?controller=cart&action=add',
            method: 'GET',
            data: {
                product_id: product_id
            },
            success: function (data) {
                console.log(data);
                // Hiển thị ra 1 message
                $('.ajax-message').html('Product added to cart successfully!');
                $('.ajax-message').addClass('ajax-message-active');

                //Ẩn message sau 3s
                setTimeout(function () {
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000);

                var cart_total = $('.cart-amount').text();
                cart_total++;
                $('.cart-amount').html(cart_total);
            }
        });
    })
    $('.add-to-cart-detail').click(function () {
        event.preventDefault();
        // Lấy id sản phẩm hiện tại đang click
        var product_id = $(this).attr('data-id');
        // Gọi ajax để php xử lý
        $.ajax({
            url: 'index.php?controller=cart&action=add',
            method: 'GET',
            data: {
                product_id: product_id
            },
            success: function (data) {
                console.log(data);
                // Hiển thị ra 1 message
                $('.ajax-message').html('Product added to cart successfully!');
                $('.ajax-message').addClass('ajax-message-active');

                //Ẩn message sau 3s
                setTimeout(function () {
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000);

                var cart_total = $('.cart-amount').text();
                cart_total++;
                $('.cart-amount').html(cart_total);
            }
        });
    })
})
