@extends('master')

@section('title', 'Jurusan')
@section('content')
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Jurusan List</h4>
                        <div class="text-end w-100">
                            <a href="{{ route('jurusan.create') }}" class="btn btn-primary waves-effect waves-light">Add</a>
                        </div>
                    </div>

                    <br />
                    <table id="example-edit" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama Jurusan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Jurusan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($jurusans as $jurusan)
                                <tr>
                                    <td>{{ $jurusan->nama_jurusan }}</td>
                                    <td>@if ($jurusan->status == 'active')
                                        <span class="btn btn-success">Aktif</span>
                                    @else
                                        <span class="btn btn-danger">Tidak Aktif</span>
                                    @endif</td>
                                    <td>
                                        <a href="{{ route('jurusan.edit', $jurusan->id) }}"
                                            class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash"></i></button>
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
