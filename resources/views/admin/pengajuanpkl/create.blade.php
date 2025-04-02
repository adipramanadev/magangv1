@extends('master')

@section('title')
    Tambah Pengajuan PKL
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Tambah Pengajuan PKL</h4>
                <div class="card-content">
                    <form id="pengajuanForm" action="{{ route('pengajuan.store') }}" method="POST"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <!-- Pilih Siswa -->
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Pilih DUDI -->
                        <div class="form-group">
                            <label for="dudi_id" class="col-sm-2 control-label">Nama DUDI</label>
                            <div class="col-sm-10">
                                <select name="dudi_id" id="dudi_id" class="form-control">
                                    <option value="">Pilih DUDI</option>
                                    @foreach ($dudis as $dudi)
                                        <option value="{{ $dudi->id }}">{{ $dudi->nama_perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tanggal Pengajuan -->
                        <div class="form-group">
                            <label for="tanggal_pengajuan" class="col-sm-2 control-label">Tanggal Pengajuan</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control">
                            </div>
                        </div>

                        <!-- Upload Surat (Opsional) -->
                        <div class="form-group">
                            <label for="file_surat_pengajuan" class="col-sm-2 control-label">Surat Pengajuan (PDF)</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_surat_pengajuan" id="file_surat_pengajuan"
                                    class="form-control" accept="application/pdf">

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
            const form = document.getElementById("pengajuanForm");

            form.addEventListener("submit", function(e) {
                e.preventDefault();

                const user_id = document.getElementById("user_id").value.trim();
                const dudi_id = document.getElementById("dudi_id").value.trim();
                const tanggal = document.getElementById("tanggal_pengajuan").value.trim();
                const fileInput = document.getElementById("file_surat_pengajuan");
                const file = fileInput.files[0];

                // Validasi field wajib
                if (!user_id || !dudi_id || !tanggal) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua data yang diperlukan!'
                    });
                    return;
                }

                // Validasi file jika ada
                if (file) {
                    const allowedType = ['application/pdf'];
                    const maxSize = 2 * 1024 * 1024; // 2MB

                    if (!allowedType.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'File tidak valid!',
                            text: 'Surat pengajuan harus berformat PDF.'
                        });
                        return;
                    }

                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ukuran file terlalu besar!',
                            text: 'Maksimal ukuran file adalah 2MB.'
                        });
                        return;
                    }
                }

                // Jika semua validasi lolos, konfirmasi
                Swal.fire({
                    title: 'Yakin ingin menyimpan?',
                    text: 'Pastikan semua data pengajuan sudah benar!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
