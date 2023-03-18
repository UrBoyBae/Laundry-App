@extends('layouts.kasirLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <a href="{{asset('/addTransaction/kasir')}}" style="margin-right: 10px">
                <div class="my-add-btn my-primary-bg">
                    <i class="uil uil-print"></i>
                    Convert To PDF
                </div>
            </a>
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

    {{-- Modal Add --}}
    {{-- <div class="my-bg-modal" id="my-bg-modal-add">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Tambah Outlet</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <form action="">
                <div class="my-form-modal">
                    @csrf
                    <label class="my-label-input">ID Outlet</label>
                    <div class="my-input-modal">
                        <input type="text" name="idOutlet" id="idOutlet" placeholder="Masukkan ID Outlet" autocomplete="off">
                    </div>
                    <label class="my-label-input">Nama Outlet</label>
                    <div class="my-input-modal">
                        <input type="text" name="namaOutlet" placeholder="Masukkan Nama Outlet" autocomplete="off" required>
                    </div>
                    <label class="my-label-input">Alamat</label>
                    <div class="my-input-modal">
                        <input type="text" name="alamatOutlet" placeholder="Masukkan Alamat Outlet" autocomplete="off" required>
                    </div>
                    <label class="my-label-input">No.Tlp</label>
                    <div class="my-input-modal" style="margin: 0;">
                        <input type="text" name="tlpOutlet" placeholder="Masukkan No.Tlp" autocomplete="off" required>
                    </div>
                </div>

                <div class="my-modal-btn">
                    <button class="my-closeBtn-modal-add">Close</button>
                    <button type="submit" class="my-addBtn-modal-add">Submit</button>
                </div>
            </form>
        </div>
    </div> --}}
@endsection
