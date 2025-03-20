@extends('master')

@section('title')
    Dudi
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Dudi List</h4>
                        <div class="text-end w-100">
                            <a href="{{ route('dudi.create') }}" class="btn btn-primary waves-effect waves-light">Add</a>
                        </div>
                    </div>

                    <br />
                    <table id="example-edit" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dudis as $dudi)
                                <tr>
                                    <td>{{ $dudi->nama_perusahaan }}</td>
                                    <td>{{ $dudi->kontak }}</td>
                                    <td>
                                        @if ($dudi->status == 'active')
                                            <span class=" btn btn-sm btn-success">Aktif</span>
                                        @else
                                            <span class="btn btn-sm btn-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dudi.edit', $dudi->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i></a>

                                        <button class="btn btn-success btn-sm showDetail" data-id="{{ $dudi->id }}"
                                            data-toggle="modal" data-target="#showDudiModal">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <form action="{{ route('dudi.destroy', $dudi->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-xs-12 -->
    </div>
    <!-- /.row small-spacing -->

    <!-- Modal Show Detail Dudi -->
    <div class="modal fade" id="showDudiModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Perusahaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Perusahaan: </strong> <span
                            id="detailNamaPerusahaan">{{ $dudi->nama_perusahaan }}</span></p>
                    <p><strong>Alamat:</strong> <span id="detailAlamat"></span></p>
                    <p><strong>Kontak:</strong> <span id="detailKontak"></span></p>
                    <p><strong>Jurusan:</strong> <span id="detailJurusan"></span></p>
                    <p><strong>Status:</strong> <span id="detailStatus"></span></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".showDetail").forEach(function(button) {
                button.addEventListener("click", function() {
                    let dudiId = this.getAttribute("data-id");

                    fetch(`/dudi/${dudiId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("detailNamaPerusahaan").textContent = data
                                .nama_perusahaan;
                            document.getElementById("detailAlamat").textContent = data.alamat;
                            document.getElementById("detailKontak").textContent = data.kontak;
                            document.getElementById("detailJurusan").textContent = data
                                .jurusan_nama;
                            document.getElementById("detailStatus").textContent = data
                                .status === 'active' ? 'Aktif' : 'Tidak Aktif';
                        })
                        .catch(error => console.error("Error fetching detail:", error));
                });
            });
        });
    </script>
@endsection
