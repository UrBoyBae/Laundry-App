$(document).ready(function () {
    // GET All Data
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/transactions",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) { 
                $('#bodyHistoryTransaction').append(`
                <tr>
                    <td>`+ data.id +`</td>
                    <td>`+ data.kode_invoice +`</td>
                    <td>`+ data.outlet.nama +` - `+ data.outlet.alamat +`</td>
                    <td>`+ data.member.nama +` - `+ data.member.alamat +`</td>
                    <td>`+ data.tgl +`</td>
                    <td>`+ data.status.substr(0, 1).toUpperCase() +``+ data.status.substr(1)+`</td>
                    <td>`+ data.user.nama +`</td>
                </tr>
                `)
            });

            $("#tableHistoryTransaction").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4, 5, 6],
                    },
                ],
            });
        }
    });
});