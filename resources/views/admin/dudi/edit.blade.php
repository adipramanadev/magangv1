@extends('master')

@section('title')
    Edit Dudi
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit Dudi</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form id="dudiForm" action="{{ route('dudi.update', $dudi->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT') 

                        <div class="form-group">
                            <label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                    value="{{ old('nama_perusahaan', $dudi->nama_perusahaan) }}" placeholder="Input Nama Perusahaan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Input Alamat">{{ old('alamat', $dudi->alamat) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kontak" class="col-sm-2 control-label">Kontak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kontak" name="kontak"
                                    value="{{ old('kontak', $dudi->kontak) }}" placeholder="Input Kontak">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jurusan_id" class="col-sm-2 control-label">Nama Jurusan</label>
                            <div class="col-sm-10">
                                <select name="jurusan_id" id="jurusan_id" class="form-control">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach ($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}"
                                            {{ $jurusan->id == $dudi->jurusan_id ? 'selected' : '' }}>
                                            {{ $jurusan->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ $dudi->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonactive" {{ $dudi->status == 'nonactive' ? 'selected' : '' }}>Tidak
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
            document.getElementById("dudiForm").addEventListener("submit", function(event) {
                event.preventDefault();

                let nama_perusahaan = document.getElementById("nama_perusahaan").value.trim();
                let alamat = document.getElementById("alamat").value.trim();
                let kontak = document.getElementById("kontak").value.trim();
                let jurusan_id = document.getElementById("jurusan_id").value.trim();
                let status = document.getElementById("status").value.trim();

                if (nama_perusahaan === "" || alamat === "" || kontak === "" || jurusan_id === "" ||
                    status === "") {
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
                            document.getElementById("dudiForm").submit();
                        }
                    });
                }
            });
        });
    </script>
@endsection
