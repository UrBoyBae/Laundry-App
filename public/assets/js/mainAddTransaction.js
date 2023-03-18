$(document).ready(function () {
    // GET Data Outlet
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/outlets",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#outlet").append(`
                    <option value="` + data.id + `">` + data.nama + ` - ` + data.alamat + `</option>
                `);
            });
        },
    });

    // GET Data User
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/users",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#user").append(`
                    <option value="` + data.id + `">` + data.nama + `</option>
                `);
            });
        },
    });

    // GET Data Member
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/members",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#member").append(`
                    <option value="` + data.id + `">` + data.nama + ` - ` + data.alamat + `</option>
                `);
            });
        },
    });
});
