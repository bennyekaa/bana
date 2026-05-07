@extends('layout.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ url('master/pengguna/action') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ encrypt($pengguna->id) }}">
                <input type="hidden" name="fungsi" value="edit">
                <div class="card-body">
                    <h4 class="card-title">Edit Pengguna</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">NRP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nrp" placeholder="NRP Pengguna"
                                value="{{ $pengguna->biodata->nrp }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Gelar Depan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="gelar_depan" placeholder="Gelar Depan Pengguna"
                                value="{{ $pengguna->biodata->gelar_depan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Gelar Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="gelar_belakang"
                                placeholder="Gelar Belakang Pengguna" value="{{ $pengguna->biodata->gelar_belakang }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama"
                                value="{{ old('nama', $pengguna->biodata->nama) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Pangkat</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_pangkat">
                                <option value="">-- Pilih Pangkat --</option>
                                @foreach ($pangkat as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('id_pangkat', $pengguna->biodata->id_pangkat) == $k->id ? 'selected' : '' }}>
                                        {{ $k->pangkat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_role">
                                <option value="">-- Pilih Hak Akses --</option>
                                @foreach ($role as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('id_role', $pengguna->id_role) == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_jabatan">
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach ($jabatan as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('id_jabatan', $pengguna->biodata->id_jabatan) == $k->id ? 'selected' : '' }}>
                                        {{ $k->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">HP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="hp" placeholder="HP Pengguna"
                                value="{{ $pengguna->biodata->hp }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat Pengguna"
                                value="{{ $pengguna->biodata->alamat }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Username Pengguna"
                                value="{{ $pengguna->username }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Pin (6 Digit)</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" class="form-control" name="pin" id="pin"
                                    placeholder="Kosongkan jika tidak ingin mengubah PIN">
                                <span class="input-group-text" id="togglePin">Lihat PIN</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Kosongkan jika tidak ingin mengubah password">
                                <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                                    Lihat Password
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger text-white">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('tambahanjs')
    <script>
        // PASSWORD
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const isPassword = password.getAttribute('type') === 'password';

            password.setAttribute('type', isPassword ? 'text' : 'password');

            this.textContent = isPassword ? 'Sembunyikan Password' : 'Lihat Password';
        });

        // PIN
        const togglePin = document.querySelector('#togglePin');
        const pin = document.querySelector('#pin');

        togglePin.addEventListener('click', function() {
            const isPassword = pin.getAttribute('type') === 'password';

            pin.setAttribute('type', isPassword ? 'text' : 'password');

            this.textContent = isPassword ? 'Sembunyikan PIN' : 'Lihat PIN';
        });

        // VALIDASI PIN
        const pinInput = document.getElementById('pin');

        pinInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');

            if (this.value.length > 6) {
                this.value = this.value.slice(0, 6);
            }
        });
    </script>
@endsection
