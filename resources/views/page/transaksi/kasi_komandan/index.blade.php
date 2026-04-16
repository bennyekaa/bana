@extends('layout.app')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body text-center">

            <h4>Masukkan PIN</h4>
            <p>Untuk membuka hasil penyidikan</p>

            <form method="POST" action="{{ url('transaksi/lp/cek-pin/' . $lp->id) }}">
                @csrf

                <div class="form-group mb-3">
                    <input type="password" name="pin" class="form-control text-center" maxlength="6" placeholder="******">
                </div>

                <button type="submit" class="btn btn-primary">Buka</button>
                <a href="{{ session('lp') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
@endsection
