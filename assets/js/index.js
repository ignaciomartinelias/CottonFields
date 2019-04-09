$(function () {
    var form = $("#ajax-contact");
    var formMessages = $("#form-messages");

    $(form).submit(function (event) {
        // Hide form
        event.preventDefault();
        var formData = $(form).serialize();
        $.ajax({
            type: "POST",
            url: $(form).attr("action"),
            data: formData
        })
            .done(function (response) {
                // Make sure that the formMessage div has the 'success' message
                $(formMessages).removeClass("message-fail");
                $(formMessages).fadeIn();
                setTimeout(() => {
                    $(formMessages).fadeOut();
                }, 2500);

                // Clear the form
                $("#nombre").val("");
                $("#email").val("");
                $("#telefono").val("");
                $("#mensaje").val("");
            })
            .fail(function (data) {
                $(formMessages).addClass("message-fail");
                $(formMessages).text(
                    "Hubo un error con el envio de su formulario. Por favor intente mas tarde"
                );
                $(formMessages).fadeIn();
                setTimeout(() => {
                    $(formMessages).fadeOut();
                }, 2500);
            });
    });
});

$(window).scroll(function () {
    if ($(this).scrollTop() > $(document).height() - $(window).height() - 300) {
        $('.boton-subir').fadeIn();
    } else {
        $('.boton-subir').fadeOut();
    }
});