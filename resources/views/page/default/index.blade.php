@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="min-height:75vh;">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-body text-center py-5">

                        {{-- Ganti dengan logo/gambar kamu --}}
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Aplikasi" style="max-width:280px;"
                            class="img-fluid mb-4">

                        <h1 class="font-weight-bold text-primary mb-3">
                            Selamat Datang
                        </h1>

                        <h4 class="text-dark mb-2">
                            Di Aplikasi
                        </h4>

                        <p class="text-muted mb-0" style="font-size:16px;">
                            Sistem Informasi sedang dalam pengembangan.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
