@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{url('master/role/action')}}" method="post">
                @csrf
                <input type="hidden" name="fungsi" value="edit">
                <input type="hidden" name="id" value="{{encrypt($role->id)}}">
                <div class="card-body">
                    <h4 class="card-title">Edit Role</h4>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Role</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Role" value="{{$role->nama}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{$role->keterangan}}">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger text-white">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
