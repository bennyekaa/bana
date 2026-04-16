@extends('layout.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil! </strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal! </strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Laporan Polisi</h5>
                @if (session('role.nama') == 'Admin')
                    <a href="{{ url('transaksi/lp/tambah') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i>Tambah Data
                    </a>
                @endif
            </div>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor</th>
                            <th>Pelanggaran</th>
                            <th>Kategori</th>
                            <th>Penerima Laporan</th>
                            <th>Pelapor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($laporan as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nomor }}</td>
                                <td>{{ $item->pelanggaran->nama }}</td>
                                <td>{{ $item->pelanggaran->kategori_pelanggaran->nama }}</td>
                                <td>{{ $item->menerima->biodata->nama }}</td>
                                <td>{{ $item->nama_pelapor }}</td>
                                {{-- <td>{{ $item->nama }}</td> --}}
                                {{-- <td>{{ $item->keterangan }}</td> --}}
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge bg-danger">Draft</span>
                                    @elseif ($item->status == 1)
                                        <span class="badge bg-warning">Dikirim ke Penyidik</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge bg-info">Proses Kasi / Komandan</span>
                                    @elseif ($item->status == 3)
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- ADMIN --}}
                                    @if ($item->status == 0 && session('role.nama') == 'Admin' || $item->status == 0 && session('role.nama') == 'Developer')
                                        <a href="{{ url('transaksi/lp/kirim/' . $item->id) }}"
                                            class="btn btn-success btn-sm" onclick="return confirm('Yakin kirim LP?')">
                                            Kirim
                                        </a>
                                        <a href="{{ url('transaksi/lp/hapus/' . $item->id) }}"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">
                                            Hapus
                                        </a>

                                        {{-- PENYIDIK --}}
                                    @elseif ($item->status == 1 && session('role.nama') == 'Penyidik')
                                        <a href="{{ url('transaksi/lp/penyidik/' . $item->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Input Penyidikan
                                        </a>

                                        {{-- KASI / KOMANDAN --}}
                                    @elseif ($item->status == 2 && in_array(session('role.nama'), ['Kasi', 'Komandan']))
                                        <a href="{{ url('transaksi/lp/pin/' . $item->id) }}" class="btn btn-info btn-sm">
                                            Lihat Hasil
                                        </a>

                                        {{-- DEFAULT --}}
                                    @else
                                        <a href="{{ url('transaksi/lp/detail/' . $item->id) }}"
                                            class="btn btn-secondary btn-sm">
                                            Detail
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
