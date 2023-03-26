<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan | Laundry App</title>
    <link rel="icon" href="{{ asset('assets/images/illustrationLogin.png') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="my-wrap-table">
        <table id="tableTransaction" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Invoice</th>
                    <th>Member</th>
                    <th>Tanggal</th>
                    <th>Tenggat</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody id="bodyTransaction">
                @foreach ($transaction as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->kode_invoice}}</td>
                        <td>{{$data->member->nama}}</td>
                        <td>{{$data->tgl}}</td>
                        <td>{{$data->tgl_bayar}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->dibayar}}</td>
                        <td>{{$data->user->nama}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
