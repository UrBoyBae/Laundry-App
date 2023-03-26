$(document).ready(function () {
    var id_transaksi = $("#id_transaksi").val();

    // GET Data Detail Transaction
    $.ajax({
        type: "GET",
        url:
            "http://127.0.0.1/laundry-api/public/api/transactions/" +
            id_transaksi,
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $('#kodeinvoice').val(data.kode_invoice);
            $('#outlet').append(`
                <option selected value="` + data.outlet.id + `">`+ data.outlet.nama +` - `+ data.outlet.alamat +`</option>
            `);
            $('#user').append(`
            <option selected value="` + data.user.id + `">`+ data.user.nama +`</option>
            `);
            $('#member').append(`
            <option selected value="` + data.member.id + `">`+ data.member.nama +` - `+ data.member.alamat +`</option>
            `);
            $('#tanggal').val(data.tgl)
            $('#tenggat').val(data.batas_waktu)
            $('#diskon').val(data.diskon);
            $('#biayatambahan').val(data.biaya_tambahan);
            $('#pajak').val(data.pajak);
            $('#status').append(`
            <option selected value="` + data.status + `">`+ (data.status == 'baru' ? 'Baru' : (data.status == 'proses' ? 'Proses' : (data.status == 'selesai' ? 'Selesai' : (data.status == 'diambil' ? 'Diambil' : 'Data Kosong')) )) +`</option>
            `);
            $('#pembayaran').append(`
            <option selected value="` + data.dibayar + `">`+ (data.dibayar == 'dibayar' ? 'Dibayar' : 'Belum Dibayar') +`</option>
            `);
            $('#tglbayar').val(data.tgl_bayar);
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

    // Edit Transaction
    $('#editTransaction').on('click',function() {
        if(($('#kodeinvoice').val() == "") || ($('#outlet').val() == "") || ($('#user').val() == "") || ($('#member').val() == "") || ($('#tanggal').val() == "") || ($('#tenggat').val() == "") || ($('#diskon').val() == "") || ($('#biayatambahan').val() == "") || ($('#pajak').val() == "") || ($('#status').val() == "") || ($('#pembayaran').val() == "") || ($('#tglbayar').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else if(($('#kodeinvoice').val() == "") && ($('#outlet').val() == "") && ($('#user').val() == "") && ($('#member').val() == "") && ($('#tanggal').val() == "") && ($('#tenggat').val() == "") && ($('#diskon').val() == "") && ($('#biayatambahan').val() == "") && ($('#pajak').val() == "") && ($('#status').val() == "") && ($('#pembayaran').val() == "") && ($('#tglbayar').val() == "")){
            alert('Lengkapi Data Terlebih Dahulu')
        } else {
            var id_transaksi = $("#id_transaksi").val();
    
            $.ajax({
                type: "PUT",
                url: "http://127.0.0.1/laundry-api/public/api/transactions/" +
                id_transaksi,
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
    });
});
