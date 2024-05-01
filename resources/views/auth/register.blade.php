<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Colorlib Templates" />
    <meta name="author" content="Colorlib" />
    <meta name="keywords" content="Colorlib Templates" />

    <!-- Title Page-->
    <title>Klik Kost | Registrasi</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Icon -->
    <link href="/logindanregister/register/images/LOGO2.png" rel="icon" />
    <link href="/logindanregister/register/images/LOGO2.png" rel="apple-touch-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Fasthand&family=Poppins:ital,wght@0,400;0,500;0,600;1,300&display=swap"
        rel="stylesheet" />

    <link href="/logindanregister/register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
        media="all" />
    <link href="/logindanregister/register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet"
        media="all" />
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet" />

    <!-- Vendor CSS-->
    <link href="/logindanregister/register/vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link href="/logindanregister/register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />


    <!-- Main CSS-->
    <link href="/logindanregister/register/css/main.css" rel="stylesheet" media="all" />
</head>

<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <div class="header-registrasi">
                        <img src="/logindanregister/register/images/LOGO2.png" alt="Logo" width="85px" />
                        <div class="text-registrasi">
                            <h2 class="title">Registrasi</h2>
                            <h6 class="text-deskripsi"
                                style="margin-top: -20px; margin-bottom: 20px; font-weight: bold; color: #555">KLIK KOST
                                - Cari kosan lebih mudah</h6>
                        </div>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row row-space">
                            <div class="input-group col-2">

                                <input class="input--style-1" type="text" placeholder="*Nama Lengkap"
                                    value="{{ old('name') }}" name="name" tabindex="1" required />
                            </div>
                            <div class="input-group input-password col-2">
                                @error('password')
                                    <small style="color: red; font-style: italic;">Password minimal 8 karakter</small>
                                @enderror

                                <input class="input--style-1" type="password" placeholder="*Password" name="password"
                                    id="password" tabindex="2" required />

                                <button class="btn btn-view" type="button" id="togglePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                        <div class="input-group">
                            @error('no_tlp')
                                <small style="color: red; font-style: italic;">Nomor Telepon minimal 12 dan maksimal 13 karakter</small>
                            @enderror
                            <input class="input--style-1" type="number" placeholder="*Nomor Telepon"
                                value="{{ old('no_tlp') }}" name="no_tlp" tabindex="3" required />

                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="*Alamat Kos"
                                value="{{ old('alamat_kost') }}" name="alamat_kost" tabindex="5" required />
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="*Link Maps"
                                value="{{ old('link_maps') }}" name="link_maps" tabindex="6" required />
                        </div>
                        <button class="btn btn--radius btn--register" type="submit"
                            tabindex="7" style="padding: 4px 0 4px 0;">Konfirmasi</button>
                        <p style="margin-top: 10px; text-align: end; color: #555">
                            Sudah punya akun?
                            <a style="text-decoration: none; color: #007bff" href="/login" tabindex="8"> Klik
                                disini!</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/logindanregister/register/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/logindanregister/register/vendor/select2/select2.min.js"></script>
    <script src="/logindanregister/register/vendor/datepicker/moment.min.js"></script>
    <script src="/logindanregister/register/vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="/logindanregister/register/js/global.js"></script>

    {{-- show password with button --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordButton = document.getElementById('togglePassword');

            togglePasswordButton.addEventListener('click', function() {
                // Ganti tipe atribut password
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });
        });
    </script>
</body>

</html>
<!-- end document-->

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | halaman</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name  ') is-invalid @enderror" name ="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_tlp"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nomor Telepon') }}</label>

                                <div class="col-md-6">
                                    <input id="no_tlp" type="number"
                                        class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp"
                                        value="{{ old('no_tlp') }}" required autocomplete="no_tlp" autofocus
                                        pattern=".{1,12}">

                                    @error('no_tlp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'Nomor telepon minimal 12 & maksimal 13 karakter.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_kost"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Alamat Kost') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('alamat_kost') is-invalid @enderror" name="alamat_kost" id="alamat_kost"
                                        cols="30" rows="3" required autocomplete="alamat_kost" autofocus>{{ old('alamat_kost') }}</textarea>
                                    @error('alamat_kost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="link_maps"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Link Maps') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('link_maps') is-invalid @enderror" name="link_maps" id="link_maps"
                                        cols="30" rows="3" required autocomplete="link_maps" autofocus>{{ old('link_maps') }}</textarea>
                                    @error('link_maps')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'Password tidak boleh kurang dari 8 karakter.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmtaion') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password">
                                        @error('password_confirmtaion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'Password tidak sesuai.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}
