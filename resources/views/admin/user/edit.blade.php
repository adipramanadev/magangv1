@extends('master')

@section('title')
    Edit Data User
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit Data User</h4>
                <div class="card-content">
                    <form id="userForm" action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" placeholder="Input Nama Lengkap">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" placeholder="Input Email" readonly>
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="form-group">
                            <label for="role" class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control">
                                    <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="dudi" {{ $user->role == 'dudi' ? 'selected' : '' }}>Dudi</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonactive" {{ $user->status == 'nonactive' ? 'selected' : '' }}>Tidak
                                        Aktif</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group margin-bottom-1">
                            <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-warning btn-sm waves-effect waves-light">Update</button>
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
                let role = document.getElementById("role").value.trim();
                let status = document.getElementById("status").value.trim();

                if (name === "" || role === "" || status === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua bidang!',
                    });
                    return;
                }

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Perubahan akan disimpan!",
                    icon: 'warning',
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
