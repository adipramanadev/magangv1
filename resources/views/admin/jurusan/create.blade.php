@extends('master')

@section('title', 'Tambah')

@section('content')
    <div class="row small-spacing">
        <div class="col-12">
            <div class="box-content card white">
                <h4 class="box-title">Add Data Jurusan</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="namajurusan" class="col-sm-2 control-label">Nama Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3"
                                    placeholder="Input Nama Jurusan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="" class="form-control">
                                    <option value="0">Pilih Status</option>
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
