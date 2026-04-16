@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ url('transaksi/lp/proses') }}" method="post">
                @csrf
                <input type="hidden" name="fungsi" value="tambah">
                <div class="card-body">
                    <h4 class="card-title">Buat Laporan</h4>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_kategori">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Terima Laporan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="penerima_laporan">
                                <option value="">-- Pilih Penerima --</option>
                                @foreach ($pengguna as $k)
                                    <option value="{{ $k->id }}">{{ $k->biodata->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Mengetahui Laporan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="mengetahui_laporan">
                                <option value="">-- Pilih Mengetahui --</option>
                                @foreach ($pengguna as $k)
                                    <option value="{{ $k->id }}">{{ $k->biodata->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Pasal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pasal" placeholder="Masukkan Pasal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Hari</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="hari" placeholder="Masukkan Hari">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Pukul</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="pukul" placeholder="Masukkan Pukul">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Nama Pelapor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_pelapor"
                                placeholder="Masukkan Nama Pelapor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">
                            Jenis Kelamin Pelapor
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jk_pelapor" required>
                                <option value="">-- Pilih JK --</option>
                                <option value="L" {{ old('jk', $data->jk ?? '') == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P" {{ old('jk', $data->jk ?? '') == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>

                            @error('jk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Umur Pelapor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="umur_pelapor"
                                placeholder="Masukkan Umur Pelapor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Tempat Lahir Pelapor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tempat_lahir_pelapor"
                                placeholder="Masukkan Tempat Lahir Pelapor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Tanggal Lahir Pelapor</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tanggal_lahir_pelapor"
                                placeholder="Masukkan Tanggal Lahir Pelapor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Suku/Bangsa Pelapor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="bangsa_pelapor"
                                placeholder="Masukkan Suku/Bangsa Pelapor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Agama Pelapor</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="agama_pelapor">
                                <option value="">-- Pilih Agama --</option>
                                @foreach ($agama as $k)
                                    <option value="{{ $k->id }}">{{ $k->agama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Pekerjaan Pelapor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pekerjaan_pelapor"
                                placeholder="Masukkan Pekerjaan Pelapor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Alamat Pelapor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat_pelapor"
                                placeholder="Masukkan Alamat Pelapor">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Laporan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="catatan_laporan" placeholder="Masukkan Laporan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="submit" class="btn btn-danger text-white">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
