@extends('layouts.kerangkaAdmin')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="/datamember" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/datamember">Index</a></div>
                <div class="breadcrumb-item active"><a href="#">Tambah Member</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 shadow">
                        <form action="/datamember" method="POST">
                            @csrf
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="number" name="no_tlp"
                                                class="form-control @error('no_tlp') is-invalid @enderror"
                                                value="{{ old('no_tlp') }}" required>
                                            @error('no_tlp')
                                                <div class="invalid-feedback">
                                                    {{ 'Nomor telepon minimal 12 & maksimal 13 karakter' }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Kost</label>
                                            <textarea name="alamat_kost" class="form-control" cols="30" rows="20">{{ old('alamat_kost') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Link Maps</label>
                                            <input type="text" name="link_maps" class="form-control"
                                                value="{{ old('link_maps') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="non-aktif">Non-Aktif</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="role" value="member">
                                        <div class="form-group mb-3">
                                            <label>Password</label>
                                            <input type="password" id="passwordInput" name="password" class="form-control" required>
                                        </div>

                                        <input type="checkbox" id="showPasswordCheckbox">
                                        <small>Tampilkan Password</small>

                                        <div class="form-group mt-3">
                                            <label> Konfirmasi Password</label>
                                            <input type="password" id="passwordConf" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ 'Password tidak sesuai' }}
                                                </div>
                                            @enderror
                                        </div>

                                        <script>
                                            const passwordInput = document.getElementById('passwordInput');
                                            const passwordConf = document.getElementById('passwordConf');
                                            const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

                                            showPasswordCheckbox.addEventListener('change', function() {
                                                if (showPasswordCheckbox.checked) {
                                                    // Jika checkbox diceklis, tampilkan kata sandi
                                                    passwordInput.type = 'text';
                                                    passwordConf.type = 'text';
                                                } else {
                                                    // Jika checkbox tidak diceklis, sembunyikan kata sandi
                                                    passwordInput.type = 'password';
                                                    passwordConf.type = 'password';
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-lg fw-bold" type="submit"><i class="fas fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
