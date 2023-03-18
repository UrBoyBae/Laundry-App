$(document).ready(function () {
    // $('#my-modalAdd-trigger').on('click', function () {
    //     $('#my-bg-modal-add').addClass('.my-modal-active');
    // });

    // GET All Data
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/laundry-api/public/api/outlets",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#bodyOutlet").append(
                    `
                <tr>
                    <td>` +
                        data.id +
                        `</td>
                    <td>` +
                        data.nama +
                        `</td>
                    <td>` +
                        data.alamat +
                        `</td>
                    <td>` +
                        data.tlp +
                        `</td>
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
            $("#tableOutlet").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4],
                    },
                ],
            });
        },
    });
});
