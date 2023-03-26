$(document).ready(function () {
    // All Modal Close
    var closeModal = document.querySelectorAll("div#my-close-modal");
    closeModal.forEach(function(buttonClose) {
        buttonClose.onclick = function () {
            buttonClose.closest(".my-bg-modal").classList.remove("my-modal-active");
        };
    });

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
                    <td>
                        <div class="my-wrap-toggle">
                            <a href="` + base_url + `/editTransaction/kasir/`+ data.id + `">    
                                <div class="my-trigger-editBtn" id="my-trigger-editBtn" data-modal-edit="my-bg-modal-edit-1">
                                    <i class="uil uil-edit"></i>
                                </div>
                            </a>
                            <div class="my-trigger-deleteBtn" id="my-trigger-deleteBtn"
                                data-modal-delete="`+ data.id +`">
                                <i class="uil uil-trash-alt"></i>
                            </div>
                        </div>
                    </td>
                </tr>
                `)
            });

            $("#tableTransaction").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4, 5, 6, 7, 8],
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

    // Modal Delete
    $('#bodyTransaction').on('click', '#my-trigger-deleteBtn', function () {
        const dataDelete = $(this).attr('data-modal-delete')
        $('#id').val(dataDelete)
        $('#my-bg-modal-delete').addClass('my-modal-active')
    })

    $('#deleteTransaction').on('click', function() {
        var dataDelete = $('#id').val()
        $.ajax({
            type: "DELETE",
            url: "http://127.0.0.1/laundry-api/public/api/transactions/" + dataDelete + "",
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    alert(response.message);
                    location.reload()
                } else if(response.status == 400){
                    alert(response.message);
                    location.reload()
                }
            }
        });
    })
});