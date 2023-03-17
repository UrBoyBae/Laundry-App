$(document).ready(function () {
    $("#login").on("click", function () {
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/laundry-api/public/api/login",
            data: {
                username: username,
                password: password,
            },
            dataType: "json",
            success: function (response) {
            }
        });
    });
});
