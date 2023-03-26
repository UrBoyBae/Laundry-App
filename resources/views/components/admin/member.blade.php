@extends('layouts.adminLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <div class="my-add-btn my-primary-bg" id="my-modalAdd-trigger" data-modal-target="my-bg-modal-add">
                <i class="uil uil-plus-circle"></i>
                Tambah Data
            </div>
        </div>
        <table id="tableMember" class="table is-fullwidth">
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No.Tlp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bodyMember">

            </tbody>
        </table>
    </div>

    {{-- Modal Add --}}
    <div class="my-bg-modal" id="my-bg-modal-add">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Tambah Member</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal">
                @csrf
                <label class="my-label-input">Nama</label>
                <div class="my-input-modal">
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" autocomplete="off">
                </div>
                <label class="my-label-input">Alamat</label>
                <div class="my-input-modal">
                    <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" autocomplete="off" required>
                </div>
                <label class="my-label-input">Jenis Kelamin</label>
                <div class="my-radio-modal">
                    <label>
                        <input type="radio" name="jk" id="jk" value="L">
                        <span>Laki - Laki</span>
                    </label>
                    <label>
                        <input type="radio" name="jk" id="jk" value="P">
                        <span>Perempuan</span>
                    </label>
                </div>
                <label class="my-label-input">No.Tlp</label>
                <div class="my-input-modal" style="margin: 0;">
                    <input type="text" name="tlpOutlet" id="tlp" placeholder="Masukkan No.Tlp" autocomplete="off" required>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <button class="my-closeBtn-modal-add">Close</button> --}}
                <button type="submit" class="my-addBtn-modal-add" id="addMember">Submit</button>
            </div>
        </div>
    </div>
    
    {{-- Modal Edit --}}
    <div class="my-bg-modal" id="my-bg-modal-edit">
        <div class="my-content-modal">
            <div class="my-title-modal">
                <span>Edit Member</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal">
                @csrf
                <input type="hidden" name="idmember" id="idmember" placeholder="Masukkan ID Outlet" autocomplete="off">
                <label class="my-label-input">Nama</label>
                <div class="my-input-modal">
                    <input type="text" name="nama" id="datanama" placeholder="Masukkan Nama" autocomplete="off">
                </div>
                <label class="my-label-input">Alamat</label>
                <div class="my-input-modal">
                    <input type="text" name="alamat" id="dataalamat" placeholder="Masukkan Alamat" autocomplete="off" required>
                </div>
                <label class="my-label-input">Jenis Kelamin</label>
                <div class="my-select-modal">
                    <select name="jk" id="datajk" required>
                        <option value="" selected disabled>Pilih JK</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <label class="my-label-input">No.Tlp</label>
                <div class="my-input-modal" style="margin: 0;">
                    <input type="text" name="tlpOutlet" id="datatlp" placeholder="Masukkan No.Tlp" autocomplete="off" required>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <button class="my-closeBtn-modal-add">Close</button> --}}
                <button type="submit" class="my-addBtn-modal-add" id="editMember">Submit</button>
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
                <input type="hidden" name="idmember" id="id" placeholder="Masukkan ID Outlet" autocomplete="off">
                <div class="my-modal-btn">
                    <div class="my-closeBtn-modal-add" id="my-close-modal">Back</div>
                    <button type="submit" class="my-deleteBtn-modal" id="deleteMember">Submit</button>
                </div>
            </div>
        </div>
@endsection
