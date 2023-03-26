@extends('layouts.adminLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <div class="my-add-btn my-primary-bg" id="my-modalAdd-trigger">
                <i class="uil uil-plus-circle"></i>
                Tambah Data
            </div>
        </div>
        <table id="tableProduct" class="table is-fullwidth">
            <thead>
                <tr>
                    <th>ID Product</th>
                    <th>Outlet</th>
                    <th>Jenis Product</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bodyProduct">

            </tbody>
        </table>
    </div>

    {{-- Modal Add --}}
    <div class="my-bg-modal" id="my-bg-modal-add">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Tambah Product</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal">
                @csrf
                <label class="my-label-input">Outlet</label>
                <div class="my-select-modal">
                    <select name="outlet" id="outlet" required>
                        <option value="" selected disabled>Pilih Outlet</option>
                    </select>
                </div>
                <label class="my-label-input">Jenis Paket</label>
                <div class="my-select-modal">
                    <select name="paket" id="paket" required>
                        <option value="" selected disabled>Pilih Paket</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Lain</option>
                    </select>
                </div>
                <label class="my-label-input">Nama Paket</label>
                <div class="my-input-modal">
                    <input type="text" name="namapaket" id="namapaket" placeholder="Masukkan Nama Paket" autocomplete="off" required>
                </div>
                <label class="my-label-input">Harga</label>
                <div class="my-input-modal" style="margin: 0;">
                    <input type="text" name="harga" id="harga" placeholder="Masukkan Harga" autocomplete="off" required>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <div class="my-closeBtn-modal-add" id="my-close-modal">Close</div> --}}
                <button type="submit" class="my-addBtn-modal-add" id="addProduct">Submit</button>
            </div>
        </div>
    </div>
    
    {{-- Modal Edit --}}
    <div class="my-bg-modal" id="my-bg-modal-edit">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Edit Product</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal">
                @csrf
                <input type="hidden" name="idproduct" id="idproduct" placeholder="Masukkan ID Outlet" autocomplete="off">
                <label class="my-label-input">Outlet</label>
                <div class="my-select-modal">
                    <select name="outlet" id="dataoutlet" required>
                        <option value="" selected disabled>Pilih Outlet</option>
                    </select>
                </div>
                <label class="my-label-input">Jenis Paket</label>
                <div class="my-select-modal">
                    <select name="paket" id="datapaket" required>
                        <option value="" selected disabled>Pilih Paket</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">Lain</option>
                    </select>
                </div>
                <label class="my-label-input">Nama Paket</label>
                <div class="my-input-modal">
                    <input type="text" name="namapaket" id="datanamapaket" placeholder="Masukkan Nama Paket" autocomplete="off" required>
                </div>
                <label class="my-label-input">Harga</label>
                <div class="my-input-modal" style="margin: 0;">
                    <input type="text" name="harga" id="dataharga" placeholder="Masukkan Harga" autocomplete="off" required>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <div class="my-closeBtn-modal-add" id="my-close-modal">Close</div> --}}
                <button type="submit" class="my-addBtn-modal-add" id="editProduct">Submit</button>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div class="my-bg-modal my-bg-modal-delete" id="my-bg-modal-delete">
        <div class="my-content-modal my-content-modal-delete">
            <!-- Modal Form -->
            <div class="my-form-modal">
                <div style="font-size: 24px; width: 100%; text-align: center; padding: 0 40px">Anda yakin akan
                    menghapus data ini?</div>
                <input type="hidden" name="idproduct" id="id" placeholder="Masukkan ID Outlet" autocomplete="off">
                <div class="my-modal-btn">
                    <div class="my-closeBtn-modal-add" id="my-close-modal">Back</div>
                    <button type="submit" class="my-deleteBtn-modal" id="deleteOutlet">Submit</button>
                </div>
            </div>
        </div>
@endsection
