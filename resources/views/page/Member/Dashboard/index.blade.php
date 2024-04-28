@extends('layouts.kerangkaAdmin')

@section('content')
    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            @if ($cekStatus->status == 'aktif')
                @if ($cekdataKos)
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="card shadow">
                                <div class="card-body px-0 pt-0">
                                    {{-- Gambar --}}
                                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active">
                                            </li>
                                            <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                                            <li data-target="#carouselExampleIndicators3" data-slide-to="3"></li>
                                            <li data-target="#carouselExampleIndicators3" data-slide-to="4"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            @if ($gambar->count(0))
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="/galleryKost/{{ $gambar[0]->url }}"
                                                        alt="First slide">
                                                </div>
                                            @endif
                                            @foreach ($gambar->skip(1) as $item)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="/galleryKost/{{ $item->url }}"
                                                        alt="First slide">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                    {{-- Data --}}
                                    <div class="mt-4 px-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Kos</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly=""
                                                    value="{{ $dataKost->nama_kost }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tipe Kos</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly=""
                                                    value="{{ $dataKost->tipe_kost }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jumlah Kos</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly=""
                                                    value="{{ $dataKost->jumlah_kost }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status Kos</label>
                                            <div class="col-sm-9">
                                                @if ($dataKost->status_kost == 'sisa1')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Tersisa 1 Pintu">
                                                @elseif ($dataKost->status_kost == 'sisa2')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Tersisa 2 Pintu">
                                                @elseif ($dataKost->status_kost == 'sisa3')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Tersisa 3 Pintu">
                                                @elseif ($dataKost->status_kost == 'sisa4')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Tersisa 4 Pintu">
                                                @elseif ($dataKost->status_kost == 'sisa5')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Tersisa 5 Pintu">
                                                @elseif ($dataKost->status_kost == 'lebih5')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Tersisa 5 Pintu Lebih">
                                                @elseif ($dataKost->status_kost == 'penuh')
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Penuh">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly=""
                                                    value="{{ $dataKost->kecamatan->nama_kc }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Area Kampus</label>
                                            <div class="col-sm-9">
                                                @if ($dataKost->area_id == null)
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Belum ada Area Kampus">
                                                @else
                                                    <input type="text" class="form-control" readonly=""
                                                        value="{{ $dataKost->area->nama_kps }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Link Maps</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly=""
                                                    value="{{ auth()->user()->link_maps }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" readonly="" id="" cols="30" rows="10">{{ $dataKost->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" readonly="" id="" cols="30" rows="10">{{ auth()->user()->alamat_kost }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" readonly=""
                                                    value="Rp{{ number_format($dataKost->harga_kost, 0, ',', '.') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- <h1>Data Kos belum ada</h1> --}}

                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="hero align-items-center bg-primary text-white">
                                <div class="hero-inner text-center">
                                    <h2>Hello, Selamat Datang {{ auth()->user()->name }}</h2>
                                    <p class="lead">Data Anda sudah terverifikasi, silahkan masukan data kos Anda.
                                    </p>
                                    <div class="mt-4">
                                        <a href="/datakos" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                                class="fas fa-warehouse"></i>Data kos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="hero align-items-center bg-warning text-white">
                            <div class="hero-inner text-center">
                                <h2>Hello, Selamat Datang {{ auth()->user()->name }}</h2>
                                <p class="lead">Data anda sedang kami tinjau dan pastikan data anda benar. Terimakasih
                                </p>
                                <div class="mt-4">
                                    <a href="/profil" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                            class="fas fa-user"></i>Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
