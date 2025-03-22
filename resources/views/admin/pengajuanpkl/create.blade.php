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

                        <!-- Pilih Siswa -->
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="form-control" required>
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
                                <select name="dudi_id" id="dudi_id" class="form-control" required>
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
                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control"
                                    required>
                            </div>
                        </div>

                        <!-- Upload Surat (Opsional) -->
                        <div class="form-group">
                            <label for="file_surat_pengajuan" class="col-sm-2 control-label">Surat Pengajuan (PDF)</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_surat_pengajuan" id="file_surat_pengajuan"
                                    class="form-control" accept=".pdf">
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
            document.getElementById("pengajuanForm").addEventListener("submit", function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Pastikan semua data pengajuan sudah benar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
