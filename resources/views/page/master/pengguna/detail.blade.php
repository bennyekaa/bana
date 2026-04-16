@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Detail Biodata</h4>

            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>{{ $pengguna->biodata->nama }}</td>
                </tr>
                <tr>
                    <td>NRP</td>
                    <td>{{ $pengguna->biodata->nrp }}</td>
                </tr>
                <tr>
                    <td>Pangkat</td>
                    <td>{{ $pengguna->biodata->pangkat->pangkat }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>{{ $pengguna->biodata->jabatan->jabatan }}</td>
                </tr>
                <tr>
                    <td>HP</td>
                    <td>{{ $pengguna->biodata->hp }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $pengguna->biodata->alamat }}</td>
                </tr>
            </table>

            <a href="{{ session('pengguna') ?? url('master/pengguna') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
@endsection
