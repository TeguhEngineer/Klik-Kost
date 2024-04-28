<!DOCTYPE html>
<html lang="en">

<head>
    <title>Klik Kost | Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icon -->
    <link href="/logindanregister/login/images/LOGO2.png" rel="icon" />
    <link href="/logindanregister/login/images/LOGO2.png" rel="apple-touch-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Fasthand&family=Poppins:ital,wght@0,400;0,500;0,600;1,300&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="/logindanregister/login/css/style.css" />
</head>

<body>
    <section class="ftco-section">
        <div class="container container-mobile">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img bg-login-mobile"
                            style="background-image: url(/logindanregister/login/images/BG.jpg)"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <a href="/" class="btn-back">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                </svg>
                            </a>
                            <div class="d-flex">
                                <div class="w-100 text-center mt-4">
                                    <img src="/logindanregister/login/images/LOGO2.png" alt="Logo" width="140px"
                                        style="margin-top: -40px" />
                                    <h3 style="font-weight: bolder; color: #6777ef; margin-top: -20px">KLIK KOST</h3>
                                    <h6 class="mb-3 text-dark" style="margin-top: -10px">Cari kosan lebih mudah</h6>
                                </div>
                            </div>


                            <form action="{{ route('login') }}" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group mb-2">
                                    <label class="text-dark" for="name">No. Telepon</label>
                                    <input type="number" class="form-control rounded-pill border-secondary"
                                        placeholder="Nomor Telepon" name="no_tlp" autocomplete="off" tabindex="1" />
                                    {{-- <p class="text-danger font-italic">testeisuwfgb</p> --}}
                                    @if ($errors->has('general'))
                                        <small class="text-danger font-italic">
                                            {{ $errors->first('general') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="text-dark" for="password">Password</label>
                                    <div class="input-password">
                                        <input type="password" class="form-control rounded-pill border-secondary"
                                            placeholder="Password" name="password" autocomplete="off" id="password"
                                            tabindex="2" />
                                        @if ($errors->has('general'))
                                            <small class="text-danger font-italic">
                                                {{ $errors->first('general') }}
                                            </small>
                                        @endif
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
                                <button type="submit"
                                    class="form-control btn-login rounded-pill submit px-3 text-white text-center"
                                    tabindex="3">Login</button>
                                <p class="mt-2 d-flex justify-content-end">Belum punya akun? <a
                                        class="text-primary mx-2" href="/register"> Klik disini!</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/logindanregister/login/js/jquery.min.js"></script>
    <script src="/logindanregister/login/js/popper.js"></script>
    <script src="/logindanregister/login/js/bootstrap.min.js"></script>
    <script src="/logindanregister/login/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $(document).on('click', 'loginerror', function(e) {
                e.preventDefault();
                var link = $(this).attr('submit');

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="#">Why do I have this issue?</a>',
                });
            });
        });
    </script>

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
