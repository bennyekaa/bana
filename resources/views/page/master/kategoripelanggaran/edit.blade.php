@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{url('master/kategoripelanggaran/action')}}" method="post">
                @csrf
                <input type="hidden" name="fungsi" value="edit">
                <input type="hidden" name="id" value="{{$kategoripelanggaran->id}}">
                <div class="card-body">
                    <h4 class="card-title">Edit Kategori Pelanggaran</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Nama Kategori Pelanggaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Kategori Pelanggaran" value="{{$kategoripelanggaran->nama}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{$kategoripelanggaran->katerangan}}">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="submit" class="btn btn-danger text-white">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
