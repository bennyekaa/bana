@extends('layout.app')

@section('content')
    <div class="card">
        <form action="{{ url('master/jabatan/action') }}" method="post">
            @csrf

            <input type="hidden" name="fungsi" value="tambah">

            <div class="card-body">

                <h4>Tambah Jabatan</h4>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-end">
                        Jabatan
                    </label>

                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-end">
                        Keterangan
                    </label>

                    <div class="col-sm-9">
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                </div>

            </div>

            <div class="card-body border-top">
                <button class="btn btn-primary">
                    Simpan
                </button>
            </div>

        </form>
    </div>
@endsection
