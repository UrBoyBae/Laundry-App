@extends('layouts.adminLayout')

@section('mainContent')
    <div class="my-wrap-table">
        <div class="wrap-add-btn">
            <div class="my-add-btn my-primary-bg" id="my-modalAdd-trigger" data-modal-target="my-bg-modal-add">
                <i class="uil uil-plus-circle"></i>
                Tambah Data
            </div>
        </div>
        <table id="tableUser" class="table is-fullwidth">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Outlet</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bodyUser">

            </tbody>
        </table>
    </div>

    {{-- Modal Add --}}
    <div class="my-bg-modal my-bg-modal-user" id="my-bg-modal-add">
        <div class="my-content-modal my-content-modal-user">
            <div class="my-title-modal">
                <span>Tambah User</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal" style="margin-top: 20px">
                @csrf
                <label class="my-label-input">Nama</label>
                <div class="my-input-modal">
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" autocomplete="off">
                </div>
                <label class="my-label-input">Username</label>
                <div class="my-input-modal">
                    <input type="text" name="username" id="username" placeholder="Masukkan Username" autocomplete="off"
                        required>
                </div>
                <label class="my-label-input">Password</label>
                <div class="my-input-modal">
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off"
                        required>
                </div>
                <label class="my-label-input">Outlet</label>
                <div class="my-select-modal">
                    <select name="outlet" id="outlet" required>
                        <option selected disabled>Pilih Outlet</option>
                    </select>
                </div>
                <label class="my-label-input">Role</label>
                <div class="my-select-modal" style="margin-bottom: 0">
                    <select name="role" id="role" required>
                        <option selected disabled>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <button class="my-closeBtn-modal-add">Close</button> --}}
                <button type="submit" class="my-addBtn-modal-add" style="margin-top: 0" id="addUser">Submit</button>
            </div>
        </div>
    </div>
    
    {{-- Modal Edit --}}
    <div class="my-bg-modal my-bg-modal-user" id="my-bg-modal-edit">
        <div class="my-content-modal my-content-modal-user">
            <div class="my-title-modal">
                <span>Edit User</span>
                <div class="my-close-modal" id="my-close-modal">
                    <i class="uil uil-multiply"></i>
                </div>
            </div>
            <!-- Modal Form -->
            <div class="my-form-modal" style="margin-top: 20px">
                @csrf
                <input type="hidden" name="iduser" id="iduser" placeholder="Masukkan ID Outlet" autocomplete="off">
                <label class="my-label-input">Nama</label>
                <div class="my-input-modal">
                    <input type="text" name="nama" id="datanama" placeholder="Masukkan Nama" autocomplete="off">
                </div>
                <label class="my-label-input">Username</label>
                <div class="my-input-modal">
                    <input type="text" name="username" id="datausername" placeholder="Masukkan Username" autocomplete="off"
                        required>
                </div>
                <label class="my-label-input">Password</label>
                <div class="my-input-modal">
                    <input type="password" name="password" id="datapassword" placeholder="*jika ingin dirubah" autocomplete="off"
                        >
                </div>
                <label class="my-label-input">Outlet</label>
                <div class="my-select-modal">
                    <select name="outlet" id="dataoutlet" required>
                        <option selected disabled>Pilih Outlet</option>
                    </select>
                </div>
                <label class="my-label-input">Role</label>
                <div class="my-select-modal" style="margin-bottom: 0">
                    <select name="role" id="datarole" required>
                        <option selected disabled>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>
            </div>

            <div class="my-modal-btn">
                {{-- <button class="my-closeBtn-modal-add">Close</button> --}}
                <button type="submit" class="my-addBtn-modal-add" style="margin-top: 0" id="editUser">Submit</button>
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
                <input type="hidden" name="iduser" id="id" placeholder="Masukkan ID Outlet" autocomplete="off">
                <div class="my-modal-btn">
                    <div class="my-closeBtn-modal-add" id="my-close-modal">Back</div>
                    <button type="submit" class="my-deleteBtn-modal" id="deleteUser">Submit</button>
                </div>
            </div>
        </div>
@endsection
