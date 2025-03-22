@extends('master')

@section('title')
    Add Data User
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Add Data User</h4>
                <div class="card-content">
                    <form id="userForm" action="{{ route('user.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Input Nama Lengkap">
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Input Email">
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Input Password">
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="form-group">
                            <label for="role" class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control">
                                    <option value="">Pilih Role</option>
                                    <option value="guru">Guru</option>
                                    <option value="admin">Admin</option>
                                    <option value="dudi">Dudi</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="nonactive">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group margin-bottom-1">
                            <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("userForm").addEventListener("submit", function(event) {
                event.preventDefault();

                let name = document.getElementById("name").value.trim();
                let email = document.getElementById("email").value.trim();
                let password = document.getElementById("password").value.trim();
                let role = document.getElementById("role").value.trim();
                let status = document.getElementById("status").value.trim();

                if (name === "" || email === "" || password === "" || role === "" || status === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua bidang!',
                    });
                    return;
                }

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Pastikan data yang dimasukkan sudah benar!",
                    icon: 'warning',
                    width: 600,
                    padding: '2em',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("userForm").submit();
                    }
                });
            });
        });
    </script>
@endsection
