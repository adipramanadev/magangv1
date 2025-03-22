@extends('master')

@section('title')
    User
@endsection

@section('content')
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>User List</h4>
                        <div class="text-end w-100">
                            <a href="{{ route('user.create') }}" class="btn btn-primary waves-effect waves-light">Add</a>
                        </div>
                    </div>
                    <br>
                    <table id="example-edit" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge badge-info text-capitalize">{{ $user->role }}</span>
                                    </td>
                                    <td>
                                        @if ($user->status == 'active')
                                            <span class="btn btn-success btn-xs">Aktif</span>
                                        @else
                                            <span class="btn btn-danger btn-xs">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-xs"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"
                                                onclick="return confirm('Hapus user ini?')">
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
                width: '600px',
                padding: '2em',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endsection
