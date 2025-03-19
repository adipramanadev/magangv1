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
                                    <td>{{ $dudi->status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i></a>
                                        <form action="#" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak Ada Data</td>
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
                        <tbody>
                            <!-- Add your dynamic rows here -->
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
