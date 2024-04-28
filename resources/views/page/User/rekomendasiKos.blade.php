<section class="margin-responsiv">
    <h2 class="fw-bold text-mobile text-center">Cari di Daerah Lain</h2>
    <div class="container mt-3">
        <h3 class="fw-bold text-mobile" style="color: #6777ef">Area Kost di Kec. Kota Tasikmalaya</h3>

        <div class="scroll-container text-center mt-3">
            @if ($dataKec)
                @foreach ($dataKec as $item)
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
                        <div class="text-center">
                            <h4 class="text-content text-wrap">Data tidak ditemukan</h4>
                        </div>
                    </div>
                </a>
            @endif

        </div>
        <div class="my-3">
            <a data-bs-toggle="modal" data-bs-target="#kecamatan" class="btn text-white lihat-semua text-content">Lihat
                Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-lg" id="kecamatan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold text-content" style="color: #6777ef" id="exampleModalLabel">
                            Area Kost di Kec. Kota Tasikmalaya</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @if ($dataKec)
                                @foreach ($dataKec as $item)
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

<section class="margin-responsiv">
    <div class="container">
        <h2 class="fw-bold text-mobile" style="color: #6777ef">Sekitaran Kampus Kota Tasikmalaya</h2>
        <div class="scroll-container mt-3">
            @if ($dataKps)
                @foreach ($dataKps as $item)
                    <a href="/kampus/{{ $item->id }}">
                        <div class="card bg-secondary text-white scroll-content mx-1 box">
                            <div class="text-center">
                                <h4 class="text-content">{{ $item->nama_kps }}</h4>
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
            <a data-bs-toggle="modal" data-bs-target="#kampus" class="btn text-white lihat-semua text-content">Lihat
                Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-lg" id="kampus" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold text-content" style="color: #6777ef" id="exampleModalLabel">
                            Area Kost di Kec. Kota Tasikmalaya</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @if ($dataKps)
                                @foreach ($dataKps as $item)
                                    <div class="col-lg-3 col-4 my-2">
                                        <a href="/kampus/{{ $item->id }}">
                                            <div class="card bg-secondary text-white mx-1"
                                                style="padding: 50px 0px 50px 0px">
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

<section class="margin-responsiv">
    <div class="container">
        <h2 class="fw-bold text-mobile text-center" style="color: #6777ef;">Rekomendasi Lain</h2>
        <div class="row mt-4">
            @if ($cekData)
                @foreach ($dataKos as $item)
                    @if ($item->user->status == 'aktif')
                        <div class="col-lg-4 col-6 my-2">
                            <div class="card">
                                <div id="carouselRekomendasi{{ $item->id }}" class="carousel slide">
                                    <div class="carousel-indicators">
                                        <button type="button"
                                            data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                            data-bs-slide-to="0" class="active bg-dark" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button"
                                            data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                            data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
                                        <button type="button"
                                            data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                            data-bs-slide-to="2" class="bg-dark" aria-label="Slide 3"></button>
                                        <button type="button"
                                            data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                            data-bs-slide-to="3" class="bg-dark" aria-label="Slide 4"></button>
                                        <button type="button"
                                            data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                            data-bs-slide-to="4" class="bg-dark" aria-label="Slide 5"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        @if ($item->gambar->count(0))
                                            <div class="carousel-item active">
                                                <img src="/galleryKost/{{ $item->gambar[0]->url }}"
                                                    class="d-block w-100 ukuran" alt="..." />
                                            </div>
                                        @endif
                                        @foreach ($item->gambar->skip(1) as $img)
                                            <div class="carousel-item">
                                                <img src="/galleryKost/{{ $img->url }}"
                                                    class="d-block w-100 ukuran" alt="..." />
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselRekomendasi{{ $item->id }}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="card card-footer text-content">
                                    <h5 class="fw-bold mt-1">{{ $item->nama_kost }}</h5>
                                    <p class="keterangan-mobile">{{ $item->deskripsi }}</p>
                                    <div class="d-flex keterangan-mobile">
                                        <p><i class="bi bi-geo-alt-fill"></i> {{ $item->kecamatan->nama_kc }}</p>
                                        @if ($item->area_id == null)
                                            <p class="ms-3"><i class="bi bi-geo-alt-fill"></i>Tidak Disertakan
                                            </p>
                                        @else
                                            <p class="ms-3"><i
                                                    class="bi bi-geo-alt-fill"></i>{{ $item->area->nama_kps }}
                                            </p>
                                        @endif
                                    </div>
                                    <p class="keterangan-mobile"><i class="bi bi-house-exclamation-fill"></i> Tipe
                                        Kost
                                        <span>{{ ucfirst($item->tipe_kost) }}</span>
                                    </p>

                                    @if ($item->status_kost == 'sisa1')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                            <span class="text-danger">1 Kamar
                                            </span>
                                        </p>
                                    @elseif ($item->status_kost == 'sisa2')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                            <span class="text-danger">2 Kamar
                                            </span>
                                        </p>
                                    @elseif ($item->status_kost == 'sisa3')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                            <span class="text-danger">3 Kamar
                                            </span>
                                        </p>
                                    @elseif ($item->status_kost == 'sisa4')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                            <span class="text-danger">4 Kamar
                                            </span>
                                        </p>
                                    @elseif ($item->status_kost == 'sisa5')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                            <span class="text-danger">5 Kamar
                                            </span>
                                        </p>
                                    @elseif ($item->status_kost == 'lebih5')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                            <span class="text-danger">Lebih dari 5 Kamar
                                            </span>
                                        </p>
                                    @elseif ($item->status_kost == 'penuh')
                                        <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Kamar
                                            <span class="text-danger">Penuh
                                            </span>
                                        </p>
                                    @endif

                                    <a href="/detailkos/{{ $item->id }}"
                                        class="btn btn-detail text-white text-content">Detail</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 class="text-center text-secondary">Belum ada data Kost</h3>
                    @endif
                @endforeach
            @else
                <h3 class="text-center text-secondary">Belum ada data Kost</h3>

            @endif
        </div>
    </div>
</section>
