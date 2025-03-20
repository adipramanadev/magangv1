@extends('master')

@section('title')
    Edit Data Guru
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit Data Guru</h4>
                <div class="card-content">
                    <form id="guruForm" action="{{ route('guru.update', $guru->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <!-- NIP -->
                        <div class="form-group">
                            <label for="nip" class="col-sm-2 control-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip"
                                    value="{{ $guru->nip }}" placeholder="Input NIP Guru (18 digit)">
                            </div>
                        </div>

                        <!-- Nama Guru -->
                        <div class="form-group">
                            <label for="nama_guru" class="col-sm-2 control-label">Nama Guru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                                    value="{{ $guru->nama }}" placeholder="Input Nama Guru">
                            </div>
                        </div>

                        <!-- Pilih User -->
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">Pilih User</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Pilih User Guru</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" data-email="{{ $user->email }}"
                                            {{ $guru->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Email (Otomatis Mengikuti User yang Dipilih) -->
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $guru->email }}" readonly>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki" {{ $guru->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="form-group margin-bottom-1">
                            <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Update</button>
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

                // Kirim data menggunakan AJAX untuk update
                fetch("{{ route('guru.update', $guru->id) }}", {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        nip: nip,
                        nama_guru: nama_guru,
                        user_id: user_id,
                        email: email,
                        jenis_kelamin: jenis_kelamin
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message,
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: 'Guru berhasil diperbarui!',
                        }).then(() => {
                            window.location.href = "{{ route('guru.index') }}";
                        });
                    }
                })
                .catch(error => console.error("Error:", error));
            });
        });
    </script>
@endsection
