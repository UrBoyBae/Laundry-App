$(document).ready(function () {
    var id_transaksi = $("#id_transaksi").val();

    $.ajax({
        type: "GET",
        url:
            "http://127.0.0.1/laundry-api/public/api/transactions/" +
            id_transaksi,
        dataType: "json",
        success: function (response) {
            var data = response.data;
            $('#kodeinvoice').val(data.kode_invoice);
            $('#diskon').val(data.diskon);
            $('#biayatambahan').val(data.biaya_tambahan);
            $('#pajak').val(data.pajak);
        },
    });
});
