@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{url('master/agama/action')}}" method="post">
                @csrf
                <input type="hidden" name="fungsi" value="edit">
                <input type="hidden" name="id" value="{{encrypt($agama->id)}}">
                <div class="card-body">
                    <h4 class="card-title">Edit Agama</h4>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="agama" placeholder="Nama Agama" value="{{$agama->agama}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{$agama->keterangan}}">
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
