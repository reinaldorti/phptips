$(function () {
    $("form").submit(function (e) {
        e.preventDefault();
        form = $(this);

        $(".result").fadeOut(200, function () {
            $(this).html(form.serialize()).fadeIn(200);
        });
    });
});