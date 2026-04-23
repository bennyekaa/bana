@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">

            <form class="form-horizontal" action="{{ url('master/pangkat/action') }}" method="post">

                @csrf

                <input type="hidden" name="fungsi" value="edit">

                <input type="hidden" name="id" value="{{ encrypt($pangkat->id) }}">

                <div class="card-body">

                    <h4 class="card-title">
                        Edit Pangkat
                    </h4>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">
                            Pangkat
                        </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pangkat" value="{{ $pangkat->pangkat }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">
                            Korps
                        </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="korps" value="{{ $pangkat->korps }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">
                            Keterangan
                        </label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" value="{{ $pangkat->keterangan }}">
                        </div>
                    </div>

                </div>

                <div class="border-top">
                    <div class="card-body">

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a href="{{ url('master/pangkat/index') }}" class="btn btn-danger text-white">
                            Cancel
                        </a>

                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
