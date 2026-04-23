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
                <h5 class="card-title mb-0">Master Jabatan</h5>

                <a href="{{ url('master/jabatan/tambah') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Tambah Data
                </a>
            </div>

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no=1; @endphp

                        @foreach ($jabatan as $item)
                            <tr>

                                <td>{{ $no++ }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->keterangan }}</td>

                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge rounded-pill bg-danger">
                                            Tidak Aktif
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-success">
                                            Aktif
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    @if ($item->status == 0)
                                        <a href="{{ url('master/jabatan/status/' . encrypt($item->id) . '/1') }}"
                                            class="btn btn-success btn-sm">
                                            <i class="mdi mdi-check"></i>
                                            Aktifkan
                                        </a>
                                    @else
                                        <a href="{{ url('master/jabatan/status/' . encrypt($item->id) . '/0') }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-close"></i>
                                            Non Aktifkan
                                        </a>
                                    @endif

                                    <a href="{{ url('master/jabatan/edit/' . encrypt($item->id)) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="mdi mdi-table-edit"></i>
                                        Edit
                                    </a>

                                    <a href="{{ url('master/jabatan/hapus/' . encrypt($item->id)) }}"
                                        class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
                                        <i class="mdi mdi-delete"></i>
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
