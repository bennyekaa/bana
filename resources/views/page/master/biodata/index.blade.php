@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Kategori</h5>

                <a href="{{url('master/kategori/tambah')}}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Tambah Data
                </a>
            </div>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->keterangan}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
