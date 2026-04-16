@extends('layout.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Upload Bukti & Catatan Penyidikan</h4>

            <form action="{{ url('transaksi/lp/upload/' . $lp->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- FOTO -->
                <div class="form-group mb-3">
                    <label>Upload Foto (Bisa Banyak)</label>
                    <input type="file" name="foto[]" multiple class="form-control">
                </div>

                <!-- CATATAN DINAMIS -->
                <label>Catatan Penyidikan</label>
                <div id="catatan-wrapper">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <input type="text" name="pertanyaan[]" class="form-control" placeholder="Pertanyaan">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="jawaban[]" class="form-control" placeholder="Jawaban">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger" onclick="hapusRow(this)">X</button>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-info mb-3" onclick="tambahCatatan()">+ Tambah Catatan</button>

                <br>

                <button type="submit" class="btn btn-success">Kirim ke Kasi / Komandan</button>
                <a href="{{ session('lp') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
@endsection

@section('tambahanjs')
    <script>
        function tambahCatatan() {
            let html = `
    <div class="row mb-2">
        <div class="col-md-5">
            <input type="text" name="pertanyaan[]" class="form-control" placeholder="Pertanyaan">
        </div>
        <div class="col-md-5">
            <input type="text" name="jawaban[]" class="form-control" placeholder="Jawaban">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger" onclick="hapusRow(this)">X</button>
        </div>
    </div>`;
            document.getElementById('catatan-wrapper').insertAdjacentHTML('beforeend', html);
        }

        function hapusRow(btn) {
            btn.closest('.row').remove();
        }
    </script>
@endsection
