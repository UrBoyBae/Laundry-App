@extends('layouts.adminLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <div class="my-add-btn my-primary-bg" id="my-modalAdd-trigger" data-target="hai">
                <i class="uil uil-plus-circle"></i>
                Tambah Data
            </div>
        </div>
        <table id="tableOutlet" class="table is-fullwidth">
            <thead>
                <tr>
                    <th>ID Outlet</th>
                    <th>Nama Outlet</th>
                    <th>Alamat Outlet</th>
                    <th>No.Tlp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bodyOutlet">

            </tbody>
        </table>
    </div>

    {{-- Modal Add --}}
    <div class="my-bg-modal" id="my-bg-modal-add">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Tambah Outlet</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal">
                @csrf
                <label class="my-label-input">ID Outlet</label>
                <div class="my-input-modal">
                    <input type="text" name="idOutlet" id="idOutlet" placeholder="Masukkan ID Outlet" autocomplete="off"
                        readonly>
                </div>
                <label class="my-label-input">Nama Outlet</label>
                <div class="my-input-modal">
                    <input type="text" name="namaOutlet" id="namaOutlet" placeholder="Masukkan Nama Outlet"
                        autocomplete="off" required>
                </div>
                <label class="my-label-input">Alamat</label>
                <div class="my-input-modal">
                    <input type="text" name="alamatOutlet" id="alamatOutlet" placeholder="Masukkan Alamat Outlet"
                        autocomplete="off" required>
                </div>
                <label class="my-label-input">No.Tlp</label>
                <div class="my-input-modal" style="margin: 0;">
                    <input type="text" name="tlpOutlet" id="tlpOutlet" placeholder="Masukkan No.Tlp" autocomplete="off"
                        required>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <div class="my-closeBtn-modal-add" id="my-close-modal">Close</div> --}}
                <button type="submit" class="my-addBtn-modal-add" id="addOutlet">Submit</button>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="my-bg-modal" id="my-bg-modal-edit">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Edit Outlet</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal">
                @csrf
                <label class="my-label-input">ID Outlet</label>
                <div class="my-input-modal">
                    <input type="text" name="idOutlet" id="idoutlet" placeholder="Masukkan ID Outlet" autocomplete="off"
                        readonly>
                </div>
                <label class="my-label-input">Nama Outlet</label>
                <div class="my-input-modal">
                    <input type="text" name="namaOutlet" id="namaoutlet" placeholder="Masukkan Nama Outlet"
                        autocomplete="off" required>
                </div>
                <label class="my-label-input">Alamat</label>
                <div class="my-input-modal">
                    <input type="text" name="alamatOutlet" id="alamatoutlet" placeholder="Masukkan Alamat Outlet"
                        autocomplete="off" required>
                </div>
                <label class="my-label-input">No.Tlp</label>
                <div class="my-input-modal" style="margin: 0;">
                    <input type="text" name="tlpOutlet" id="tlpoutlet" placeholder="Masukkan No.Tlp" autocomplete="off"
                        required>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <div class="my-closeBtn-modal-add" id="my-close-modal">Close</div> --}}
                <button type="submit" class="my-addBtn-modal-add" id="editOutlet">Submit</button>
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
                <input type="hidden" name="idOutlet" id="id" placeholder="Masukkan ID Outlet" autocomplete="off">
                <div class="my-modal-btn">
                    <div class="my-closeBtn-modal-add" id="my-close-modal">Back</div>
                    <button type="submit" class="my-deleteBtn-modal" id="deleteOutlet">Submit</button>
                </div>
            </div>
        </div>
    @endsection
