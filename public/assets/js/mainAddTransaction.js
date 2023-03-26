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
                    <option value="` + data.id_member + `">` + data.nama + ` - ` + data.alamat + `</option>
                `);
            });
        },
    });

    // Add Transaction
    $('#addtransaction').on('click',function() {
        if(($('#kodeinvoice').val() == "") || ($('#outlet').val() == "") || ($('#user').val() == "") || ($('#member').val() == "") || ($('#tanggal').val() == "") || ($('#tenggat').val() == "") || ($('#diskon').val() == "") || ($('#biayatambahan').val() == "") || ($('#pajak').val() == "") || ($('#status').val() == "") || ($('#pembayaran').val() == "") || ($('#tglbayar').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#kodeinvoice').val() == "") && ($('#outlet').val() == "") && ($('#user').val() == "") && ($('#member').val() == "") && ($('#tanggal').val() == "") && ($('#tenggat').val() == "") && ($('#diskon').val() == "") && ($('#biayatambahan').val() == "") && ($('#pajak').val() == "") && ($('#status').val() == "") && ($('#pembayaran').val() == "") && ($('#tglbayar').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1/laundry-api/public/api/transactions",
                data: {
                    id_outlet : $('#outlet').val(),       
                    kode_invoice : $('#kodeinvoice').val(),       
                    id_member : $('#member').val(),  
                    tgl : $('#tanggal').val(),  
                    batas_waktu : $('#tenggat').val(),  
                    tgl_bayar : $('#tglbayar').val(),  
                    biaya_tambahan : $('#biayatambahan').val(),  
                    diskon : $('#diskon').val(),  
                    pajak : $('#pajak').val(),  
                    status : $('#status').val(),  
                    dibayar : $('#pembayaran').val(),  
                    id_user : $('#user').val(),  
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
});
