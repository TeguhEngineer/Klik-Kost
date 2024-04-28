@extends('layouts.kerangkaAdmin')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/datakost" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/datakost">Index</a></div>
                <div class="breadcrumb-item active"><a href="#">Detail Kos</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">

                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @if ($gambar->count(0))
                                            <div class="carousel-item active">
                                                <img class="d-block w-100"
                                                    src="/galleryKost/{{ $gambar[0]->url }}" alt="First slide">
                                            </div>
                                        @endif
                                        @foreach ($gambar->skip(1) as $item)
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="/galleryKost/{{ $item->url }}"
                                                    alt="First slide">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                @foreach ($showkost as $item)
                                    <div class="mt-3 border-bottom">
                                        <span class="fw-bold h6">Deskripsi</span> <br>
                                        <span>{{ $item->deskripsi }}</span>
                                    </div>
                                    <div class="mt-3 border-bottom">
                                        <span class="fw-bold h6">Alamat</span> <br>
                                        <span>{{ $item->user->alamat_kost }}</span>
                                    </div>
                                    <div class="mt-3 border-bottom">
                                        <span class="fw-bold h6">Maps</span> <br>
                                        <span><a href="{{ $item->user->link_maps }}">{{ $item->user->link_maps }}</a></span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-6 col-md-12">
                                @foreach ($showkost as $item)
                                    <table class="table">
                                        <tbody>


                                            <tr>
                                                <th>Nama Kost</th>
                                                <td>:</td>
                                                <td>{{ $item->nama_kost }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pemilik</th>
                                                <td>:</td>
                                                <td>{{ $item->user->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Tipe</th>
                                                <td>:</td>
                                                <td>{{ $item->tipe_kost }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah</th>
                                                <td>:</td>
                                                <td>{{ $item->jumlah_kost }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($item->status_kost == 'penuh')
                                                        <div class="badge badge-danger fw-bold">{{ $item->status_kost }}
                                                        </div>
                                                    @else
                                                        <div class="badge badge-success fw-bold">{{ $item->status_kost }}
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>No. Tlp</th>
                                                <td>:</td>
                                                <td>{{ $item->user->no_tlp }}</td>
                                            </tr>
                                            <tr>
                                                <th>Harga</th>
                                                <td>:</td>
                                                <td>
                                                    <div class="badge badge-danger fw-bold">
                                                        Rp{{ number_format($item->harga_kost, 0, ',', '.') }}</div>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>
@endsection
