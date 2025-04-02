@extends('master')

@section('title')
    Edit Pengajuan PKL
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit Pengajuan PKL</h4>
                <div class="card-content">
                    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="form-control" disabled>
                                    <option value="{{ $pengajuan->user->id }}">{{ $pengajuan->user->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dudi_id" class="col-sm-2 control-label">Nama DUDI</label>
                            <div class="col-sm-10">
                                <select name="dudi_id" id="dudi_id" class="form-control">
                                    @foreach ($dudis as $dudi)
                                        <option value="{{ $dudi->id }}"
                                            {{ $pengajuan->dudi_id == $dudi->id ? 'selected' : '' }}>
                                            {{ $dudi->nama_perusahaan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pengajuan" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control"
                                    value="{{ $pengajuan->tanggal_pengajuan }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_pengajuan" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status_pengajuan" id="status_pengajuan" class="form-control">
                                    <option value="menunggu"
                                        {{ $pengajuan->status_pengajuan == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="diterima"
                                        {{ $pengajuan->status_pengajuan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak"
                                        {{ $pengajuan->status_pengajuan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_surat_pengajuan" class="col-sm-2 control-label">Ganti Surat (PDF)</label>
                            <div class="col-sm-10">
                                <input type="file" name="file_surat_pengajuan" class="form-control"
                                    accept="application/pdf">
                                @if ($pengajuan->file_surat_pengajuan)
                                    {{-- <p class="mt-2">File saat ini: <a href="{{ Storage::url($pengajuan->file_surat_pengajuan) }}" target="_blank">Lihat Surat</a></p> --}}
                                    <p class="mt-2">File Saat Ini : <a
                                            href="{{ asset('storage/' . Str::after($pengajuan->file_surat_pengajuan, 'public/')) }}"
                                            target="_blank">Lihat Surat</a>

                                    </p>
                                @endif
                            </div>
                        </div>

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
