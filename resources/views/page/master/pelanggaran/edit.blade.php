@extends('layout.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ url('master/pelanggaran/action') }}" method="post">
                @csrf
                <input type="hidden" name="fungsi" value="edit">
                <input type="hidden" name="id" value="{{ $pelanggaran->id }}">

                <div class="card-body">
                    <h4 class="card-title">Edit Pelanggaran</h4>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode" value="{{ $pelanggaran->kode }}"
                                placeholder="Kode Pelanggaran">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $pelanggaran->id_kategori_pelanggaran == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="{{ $pelanggaran->nama }}"
                                placeholder="Nama">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" value="{{ $pelanggaran->keterangan }}"
                                placeholder="Keterangan">
                        </div>
                    </div>

                </div>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('master/pelanggaran') }}" class="btn btn-danger text-white">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
