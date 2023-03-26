$(document).ready(function () {

    // All Modal Close
    var closeModal = document.querySelectorAll("div#my-close-modal");
    closeModal.forEach(function(buttonClose) {
        buttonClose.onclick = function () {
            buttonClose.closest(".my-bg-modal").classList.remove("my-modal-active");
        };
    });

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
                            <div class="my-trigger-editBtn" id="my-modalEdit-trigger" data-modal-edit="`+ data.id +`">
                                <i class="uil uil-edit"></i>
                            </div>
                            <div class="my-trigger-deleteBtn" id="my-trigger-deleteBtn"
                                data-modal-delete="`+ data.id +`">
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

            $('#idOutlet').val(data[data.length-1].id+1)
        },
    });

    // Modal Add
    $('#my-modalAdd-trigger').on('click', function () {
        $('#my-bg-modal-add').addClass('my-modal-active');
    });

    $('#addOutlet').on('click', function() {
        if(($('#namaOutlet').val() == "") || ($('#alamatOutlet').val() == "") || ($('#tlpOutlet').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#namaOutlet').val() == "") && ($('#alamatOutlet').val() == "") && ($('#tlpOutlet').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/laundry-api/public/api/outlets",
                data: {
                    nama : $('#namaOutlet').val(),       
                    alamat : $('#alamatOutlet').val(),       
                    tlp : $('#tlpOutlet').val(),       
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == 201){
                        alert(response.message);
                        location.reload()
                    } else if(response.status == 400){
                        alert(response.message);
                        location.reload()
                    }
                }
            });
        }
    })

    // Modal Edit
    $('#bodyOutlet').on('click', '#my-modalEdit-trigger', function () {
        const dataEdit = $(this).attr('data-modal-edit')
        
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1/laundry-api/public/api/outlets/" + dataEdit + "",
            dataType: "json",
            success: function (response) {
                var data = response.data
                $('#idoutlet').val(data.id)
                $('#namaoutlet').val(data.nama)
                $('#alamatoutlet').val(data.alamat)
                $('#tlpoutlet').val(data.tlp)
                $('#my-bg-modal-edit').addClass('my-modal-active')
            }
        });
    })

    $('#editOutlet').on('click', function() {
        if(($('#namaoutlet').val() == "") || ($('#alamatoutlet').val() == "") || ($('#tlpoutlet').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#namaoutlet').val() == "") && ($('#alamatoutlet').val() == "") && ($('#tlpoutlet').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            var dataEdit = $('#idoutlet').val()

            $.ajax({
                type: "PUT",
                url: "http://127.0.0.1/laundry-api/public/api/outlets/" + dataEdit + "",
                data: {
                    nama : $('#namaoutlet').val(),       
                    alamat : $('#alamatoutlet').val(),       
                    tlp : $('#tlpoutlet').val(),       
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == 202){
                        alert(response.message);
                        location.reload()
                    } else if(response.status == 400){
                        alert(response.message);
                        location.reload()
                    }
                }
            });
        }
    })

    // Modal Delete
    $('#bodyOutlet').on('click', '#my-trigger-deleteBtn', function () {
        const dataDelete = $(this).attr('data-modal-delete')
        $('#id').val(dataDelete)
        $('#my-bg-modal-delete').addClass('my-modal-active')
    })

    $('#deleteOutlet').on('click', function() {
        var dataDelete = $('#id').val()
        $.ajax({
            type: "DELETE",
            url: "http://127.0.0.1/laundry-api/public/api/outlets/" + dataDelete + "",
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
