@extends('master')

@section('title')
    Add Data Guru
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Add Data Guru</h4>
                <div class="card-content">
                    <form id="guruForm" action="{{ route('guru.store') }}" method="POST" class="form-horizontal">
                        @csrf

                        <!-- NIP -->
                        <div class="form-group">
                            <label for="nip" class="col-sm-2 control-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip"
                                    placeholder="Input NIP Guru (18 digit)">
                            </div>
                        </div>

                        <!-- Nama Guru -->
                        <div class="form-group">
                            <label for="nama_guru" class="col-sm-2 control-label">Nama Guru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                                    placeholder="Input Nama Guru">
                            </div>
                        </div>

                        <!-- Pilih User -->
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">Pilih User</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Pilih User Guru</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" data-email="{{ $user->email }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>

                        <!-- Email (Otomatis Mengikuti User yang Dipilih) -->
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" readonly>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                       

                        <!-- Tombol Simpan -->
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
            let userDropdown = document.getElementById("user_id");
            let emailInput = document.getElementById("email");

            // Jika user dipilih, otomatis mengisi email
            userDropdown.addEventListener("change", function() {
                let selectedOption = userDropdown.options[userDropdown.selectedIndex];
                let emailValue = selectedOption.getAttribute("data-email");
                emailInput.value = emailValue;
            });

            document.getElementById("guruForm").addEventListener("submit", function(event) {
                event.preventDefault();

                let nip = document.getElementById("nip").value.trim();
                let nama_guru = document.getElementById("nama_guru").value.trim();
                let user_id = document.getElementById("user_id").value.trim();
                let email = document.getElementById("email").value.trim();
                let jenis_kelamin = document.getElementById("jenis_kelamin").value.trim();
         

                // Validasi Form
                if (nip === "" || nama_guru === "" || user_id === "" || email === "" || jenis_kelamin === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua bidang!',
                    });
                    return;
                }

                // Validasi NIP harus 18 digit dan hanya angka
                if (nip.length !== 18 || isNaN(nip)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'NIP Tidak Valid!',
                        text: 'NIP harus berisi 18 digit angka!',
                    });
                    return;
                }

                // Jika Semua Validasi Lolos
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Pastikan data yang dimasukkan sudah benar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("guruForm").submit();
                    }
                });
            });
        });
    </script>
@endsection
