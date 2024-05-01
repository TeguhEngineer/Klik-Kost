<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Klik Kost</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="/indexUser/assets/img/logo.png" rel="icon" />
    <link href="/indexUser/assets/img/logo.png" rel="apple-touch-icon" />

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
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="/"><img src="/indexUser/assets/img/logo.png" alt="Logo Klik Kost" /></a>
                <h1 class="my-auto ms-2 fw-bold"><a href="/">Klik-Kost</a></h1>
            </div>

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
                    <li><a class="getstarted scrollto shadow-sm" href="/login">Login</a></li>
                </ul>
                <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
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
                                @foreach ($kecamatan as $item)
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
                                @foreach ($kampus as $item)
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="margin-top: -45px">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up">
                    <div>
                        <h1>
                            Selamat Datang di <br />
                            Klik-Kost
                        </h1>
                        <h2>Jelajahi Pilihan Kost Terbaikmu Melalui Website Kami</h2>
                        <a href="/login" class="download-btn"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        <a href="/register" class="download-btn"><i class="bi bi-pencil-square"></i> Register</a>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img"
                    data-aos="fade-up">
                    <img src="/indexUser/assets/img/vektor3.png" class="img-fluid" alt="Logo Image"
                        style="filter: drop-shadow(50px 50px 0 0 #000)" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= App Features Section ======= -->
        <section>
            <div class="container">
                <h2 class="fw-bold text-mobile" style="color: #6777ef">Area Kost di Kec. Kota Tasikmalaya</h2>

                <div class="scroll-container text-center mt-3">
                    @if ($kecamatan)

                        @foreach ($kecamatan as $item)
                            <a href="/kecamatan/{{ $item->id }}">
                                <div class="card bg-secondary text-white scroll-content mx-1 box">
                                    <div class="text-center">
                                        <h4 class="text-content">{{ $item->nama_kc }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a href="#">
                            <div class="card bg-secondary text-white scroll-content mx-1 box">
                                <div class="text-center text-wrap">
                                    <h4 class="text-content">Data tidak ditemukan</h4>
                                </div>
                            </div>
                        </a>

                    @endif
                </div>
                <div class="my-3">
                    <a data-bs-toggle="modal" data-bs-target="#kecamatan"
                        class="btn text-white lihat-semua text-content">Lihat Semua <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                <!-- Modal -->
                <div class="modal fade modal-lg" id="kecamatan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold text-content" style="color: #6777ef"
                                    id="exampleModalLabel">Area Kost di Kec. Kota Tasikmalaya</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    @if ($kecamatan)
                                        @foreach ($kecamatan as $item)
                                            <div class="col-lg-3 col-4 my-2">
                                                <a href="/kecamatan/{{ $item->id }}">
                                                    <div class="card bg-secondary text-white mx-1"
                                                        style="padding: 50px 0px 50px 0px">
                                                        <div class="text-center">
                                                            <h4 class="text-content">{{ $item->nama_kc }}</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-lg-3 col-4 my-2">
                                            <a href="#">
                                                <div class="card bg-secondary text-white mx-1"
                                                    style="padding: 50px 0px 50px 0px">
                                                    <div class="text-center text-wrap">
                                                        <h4 class="text-content">Data tidak ditemukan</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-bottom border-secondary mx-5 mt-4"></div>
        </section>
        <!-- End App Features Section -->

        <section class="margin-responsiv">
            <div class="container">
                <h2 class="fw-bold text-mobile" style="color: #6777ef">Sekitaran Kampus Kota Tasikmalaya</h2>
                <div class="scroll-container mt-3">
                    @if ($kampus)
                        @foreach ($kampus as $item)
                            <a href="/kampus/{{ $item->id }}">
                                <div class="card bg-secondary text-white scroll-content mx-1 box">
                                    <div class="text-center">
                                        <h4 class="text-content text-wrap">{{ $item->nama_kps }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a href="#">
                            <div class="card bg-secondary text-white scroll-content mx-1 box">
                                <div class="text-center">
                                    <h4 class="text-content text-wrap">Data tidak ditemukan</h4>
                                </div>
                            </div>
                        </a>

                    @endif
                </div>
                <div class="my-3">
                    <a data-bs-toggle="modal" data-bs-target="#kampus"
                        class="btn text-white lihat-semua text-content">Lihat Semua <i
                            class="bi bi-arrow-right"></i></a>
                </div>
                <!-- Modal -->
                <div class="modal fade modal-lg" id="kampus" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold text-content" style="color: #6777ef"
                                    id="exampleModalLabel">Area Kost di Kampus Kota Tasikmalaya</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    @if ($kampus)
                                        @foreach ($kampus as $item)
                                            <div class="col-lg-3 col-4 my-2">
                                                <a href="/kampus/{{ $item->id }}">
                                                    <div class="card bg-secondary text-white mx-1"
                                                        style="padding: 50px 0px 50px 0px; max-height:150px;">
                                                        <div class="text-center">
                                                            <h4 class="text-content">{{ $item->nama_kps }}</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-lg-3 col-4 my-2">
                                            <a href="#">
                                                <div class="card bg-secondary text-white mx-1"
                                                    style="padding: 50px 0px 50px 0px; max-height:150px;">
                                                    <div class="text-center text-wrap">
                                                        <h4 class="text-content">Data tidak ditemukan</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-bottom border-secondary mx-5 mt-4"></div>
        </section>

        <section class="margin-responsiv">
            <div class="container">
                <h2 class="fw-bold text-mobile text-center" style="color: #6777ef">
                    Rekomendasi Kost <br />
                    Kota Tasikmalaya
                </h2>
                <div class="row mt-4">
                    @if ($cek)
                        @foreach ($dataKos as $item)
                            @if ($item->user->status == 'aktif')
                                <div class="col-lg-4 col-6 my-2">
                                    <div class="card">
                                        
                                        <div id="carouselExampleIndicators{{ $item->id }}"
                                            class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="0" class="active bg-dark" aria-current="true"
                                                    aria-label="Slide 1"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="1" class="bg-dark"
                                                    aria-label="Slide 2"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="2" class="bg-dark"
                                                    aria-label="Slide 3"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="3" class="bg-dark"
                                                    aria-label="Slide 4"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="4" class="bg-dark"
                                                    aria-label="Slide 5"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                @if ($item->gambar->count()  < 1)
                                                <div class="carousel-item active">
                                                    <img src="/indexUser/assets/img/belumadagambar.jpg"
                                                        class="d-block w-100 ukuran" alt="..." />
                                                </div>
                                                @else
                                                @if ($item->gambar->count(0))
                                                    <div class="carousel-item active">
                                                        <img src="/galleryKost/{{ $item->gambar[0]->url }}"
                                                            class="d-block w-100 ukuran" alt="..." />
                                                    </div>
                                                @endif
                                                @foreach ($item->gambar->skip(1) as $gbr)
                                                    <div class="carousel-item">
                                                        <img src="/galleryKost/{{ $gbr->url }}"
                                                            class="d-block w-100 ukuran" alt="..." />
                                                    </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>


                                        <div class="card card-footer text-content">
                                            <h5 class="fw-bold my-1">{{ $item->nama_kost }}</h5>
                                            {{-- <p class="keterangan-mobile">{{ $item->deskripsi }}
                                            </p> --}}
                                            <div class="d-flex keterangan-mobile mt-2">
                                                <p><i class="bi bi-geo-alt-fill"></i>Kec.
                                                    {{ $item->kecamatan->nama_kc }}
                                                </p>
                                                @if ($item->area_id == null)
                                                    <p class="ms-3"><i class="bi bi-geo-alt-fill"></i>Tidak
                                                        Disertakan
                                                    </p>
                                                @else
                                                    <p class="ms-3"><i
                                                            class="bi bi-geo-alt-fill"></i>{{ $item->area->nama_kps }}
                                                    </p>
                                                @endif
                                            </div>
                                            <p class="keterangan-mobile"><i class="bi bi-house-exclamation-fill"></i>
                                                Tipe
                                                Kost
                                                <span>{{ ucfirst($item->tipe_kost) }}</span>
                                            </p>

                                            @if ($item->status_kost == 'sisa1')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Tersisa
                                                    <span class="text-danger">1 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa2')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Tersisa
                                                    <span class="text-danger">2 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa3')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Tersisa
                                                    <span class="text-danger">3 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa4')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Tersisa
                                                    <span class="text-danger">4 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa5')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Tersisa
                                                    <span class="text-danger">5 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'lebih5')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Tersisa
                                                    <span class="text-danger">Lebih dari 5 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'penuh')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i>
                                                    Kost
                                                    <span class="text-danger">Penuh
                                                    </span>
                                                </p>
                                            @endif

                                            <a href="/detailkos/{{ $item->id }}"
                                                class="btn btn-detail text-white text-content">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <h3 class="text-center text-secondary">Belum ada data Kost</h3>
                    @endif
                </div>
            </div>
        </section>
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
