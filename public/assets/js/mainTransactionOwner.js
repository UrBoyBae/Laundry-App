$(document).ready(function () {
    var base_url = 'http://127.0.0.1/laundry-app/public'

    // GET All Data
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/transactions",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) { 
                $('#bodyTransaction').append(`
                <tr>
                <td>`+ data.id +`</td>
                <td>`+ data.kode_invoice +`</td>
                <td>`+ data.member.nama +` - `+ data.member.alamat +`</td>
                <td>`+ data.tgl.substr(0, 10) +`</td>
                <td>`+ data.batas_waktu.substr(0, 10) +`</td>
                <td><div id="status" class="my-status"><span id="title-status">` +
                    data.status.substr(0, 1).toUpperCase() +
                    `` +
                    data.status.substr(1) +
                    `</span></div></td>
                <td>`+ (data.dibayar == 'dibayar' ? 'Dibayar' : 'Belum Dibayar')  +`</td>
                <td>`+ data.user.nama +`</td>
                </tr>
                `)
            });

            $("#tableTransaction").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4, 5, 6, 7],
                    },
                ],
            });

            // Status Badge
            const titleStatus = document.querySelectorAll("span#title-status");
            const statusBadge = document.querySelectorAll("div#status");
            console.log(titleStatus);
            for (var i = 0; i < titleStatus.length; i++) {
                if (titleStatus[i].innerHTML === "Baru") {
                    statusBadge[i].classList.add("my-baru-status");
                } else if (titleStatus[i].innerHTML === "Proses") {
                    statusBadge[i].classList.add("my-proses-status");
                } else if (titleStatus[i].innerHTML === "Selesai") {
                    statusBadge[i].classList.add("my-selesai-status");
                } else if (titleStatus[i].innerHTML === "Diambil") {
                    statusBadge[i].classList.add("my-diambil-status");
                }
            }
        }
    });
});