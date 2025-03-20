@extends('master')

@section('title')
    Guru
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Guru List</h4>
                        <div class="text-end w-100">
                            <a href="{{ route('guru.create') }}" class="btn btn-primary waves-effect waves-light">Add</a>
                        </div>
                    </div>

                    <br />
                    <table id="example-edit" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Email</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($gurus as $guru)
                                <tr>
                                    <td>{{ $guru->nama }}</td>
                                    <td>{{ $guru->email }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('guru.destroy', $guru->id) }}" method="post"
                                            style="display: inline-block" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-xs delete-btn"
                                                data-id="{{ $guru->id }}"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-xs-12 -->
    </div>
    <!-- /.row small-spacing -->
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

        // Konfirmasi sebelum hapus
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".delete-btn").forEach(function(button) {
                button.addEventListener("click", function() {
                    let form = this.closest("form");
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data guru akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
