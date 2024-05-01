@extends('layouts.kerangkaUser')
@section('content')
    <section>
        <div class="container">
            {{-- Untuk mengecek data kost berdasarkan id --}}
            @if ($detailKos)
                @if ($detailKos->user->status == 'aktif')
                    <p class="fs-3 fw-bold text-content" style="color: #6777ef">Detail Kost</p>
                    <div class="d-flex" style="overflow-x: auto">
                        @if ($gambarKos->count() < 1)
                            <div class="my-2 mx-2" style="flex: 0 0 auto; max-width: 300px">
                                <img src="/indexUser/assets/img/belumadagambar.jpg" alt=""
                                    style="width: 100%; max-height: 200px;" />
                            </div>
                        @else
                            @foreach ($gambarKos as $item)
                                <div class="my-2 mx-2" style="flex: 0 0 auto; max-width: 300px">
                                    <img src="/galleryKost/{{ $item->url }}" alt=""
                                        style="width: 100%; max-height: 200px;" />
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <div class="mt-3">
                        <h2 class="fw-bold" style="color: #6777ef">{{ $detailKos->nama_kost }}</h2>
                        <p class="text-a">{{ $detailKos->deskripsi }}</p>
                        <div class="border border-bottom border-secondary"></div>
                        <div class="row mt-3 text-a">
                            <div class="col-lg-3 col-6">
                                <p><i class="bi bi-geo-alt-fill"></i> Kecamatan {{ $detailKos->kecamatan->nama_kc }}</p>
                            </div>
                            <div class="col-lg-3 col-6">
                                @if ($detailKos->area_id == null)
                                    <p><i class="bi bi-geo-alt-fill"></i> Area Kampus tidak disertakan</p>
                                @else
                                    <p><i class="bi bi-geo-alt-fill"></i> Area Kampus {{ $detailKos->area->nama_kps }}</p>
                                @endif
                            </div>
                            <div class="col-lg-3 col-6">
                                <p><i class="bi bi-house-exclamation-fill"></i> Tipe Kost
                                    {{ ucfirst($detailKos->tipe_kost) }}
                                </p>
                            </div>
                            <div class="col-lg-3 col-6">
                                @if ($detailKos->status_kost == 'sisa1')
                                    <p><i class="bi bi-door-open-fill"></i> Tersisa <span class="text-danger">1 Kost</span>
                                    </p>
                                @elseif ($detailKos->status_kost == 'sisa2')
                                    <p><i class="bi bi-door-open-fill"></i> Tersisa <span class="text-danger">2 Kost</span>
                                    </p>
                                @elseif ($detailKos->status_kost == 'sisa3')
                                    <p><i class="bi bi-door-open-fill"></i> Tersisa <span class="text-danger">3 Kost</span>
                                    </p>
                                @elseif ($detailKos->status_kost == 'sisa4')
                                    <p><i class="bi bi-door-open-fill"></i> Tersisa <span class="text-danger">4 Kost</span>
                                    </p>
                                @elseif ($detailKos->status_kost == 'sisa5')
                                    <p><i class="bi bi-door-open-fill"></i> Tersisa <span class="text-danger">5 Kost</span>
                                    </p>
                                @elseif ($detailKos->status_kost == 'lebih5')
                                    <p><i class="bi bi-door-open-fill"></i> Tersisa <span class="text-danger">Lebih dari 5
                                            Kost</span></p>
                                @elseif ($detailKos->status_kost == 'penuh')
                                    <p><i class="bi bi-door-open-fill"></i><span class="text-danger">Kost Penuh</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="border border-bottom border-secondary"></div>
                        <div class="mt-3 text-a">
                            <p class="fw-bold"><i class="bi bi-geo-alt-fill"></i> Alamat Lengkap:</p>
                            <p class="text-b">{{ $detailKos->user->alamat_kost }}</p>
                            <p class="fw-bold"><i class="bi bi-geo-alt-fill"></i> Link Maps:</p>
                            <a href="{{ $detailKos->user->link_maps }}" target="_blank" style="text-decoration: underline">
                                <p class="text-b">{{ $detailKos->user->link_maps }}</p>
                            </a>
                        </div>
                        <div class="border border-bottom border-secondary"></div>
                        <div class="row mt-3 text-a">
                            <div class="col-lg-6">
                                <h4 class="fw-bold" style="color: #6777ef">Fasilitas</h4>
                                <ul style="display: flex; flex-wrap: wrap; margin-left: -6%">
                                    @if ($cekFas)
                                        @foreach ($fasilitas as $item)
                                            <li class="mx-3">{{ $item->fasilitas->nama_fas }}</li>
                                        @endforeach
                                    @else
                                        <p>Belum ada fasilitas</p>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold" style="color: #6777ef">Harga Kost</h4>
                                <h4 class="text-c">Rp {{ number_format($detailKos->harga_kost, 0, ',', '.') }} / Bulan</h4>
                                <p class="text-danger text-c" style="font-size: 12px">*Syarat dan Ketentuan Berlaku</p>
                            </div>
                        </div>
                        <div class="border border-bottom border-secondary"></div>
                        <div class="mt-4 text-a d-flex">
                            <img src="/assets/img/avatar/avatar-1.png" alt="Gambar Member"
                                class="rounded-pill border border-secondary img-a">
                            <p class="ms-3 my-auto">Kost dikelola oleh <span
                                    class="fw-bold">{{ $detailKos->user->name }}</span><br> No. Telepon
                                <a href="https://api.whatsapp.com/send?phone={{ $detailKos->user->no_tlp }}"
                                    target="_blank">{{ $detailKos->user->no_tlp }}</a>
                            </p>
                        </div>
                    </div>
                @else
                    <h1 class="text-center fw-bold text-secondary my-5">Data kos ini Non-aktif</h1>
                @endif
            @else
                <h1 class="text-center text-secondary">Data kos tidak ditemukan</h1>
            @endif
        </div>
    </section>
@endsection
