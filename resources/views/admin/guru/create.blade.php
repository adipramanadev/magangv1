@extends('master')

@section('title')
    Add Data Guru
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Add Data Guru</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form id="guruForm" action="{{ route('guru.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="nama_guru" class="col-sm-2 control-label">Nama Guru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                                    placeholder="Input Nama Guru">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Input Email Guru">
                            </div>
                        </div>

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

                        <div class="form-group margin-bottom-1">
                            <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Simpan</button>
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
            document.getElementById("guruForm").addEventListener("submit", function(event) {
                event.preventDefault();

                let nama_guru = document.getElementById("nama_guru").value.trim();
                let email = document.getElementById("email").value.trim();
                let status = document.getElementById("status").value.trim();

                if (nama_guru === "" || email === "" || status === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua bidang!',
                    });
                } else {
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
                }
            });
        });
    </script>
@endsection
