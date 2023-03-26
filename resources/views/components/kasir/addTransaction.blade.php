@extends('layouts.kasirLayout')

@section('mainContent')
    <div class="my-addTransaction">
        <span class="my-primary-color">Tambah Transaksi</span>
        @csrf
        <div class="my-addTransaction-form">
            <div class="my-left-form">
                <div class="my-form-modal" style="margin: 0">
                    <label class="my-label-input">Kode Invoice</label>
                    <div class="my-input-modal">
                        <input type="text" name="kodeinvoice" id="kodeinvoice" placeholder="Masukkan Kode Invoice"
                            autocomplete="off" required>
                    </div>
                    <label class="my-label-input">Outlet</label>
                    <div class="my-select-modal">
                        <select name="outlet" id="outlet" required>
                            <option selected disabled>Pilih Outlet</option>
                        </select>
                    </div>
                    <label class="my-label-input">User</label>
                    <div class="my-select-modal">
                        <select name="user" id="user" required>
                            <option selected disabled>Pilih User</option>
                        </select>
                    </div>
                    <label class="my-label-input">Member</label>
                    <div class="my-select-modal">
                        <select name="member" id="member" required>
                            <option selected disabled>Pilih Member</option>
                        </select>
                    </div>
                    <label class="my-label-input">Tanggal</label>
                    <div class="my-input-modal">
                        <input type="date" name="tanggalTransaksi" id="tanggal" placeholder="Masukkan No.Tlp" autocomplete="off"
                            required>
                    </div>
                    <label class="my-label-input">Batas Waktu/Tenggat</label>
                    <div class="my-input-modal">
                        <input type="date" name="bataswaktu" id="tenggat" placeholder="Masukkan No.Tlp" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="my-right-form">
                <div class="my-form-modal" style="margin: 0">
                    <label class="my-label-input">Diskon</label>
                    <div class="my-input-modal">
                        <input type="text" name="diskon" id="diskon" placeholder="Masukkan Diskon" autocomplete="off"
                            required>
                    </div>
                    <label class="my-label-input">Biaya Tambahan</label>
                    <div class="my-input-modal">
                        <input type="text" name="biayatambahan" id="biayatambahan" placeholder="Masukkan Biaya Tambahan"
                            autocomplete="off" required>
                    </div>
                    <label class="my-label-input">Pajak</label>
                    <div class="my-input-modal">
                        <input type="text" name="pajak" id="pajak" placeholder="Masukkan Pajak" autocomplete="off" required>
                    </div>
                    <label class="my-label-input">Status</label>
                    <div class="my-select-modal">
                        <select name="status" id="status" required>
                            <option selected disabled>Pilih Status</option>
                            <option value="baru">Baru</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="diambil">Diambil</option>
                        </select>
                    </div>
                    <label class="my-label-input">Pembayaran</label>
                    <div class="my-select-modal">
                        <select name="pembayaran" id="pembayaran" required>
                            <option selected disabled>Pilih Pembayaran</option>
                            <option value="dibayar">Dibayar</option>
                            <option value="belum_dibayar">Belum Dibayar</option>
                        </select>
                    </div>
                    <label class="my-label-input">Tanggal Bayar</label>
                    <div class="my-input-modal">
                        <input type="date" name="tglbayar" id="tglbayar" placeholder="Masukkan No.Tlp"
                            autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-modal-btn">
            {{-- <button class="my-closeBtn-modal-add">Close</button> --}}
            <button type="submit" class="my-addBtn-modal-add" id="addtransaction">Submit</button>
        </div>
    </div>
@endsection
