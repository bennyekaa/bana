@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ url('master/pelanggaran/action') }}" method="post">
                @csrf
                <input type="hidden" name="fungsi" value="tambah">
                <div class="card-body">
                    <h4 class="card-title">Tambah Pelanggaran</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode" placeholder="Kode Pelanggaran">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
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
