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
                <h5 class="card-title mb-0">Pengguna</h5>

                <a href="{{ url('master/pengguna/tambah') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Tambah Data
                </a>
            </div>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Biodata</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pengguna as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->role->nama }}</td>
                                <td><a href="{{ url('master/pengguna/detail/' . encrypt($item->id)) }}"
                                        class="btn btn-info btn-sm">
                                        Lihat
                                    </a>
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge rounded-pill bg-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge rounded-pill bg-success">Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <a href="{{ url('master/pengguna/status/' . encrypt($item->id)) }}"
                                            class="btn btn-success btn-sm">
                                            Aktifkan
                                        </a>
                                    @else
                                        <a href="{{ url('master/pengguna/status/' . encrypt($item->id)) }}"
                                            class="btn btn-danger btn-sm">
                                            Nonaktifkan
                                        </a>
                                    @endif
                                    <a href="{{ url('master/pengguna/edit/' . encrypt($item->id)) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="{{ url('master/pengguna/hapus/' . encrypt($item->id)) }}"
                                        class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
