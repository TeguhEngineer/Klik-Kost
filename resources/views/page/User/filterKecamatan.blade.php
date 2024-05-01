@extends('layouts.kerangkaUser')
@section('content')
    <section>
        <div class="container">
            <p class="fs-3 fw-bold" style="color: #6777ef">Cari Kost</p>
            {{-- Untuk mengecek data kost berdasarkan id --}}
            @if ($kecamatan && $namaKec)

                <p class="fs-5 fw-bold" style="margin-top: -2%">Area Kost Di Kecamatan {{ $namaKec->nama_kc }}</p>
                <div class="row mt-4">
                    @if ($cek)
                        @foreach ($kecamatan as $item)
                            @if ($item->user->status == 'aktif')
                                <div class="col-lg-4 col-6 my-2">
                                    <div class="card">
                                        <div id="carouselExampleIndicators{{ $item->id }}" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="0" class="active" aria-current="true"
                                                    aria-label="Slide 1"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="3" aria-label="Slide 4"></button>
                                                <button type="button"
                                                    data-bs-target="#carouselExampleIndicators{{ $item->id }}"
                                                    data-bs-slide-to="4" aria-label="Slide 5"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                @if ($item->gambar->count() < 1)
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
                                                    @foreach ($item->gambar->skip(1) as $gambar)
                                                        <div class="carousel-item">
                                                            <img src="/galleryKost/{{ $gambar->url }}"
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
                                            <h5 class="fw-bold mt-1">{{ $item->nama_kost }}</h5>
                                            {{-- <p class="keterangan-mobile">{{ $item->deskripsi }}</p> --}}
                                            <div class="d-flex keterangan-mobile mt-2">
                                                <p><i class="bi bi-geo-alt-fill"></i> {{ $item->kecamatan->nama_kc }}</p>
                                                @if ($item->area_id == null)
                                                    <p class="ms-3"><i class="bi bi-geo-alt-fill"></i>Tidak Disertakan</p>
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
                                                    <span class="text-danger">1 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa2')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                                    <span class="text-danger">2 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa3')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                                    <span class="text-danger">3 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa4')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                                    <span class="text-danger">4 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'sisa5')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                                    <span class="text-danger">5 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'lebih5')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Tersisa
                                                    <span class="text-danger">Lebih dari 5 Kost
                                                    </span>
                                                </p>
                                            @elseif ($item->status_kost == 'penuh')
                                                <p class="keterangan-mobile"><i class="bi bi-door-open-fill"></i> Kost
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
                                <p class="text-center">Tidak ada data kost di kecamatan ini</p>
                            @endif
                        @endforeach
                    @else
                        <p class="text-center">Tidak ada data kost di kecamatan ini</p>
                    @endif
                </div>
            @else
                <h1 class="text-center text-secondary">Data tidak ditemukan</h1>

            @endif
        </div>
        <div class="border border-bottom border-secondary mx-5 mt-4"></div>
    </section>

    @include('page.User.rekomendasiKos')
@endsection
