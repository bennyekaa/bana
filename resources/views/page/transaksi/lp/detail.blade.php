@extends('layout.app')

@section('content')

    <div class="card">
        <div class="card-body">

            <!-- HEADER -->
            <div class="d-flex justify-content-between mb-3">
                <h4>Detail Laporan Polisi</h4>
                <a href="{{ session('lp') }}" class="btn btn-secondary">← Kembali</a>
            </div>

            <!-- INFO LP -->
            <table class="table table-bordered">
                <tr>
                    <td width="200">Nomor</td>
                    <td>{{ $lp->nomor ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pelanggaran</td>
                    <td>{{ $lp->pelanggaran->nama }}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>{{ $lp->pelanggaran->kategori_pelanggaran->nama }}</td>
                </tr>
                <tr>
                    <td>Penerima</td>
                    <td>{{ optional($lp->menerima->biodata)->nama }}</td>
                </tr>
                <tr>
                    <td>Pelapor</td>
                    <td>{{ $lp->nama_pelapor }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if ($lp->status == 0)
                            <span class="badge bg-danger">Draft</span>
                        @elseif ($lp->status == 1)
                            <span class="badge bg-warning">Dikirim ke Penyidik</span>
                        @elseif ($lp->status == 2)
                            <span class="badge bg-info">Proses Kasi / Komandan</span>
                        @elseif ($lp->status == 3)
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                </tr>
            </table>

            <!-- FOTO -->
            @if ($lp->foto->count())
                <h5 class="mt-4">Bukti Foto</h5>
                <div class="row">
                    @foreach ($lp->foto as $f)
                        <div class="col-md-3 mb-3">
                            <img src="{{ url('transaksi/lp/gambar/' . $f->file) }}" class="img-fluid rounded shadow">
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- CATATAN -->
            @if ($lp->catatan->count())
                <h5 class="mt-4">Catatan Penyidikan</h5>

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
            @endif

        </div>
    </div>

@endsection
