$(function () {

    $("[data-action]").click(function (e) {
        e.preventDefault();
        var data = $(this).data();

        $.post(data.action, data, function (cart) {
            ajaxCart(cart);
        }, "json");
    });

    function ajaxCart(cart) {
        var cart_message = $(".cart_message");
        var cart_amount = $(".cart_amount");
        var cart_total = $(".cart_total");
        var formater = Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"
        });

        if (cart.message) {
            cart.message.fadeOut(200, function () {
                $(this).html(cart.message).fadeIn(200);
            });
        } else {
            cart_message.fadeOut(200);
        }

        if (cart.items) {

        } else {

        }

        if (cart.amount) {

        } else {

        }

        if (cart.total) {

        } else {

        }

    }
});