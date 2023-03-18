$(document).ready(function () {
    // GET All Data
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/packages",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#bodyProduct").append(
                    `
                    <tr>
                        <td>`+ data.id +`</td>
                        <td>`+ data.outlet.nama +` - `+ data.outlet.alamat +`</td>
                        <td>`+ data.jenis +`</td>
                        <td>`+ data.nama_paket +`</td>
                        <td>`+ data.harga +`</td>
                        <td>
                        <div class="my-wrap-toggle">
                                <div class="my-trigger-editBtn" id="my-trigger-editBtn" data-modal-edit="my-bg-modal-edit-1">
                                    <i class="uil uil-edit"></i>
                                </div>
                                <div class="my-trigger-deleteBtn" id="my-trigger-deleteBtn"
                                    data-modal-delete="my-bg-modal-delete-1">
                                    <i class="uil uil-trash-alt"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                `
                );
            });
            $("#tableProduct").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4, 5],
                    },
                ],
            });
        },
    });
});
