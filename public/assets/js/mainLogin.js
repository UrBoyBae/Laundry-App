$(document).ready(function () {
    $("#login").on("click", function () {
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == "" && password == "") {
            alert("Lengkapi Dahulu Username dan Password");
        } else if (username == "") {
            alert("Username Tidak Boleh Kosong!");
        } else if (password == "") {
            alert("Password Tidak Boleh Kosong!");
        } else {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/laundry-api/public/api/login",
                data: {
                    username: username,
                    password: password,
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        alert(response.message);
                    } else if (response.status == 200) {
                        var data = response.data;
                        
                        if (data.role == "admin") {
                            window.location.href =
                                "http://127.0.0.1/laundry-app/public/dashboard/admin";
                        } else if (data.role == "kasir") {
                            window.location.href =
                                "http://127.0.0.1/laundry-app/public/dashboard/kasir";
                        } else if (data.role == "owner") {
                            window.location.href =
                                "http://127.0.0.1/laundry-app/public/dashboard/owner";
                        }
                    }
                },
            });
        }
    });
});
