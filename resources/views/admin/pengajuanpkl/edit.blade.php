@extends('master')

@section('title', 'Edit Jurusan')

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit Data Jurusan</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form id="jurusanForm" action="{{ route('jurusan.update', $jurusan->id) }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_jurusan" class="col-sm-2 control-label">Nama Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan"
                                    value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                                    placeholder="Input Nama Jurusan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ $jurusan->status == 'active' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="nonactive" {{ $jurusan->status == 'nonactive' ? 'selected' : '' }}>Tidak
                                        Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group margin-bottom-1">
                            <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-end">
                                <button type="submit"
                                    class="btn btn-warning btn-sm waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("jurusanForm").addEventListener("submit", function(event) {
                event.preventDefault();

                let nama_jurusan = document.getElementById("nama_jurusan").value.trim();
                let status = document.getElementById("status").value.trim();

                if (nama_jurusan === "" || status === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua bidang!',
                    });
                } else {
                    Swal.fire({
                        title: 'Apakah Anda yakin ingin mengupdate?',
                        text: "Pastikan data yang dimasukkan sudah benar!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Update!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("jurusanForm").submit();
                        }
                    });
                }
            });
        });
    </script>
@endsection
