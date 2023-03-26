@extends('layouts.kasirLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <a href="{{asset('/addTransaction/kasir')}}">
                <div class="my-add-btn my-primary-bg">
                    <i class="uil uil-plus-circle"></i>
                    Tambah Data
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bodyTransaction">

            </tbody>
        </table>
    </div>

    {{-- Modal Delete --}}
    <div class="my-bg-modal my-bg-modal-delete" id="my-bg-modal-delete">
        <div class="my-content-modal my-content-modal-delete">
            <!-- Modal Form -->
            <div class="my-form-modal">
                <div style="font-size: 24px; width: 100%; text-align: center; padding: 0 40px">Anda yakin akan
                    menghapus data ini?</div>
                <input type="hidden" name="idtransaction" id="id" placeholder="Masukkan ID Outlet" autocomplete="off">
                <div class="my-modal-btn">
                    <div class="my-closeBtn-modal-add" id="my-close-modal">Back</div>
                    <button type="submit" class="my-deleteBtn-modal" id="deleteTransaction">Submit</button>
                </div>
            </div>
        </div>
@endsection
