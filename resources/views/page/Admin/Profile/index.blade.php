@extends('layouts.kerangkaAdmin')

@section('content')
    @if (session()->has('edit'))
        <button type="button" style="display: none" id="edit"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('edit');

                // Simulasikan klik pada tombol
                button.click();
                button.style.display = 'none';
            };
        </script>
    @endif
    @if (session()->has('edit-password'))
        <button type="button" style="display: none" id="edit-password"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('edit-password');

                // Simulasikan klik pada tombol
                button.click();
                button.style.display = 'none';
            };
        </script>
    @endif

    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
            <button type="button" class="tombolClass" style="display: none" id="edit-password"></button>
        </div>

        <div class="section-body">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header justify-content-center pb-1 pl-4">
                            <figure class="avatar mr-2 avatar-xl">
                                <img src="/assets/img/avatar/avatar-1.png" alt="...">
                                @if ($authAdmin->status == 'aktif')
                                <i class="avatar-presence online" data-toggle="popover" title="Aktif"  data-trigger="focus"></i>
                                @else
                                    <i class="avatar-presence busy" data-toggle="popover" title="Non-aktif"  data-trigger="focus"></i>
                                @endif
                            </figure>
                        </div>
                        <div class="card-body pt-0">
                            <h6 class="text-center mb-3">Admin</h6>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" value="{{ $authAdmin->name }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telepon</label>
                                <input type="text" id="telp" class="form-control" value="{{ $authAdmin->no_tlp }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" class="form-control" value="{{ ucfirst($authAdmin->status) }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="card-footer text-center pt-0">
                            <button class="btn btn-warning" type="button" data-toggle="collapse"
                                data-target="#collapseEditProfile" aria-expanded="false"
                                aria-controls="collapseEditProfile"><i class="fas fa-edit"></i> Edit
                                Profil</button>
                            <button class="btn btn-danger" type="button" data-toggle="collapse"
                                data-target="#collapseEditPassword" aria-expanded="false"
                                aria-controls="collapseEditPassword"><i class="fas fa-key"></i> Edit
                                Password</button>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    {{-- Form Edit Profil --}}
                    <div class="collapse" id="collapseEditProfile">
                        <form action="/profileAdmin/{{ $authAdmin->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card shadow">
                                <div class="card-header text-warning">
                                    <h4><i class="fas fa-edit"></i> Edit Profil</h4>
                                </div>
                                <div class="card-body py-0">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="name" id="nama" class="form-control"
                                            value="{{ $authAdmin->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Nomor Telepon</label>
                                        <input type="number" name="no_tlp" id="telp" class="form-control"
                                            value="{{ $authAdmin->no_tlp }}">
                                    </div>
                                </div>
                                <div class="card-footer pt-0">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                        Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Form Edit Password --}}
                    <div class="collapse" id="collapseEditPassword">
                        <form action="/profilePassword/{{ $authAdmin->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card shadow">
                                <div class="card-header text-danger">
                                    <h4><i class="fas fa-key"></i> Edit Password</h4>
                                </div>
                                <div class="card-body py-0">
                                    <div class="form-group mb-3">
                                        <label for="passwordInput">Password baru</label>
                                        <input type="password" name="password" id="passwordInput" class="form-control "
                                            value="{{ old('password') }}">
                                    </div>

                                    <input type="checkbox" id="showPasswordCheckbox">
                                    <small>Tampilkan Password</small>

                                    <div class="form-group mt-3">
                                        <label for="passwordConf">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" id="passwordConf"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password_confirmation') }}">
                                        @if ($errors->any())
                                            <div class="invalid-feedback">
                                                {{ 'Password tidak sesuai' }}
                                            </div>
                                        @endif
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
                                <div class="card-footer pt-0">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                        Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
