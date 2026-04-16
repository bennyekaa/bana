@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">

            <h4>Hasil Penyidikan</h4>

            <!-- FOTO -->
            <h5 class="mt-4">Bukti Foto</h5>
            <div class="row">
                @foreach ($lp->foto as $f)
                    <div class="col-md-3 mb-3">
                        <img src="{{ url('transaksi/lp/gambar/' . $f->file) }}" class="img-fluid rounded shadow">
                    </div>
                @endforeach
            </div>

            <!-- CATATAN -->
            <h5 class="mt-4">Catatan</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lp->catatan as $c)
                        <tr>
                            <td><b>{{ $c->pertanyaan }}</b></td>
                            <td>{{ $c->jawaban }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ session('lp') }}" class="btn btn-secondary">Kembali</a>

        </div>
    </div>
@endsection
