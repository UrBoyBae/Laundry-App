@extends('layouts.ownerLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <a href="{{asset('/transaction/print')}}" target="_blank">
                <div class="my-add-btn my-primary-bg">
                    <i class="uil uil-print"></i>
                    Convert To PDF
                </div>
            </a>
        </div>
        <table id="tableTransaction" class="table is-fullwidth">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
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

            </tbody>
        </table>
    </div>
@endsection
