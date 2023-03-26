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
        url: "http://127.0.0.1/laundry-api/public/api/users",
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $.each(data, function (i, data) {
                $("#bodyUser").append(
                    `
                    <tr>
                        <td>`+ data.id +`</td>
                        <td>`+ data.nama +`</td>
                        <td>`+ data.username +`</td>
                        <td>`+ data.outlet.nama +` - `+ data.outlet.alamat +`</td>
                        <td>`+ data.role.substr(0, 1).toUpperCase() +``+ data.role.substr(1)+`</td>
                        <td>
                        <div class="my-wrap-toggle">
                                <div class="my-trigger-editBtn" id="my-trigger-editBtn" data-modal-edit="`+ data.id +`">
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
            $("#tableUser").DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        target: [1, 2, 3, 4, 5],
                    },
                ],
            });
        },
    });

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
                $("#dataoutlet").append(`
                    <option value="` + data.id + `">` + data.nama + ` - ` + data.alamat + `</option>
                `);
            });
        },
    });

    // Modal Add
    $('#my-modalAdd-trigger').on('click', function () {
        $('#my-bg-modal-add').addClass('my-modal-active');
    });

    $('#addUser').on('click',function() {
        if(($('#nama').val() == "") || ($('#username').val() == "") || ($('#password').val() == "") || ($('#outlet').val() == "") || ($('#role').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#nama').val() == "") && ($('#username').val() == "") && ($('#password').val() == "") && ($('#outlet').val() == "") && ($('#role').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/laundry-api/public/api/users",
                data: {
                    nama : $('#nama').val(),       
                    username : $('#username').val(),       
                    password : $('#password').val(),  
                    id_outlet : $('#outlet').val(),  
                    role : $('#role').val(),  
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
    $('#bodyUser').on('click', '#my-trigger-editBtn', function () {
        const dataEdit = $(this).attr('data-modal-edit')
        
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1/laundry-api/public/api/users/" + dataEdit + "",
            dataType: "json",
            success: function (response) {
                var data = response.data
                $('#iduser').val(data.id)
                $('#datanama').val(data.nama)
                $('#datausername').val(data.username)
                $('#dataoutlet').val(data.id_outlet)
                $('#datarole').val(data.role)
                $('#my-bg-modal-edit').addClass('my-modal-active')
            }
        });
    })

    $('#editUser').on('click', function() {
        if(($('#datanama').val() == "") || ($('#datausername').val() == "") || ($('#dataoutlet').val() == "") || ($('#datarole').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#datanama').val() == "") && ($('#datausername').val() == "") && ($('#dataoutlet').val() == "") && ($('#datarole').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            var dataEdit = $('#iduser').val()

            $.ajax({
                type: "PUT",
                url: "http://127.0.0.1/laundry-api/public/api/users/" + dataEdit + "",
                data: {
                    nama : $('#datanama').val(),       
                    username : $('#datausername').val(),       
                    password : $('#datapassword').val(),  
                    id_outlet : $('#dataoutlet').val(),  
                    role : $('#datarole').val(),  
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
    $('#bodyUser').on('click', '#my-trigger-deleteBtn', function () {
        const dataDelete = $(this).attr('data-modal-delete')
        $('#id').val(dataDelete)
        $('#my-bg-modal-delete').addClass('my-modal-active')
    })

    $('#deleteUser').on('click', function() {
        var dataDelete = $('#id').val()
        $.ajax({
            type: "DELETE",
            url: "http://127.0.0.1/laundry-api/public/api/users/" + dataDelete + "",
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
