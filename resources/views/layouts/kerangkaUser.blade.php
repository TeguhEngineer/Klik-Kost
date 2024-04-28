<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Detail Kost</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="/indexUser/assets/img/LOGO.png" rel="icon" />
    <link href="/indexUser/assets/img/LOGO.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/indexUser/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="/indexUser/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/indexUser/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/indexUser/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="/indexUser/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/indexUser/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/indexUser/assets/css/style.css" rel="stylesheet" />

    <style>
        /* Tampilan Hp */
        @media screen and (max-width: 820px) {
            .ukuran {
                max-height: 99px;
                object-fit: cover;
                object-fit: contain;
            }
        }

        /* Tampilan Komputer */
        @media screen and (min-width: 1024px) {
            .ukuran {
                max-height: 200px;
                object-fit: cover;
                object-fit: contain;
            }
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent border border-bottom border-secondary">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="javascript:history.back()"><i class="bi bi-arrow-left fs-1"></i></a>
                <h1 class="my-auto ms-2 fw-bold"><a href="/">Klik-Kost</a></h1>
            </div>

            <script>
                function goBack() {
                  window.history.back();
                }
                </script>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a data-bs-toggle="modal" data-bs-target="#pencarian">
                            <div class="input-group">
                                <input type="text" name="#" class="form-control rounded-pill shadow-sm"
                                    placeholder="Cari tempat kost...." />
                                <button class="btn" style="display: none"></button>
                            </div>
                        </a>
                    </li>
                </ul>
                <a data-bs-toggle="modal" data-bs-target="#pencarian" class="pencarian-dekstop"><i
                        class="bi bi-search fs-2 me-2"></i></a>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

     {{-- Modal Pencarian --}}
     <div class="modal fade" id="pencarian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold text-content" style="color: #6777ef" id="exampleModalLabel"><i
                            class="bi bi-search"></i> Cari Tempat Kost</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mx-3">
                        <form id="form1">
                            <!-- Cari Kecamatan -->
                            <label for="selectOption" class="fw-bold mb-1">Area Kost di Kec. Kota Tasikmalaya</label>
                            <select name="id" id="selectOption" class="form-select">
                                <option disabled selected hidden>- Pilih Kecamatan -</option>
                                @foreach ($dataKec as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kc }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="formKecamatan()" class="form-control text-white mt-3"
                                style="background-color: #6777ef">Cari</button>
                        </form>
                        <form id="form2">
                            <!-- Cari Kampus -->
                            <label for="cari_kampus" class="fw-bold mb-1 mt-3">Sekitaran Kampus Kota Tasikmalaya</label>
                            <select id="selectOption2" class="form-select">
                                <option disabled selected hidden>- Pilih Kampus -</option>
                                @foreach ($dataKps as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kps }}</option>
                                @endforeach

                            </select>
                            <button type="button" onclick="formKampus()" class="form-control text-white mt-3"
                                style="background-color: #6777ef">Cari</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Script untuk cari kos --}}
    <script>
        function formKecamatan() {
            // Dapatkan nilai yang dipilih dari elemen select
            var selectedValue = document.getElementById('selectOption').value;

            // Buat URL berdasarkan nilai yang dipilih
            var url = '/kecamatan/' + selectedValue;

            // Redirect ke halaman yang dipilih
            window.location.href = url;
        }

        function formKampus() {
            // Dapatkan nilai yang dipilih dari elemen select
            var selectedValue = document.getElementById('selectOption2').value;

            // Buat URL berdasarkan nilai yang dipilih
            var url = '/kampus/' + selectedValue;

            // Redirect ke halaman yang dipilih
            window.location.href = url;
        }
    </script>

    <main id="main" class="mt-5">
        @yield('content')

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" style="background-color: #6777ef">
        <div class="container py-3">
            <div class="copyright">
                &copy; Created Project By <strong><span>Team Klik Kost</span></strong>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/indexUser/assets/vendor/aos/aos.js"></script>
    <script src="/indexUser/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/indexUser/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/indexUser/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/indexUser/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/indexUser/assets/js/main.js"></script>
</body>

</html>
