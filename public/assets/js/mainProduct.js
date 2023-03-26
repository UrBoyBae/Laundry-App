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
                        <td>`+ (data.jenis == 'bed_cover' ? 'Bedcover' : (data.jenis == 'kiloan' ? 'Kiloan' : (data.jenis == 'selimut' ? 'Selimut' : (data.jenis == 'kaos' ? 'Kaos' : (data.jenis == 'lain' ? 'Lain' : ''))))) +`</td>
                        <td>`+ data.nama_paket +`</td>
                        <td>`+ data.harga +`</td>
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

    $('#addProduct').on('click',function() {
        if(($('#outlet').val() == "") || ($('#paket').val() == "") || ($('#namapaket').val() == "") || ($('#harga').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#outlet').val() == "") && ($('#paket').val() == "") && ($('#namapaket').val() == "") && ($('#harga').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/laundry-api/public/api/packages",
                data: {
                    id_outlet : $('#outlet').val(),       
                    jenis : $('#paket').val(),       
                    nama_paket : $('#namapaket').val(),  
                    harga : $('#harga').val(),  
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
    $('#bodyProduct').on('click', '#my-trigger-editBtn', function () {
        const dataEdit = $(this).attr('data-modal-edit')
        
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1/laundry-api/public/api/packages/" + dataEdit + "",
            dataType: "json",
            success: function (response) {
                var data = response.data
                $('#idproduct').val(data.id)
                $('#dataoutlet').val(data.id_outlet)
                $('#datapaket').val(data.jenis)
                $('#datanamapaket').val(data.nama_paket)
                $('#dataharga').val(data.harga)
                $('#my-bg-modal-edit').addClass('my-modal-active')
            }
        });
    })

    $('#editProduct').on('click', function() {
        if(($('#dataoutlet').val() == "") || ($('#datapaket').val() == "") || ($('#datanamapaket').val() == "") || ($('#dataharga').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#dataoutlet').val() == "") && ($('#datapaket').val() == "") && ($('#datanamapaket').val() == "") && ($('#dataharga').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            var dataEdit = $('#idproduct').val()

            $.ajax({
                type: "PUT",
                url: "http://127.0.0.1/laundry-api/public/api/packages/" + dataEdit + "",
                data: {
                    id_outlet : $('#dataoutlet').val(),       
                    jenis : $('#datapaket').val(),       
                    nama_paket : $('#datanamapaket').val(),  
                    harga : $('#dataharga').val(),         
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
    $('#bodyProduct').on('click', '#my-trigger-deleteBtn', function () {
        const dataDelete = $(this).attr('data-modal-delete')
        $('#id').val(dataDelete)
        $('#my-bg-modal-delete').addClass('my-modal-active')
    })

    $('#deleteOutlet').on('click', function() {
        var dataDelete = $('#id').val()
        $.ajax({
            type: "DELETE",
            url: "http://127.0.0.1/laundry-api/public/api/packages/" + dataDelete + "",
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
