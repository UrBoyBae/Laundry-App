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
        url: "http://127.0.0.1/laundry-api/public/api/members",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#bodyMember").append(
                    `
                    <tr>
                        <td>`+ data.id_member +`</td>
                        <td>`+ data.nama +`</td>
                        <td>`+ data.alamat +`</td>
                        <td>`+ (data.jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan') +`</td>
                        <td>`+ data.tlp +`</td>
                        <td>
                        <div class="my-wrap-toggle">
                                <div class="my-trigger-editBtn" id="my-trigger-editBtn" data-modal-edit="`+ data.id_member +`">
                                    <i class="uil uil-edit"></i>
                                </div>
                                <div class="my-trigger-deleteBtn" id="my-trigger-deleteBtn"
                                    data-modal-delete="`+ data.id_member +`">
                                    <i class="uil uil-trash-alt"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                `
                );
            });
            $("#tableMember").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4, 5],
                    },
                ],
            });
        },
    });

    // Trigger Modal Add
    $('#my-modalAdd-trigger').on('click', function () {
        $('#my-bg-modal-add').addClass('my-modal-active');
    });

    $('#addMember').on('click',function() {
        if(($('#nama').val() == "") || ($('#alamat').val() == "") || ($('#jk:checked').val() == "") || ($('#tlp').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#nama').val() == "") && ($('#alamat').val() == "") && ($('#jk:checked').val() == "") && ($('#tlp').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/laundry-api/public/api/members",
                data: {
                    nama : $('#nama').val(),       
                    alamat : $('#alamat').val(),       
                    jenis_kelamin : $('#jk:checked').val(),  
                    tlp : $('#tlp').val(),  
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
    });

    // Modal Edit
    $('#bodyMember').on('click', '#my-trigger-editBtn', function () {
        const dataEdit = $(this).attr('data-modal-edit')
        
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1/laundry-api/public/api/members/" + dataEdit + "",
            dataType: "json",
            success: function (response) {
                var data = response.data
                $('#idmember').val(data.id_member)
                $('#datanama').val(data.nama)
                $('#dataalamat').val(data.alamat)
                $('#datajk').val(data.jenis_kelamin)
                $('#datatlp').val(data.tlp)
                $('#my-bg-modal-edit').addClass('my-modal-active')
            }
        });
    })

    $('#editMember').on('click', function() {
        if(($('#datanama').val() == "") || ($('#dataalamat').val() == "") || ($('#datajk').val() == "") || ($('#datatlp').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#datanama').val() == "") && ($('#dataalamat').val() == "") && ($('#datajk').val() == "") && ($('#datatlp').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            var dataEdit = $('#idmember').val()

            $.ajax({
                type: "PUT",
                url: "http://127.0.0.1/laundry-api/public/api/members/" + dataEdit + "",
                data: {
                    nama : $('#datanama').val(),       
                    alamat : $('#dataalamat').val(),       
                    jenis_kelamin : $('#datajk').val(),  
                    tlp : $('#datatlp').val(),     
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
    $('#bodyMember').on('click', '#my-trigger-deleteBtn', function () {
        const dataDelete = $(this).attr('data-modal-delete')
        $('#id').val(dataDelete)
        $('#my-bg-modal-delete').addClass('my-modal-active')
    })

    $('#deleteMember').on('click', function() {
        var dataDelete = $('#id').val()
        $.ajax({
            type: "DELETE",
            url: "http://127.0.0.1/laundry-api/public/api/members/" + dataDelete + "",
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
