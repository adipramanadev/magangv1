@extends('master')

@section('title')
    Pengajuan PKL
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Daftar Pengajuan PKL</h4>
                        <div class="text-end w-100">
                            <a href="{{ route('pengajuan.create') }}" class="btn btn-primary waves-effect waves-light">Tambah Pengajuan</a>
                        </div>
                    </div>
                    <br>
                    <table id="example-edit" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Nama DUDI</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Nama DUDI</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pengajuans as $pengajuan)
                                <tr>
                                    <td>{{ $pengajuan->user->name ?? '-' }}</td>
                                    <td>{{ $pengajuan->dudi->nama_perusahaan ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d M Y') }}</td>
                                    <td>
                                        @if ($pengajuan->status_pengajuan == 'menunggu')
                                            <span class="btn btn-warning btn-xs">Menunggu</span>
                                        @elseif ($pengajuan->status_pengajuan == 'diterima')
                                            <span class="btn btn-success btn-xs">Diterima</span>
                                        @else
                                            <span class="btn btn-danger btn-xs">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="#" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endsection
