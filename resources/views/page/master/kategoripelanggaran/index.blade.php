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
                <h5 class="card-title mb-0">Kategori Pelanggaran</h5>

                <a href="{{ url('master/kategoripelanggaran/tambah') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Tambah Data
                </a>
            </div>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori Pelanggaran</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kategoripelanggaran as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge rounded-pill bg-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge rounded-pill bg-success">Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <a href="{{ url('master/kategoripelanggaran/status/' . encrypt($item->id) . '/1') }}"
                                            class="btn btn-success btn-sm" title="Aktifkan"><i
                                                class="me-2 mdi mdi-check">Aktifkan</i></a>
                                    @else
                                        <a href="{{ url('master/kategoripelanggaran/status/' . encrypt($item->id) . '/0') }}"
                                            class="btn btn-danger btn-sm" title="Non Aktifkan"><i
                                                class="me-2 mdi mdi-close">Non Aktifkan</i></a>
                                    @endif
                                    <a href="{{ url('master/kategoripelanggaran/edit/' . encrypt($item->id)) }}"
                                        class="btn btn-warning btn-sm"><i class="me-2 mdi mdi-table-edit">Edit</i></a>
                                    <a href="{{ url('master/kategoripelanggaran/hapus/' . encrypt($item->id)) }}"
                                        class="btn btn-danger btn-sm"><i class="me-2 mdi mdi-delete">Hapus</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
