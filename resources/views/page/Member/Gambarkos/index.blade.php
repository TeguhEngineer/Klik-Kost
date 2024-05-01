@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($gambar as $item)
        <div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    @include('page.Member.Gambarkos.delete')
                </div>
            </div>
        </div>
    @endforeach

    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Gambar Kos</h1>
            @if (session()->has('gambar'))
                <button type="button" style="display: none" id="eror-gambar"></button>
                <script>
                    // Fungsi ini akan dipanggil saat halaman dimuat
                    window.onload = function() {
                        // Mengambil referensi tombol
                        var button = document.getElementById('eror-gambar');

                        // Simulasikan klik pada tombol
                        button.click();
                        button.style.display = 'none';
                    };
                </script>
            @endif
            @if (session()->has('create'))
                <button type="button" style="display: none" id="create"></button>
                <script>
                    // Fungsi ini akan dipanggil saat halaman dimuat
                    window.onload = function() {
                        // Mengambil referensi tombol
                        var button = document.getElementById('create');

                        // Simulasikan klik pada tombol
                        button.click();
                        button.style.display = 'none';
                    };
                </script>
            @endif
            @if (session()->has('delete'))
                <button type="button" style="display: none" id="delete"></button>
                <script>
                    // Fungsi ini akan dipanggil saat halaman dimuat
                    window.onload = function() {
                        // Mengambil referensi tombol
                        var button = document.getElementById('delete');

                        // Simulasikan klik pada tombol
                        button.click();
                        button.style.display = 'none';
                    };
                </script>
            @endif
            @error('files.*')
                <button type="button" style="display: none" id="eror-ukuran-gambar"></button>
                <script>
                    // Fungsi ini akan dipanggil saat halaman dimuat
                    window.onload = function() {
                        // Mengambil referensi tombol
                        var button = document.getElementById('eror-ukuran-gambar');

                        // Simulasikan klik pada tombol
                        button.click();
                        button.style.display = 'none';
                    };
                </script>
            @enderror
        </div>

        <div class="section-body">

            @if ($cekStatus->status == 'aktif')
                <div class="row">
                    <div class="col-12">
                        @if ($idkos)
                            {{-- Ketika data kos ada maka menampilkan form input gambar --}}
                            @if ($gambar->count() < 5)
                                <div class="card shadow">
                                    <form action="/gambarkos" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="hidden" name="kost_id" value="{{ $idkos->id }}">
                                                    <span class="text-danger text-italic"><em>*Jumlah gambar maximal 5 dan
                                                            Ukuran gambar maximal 3mb</em></span>
                                                    <input type="file" name="files[]"
                                                        class="form-control @error('files') is-invalid @enderror"
                                                        accept="image/*" multiple="" required>

                                                    @error('files')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer pt-0 text-right">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                                Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            @endif

                            <div class="card shadow">
                                <div class="card-body p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col" class="pl-4">Gambar</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        @foreach ($gambar as $item)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>

                                                        <div class="gallery gallery-md mt-2 justify-content-center">
                                                            <div class="gallery-item"
                                                                data-image="/galleryKost/{{ $item->url }}"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete{{ $item->id }}"><i
                                                                class="fas fa-trash"></i></button>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="hero align-items-center bg-primary text-white">
                                <div class="hero-inner text-center">
                                    <h5 class="lead fw-bold">Mohon untuk input data Kos terlebih dahulu!</h5>
                                    <div class="mt-4">
                                        <a href="/datakos" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                                class="fas fa-warehouse"></i> Data Kos</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            @else
                <div class="hero align-items-center bg-warning text-white">
                    <div class="hero-inner text-center">
                        <h5 class="lead fw-bold">Akun anda belum terverifikasi, mohon untuk menunggu...</h5>
                        <div class="mt-4">
                            <a href="/profil" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                    class="fas fa-user"></i> Profil</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
