@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($Fasilitas as $item)
        <div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">


                    @include('page.Member.Fasilitaskos.delete')
                </div>
            </div>
        </div>
    @endforeach

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
    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Fasilitas</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Index</a></div>
            </div> --}}
        </div>

        <div class="section-body">

            @if ($cekStatus->status == 'aktif')
                <div class="row">
                    <div class="col-12">
                        @if ($cekdataKos)
                            {{-- Ketika data kos ada maka menampilkan form input fasilitas --}}
                            <div class="card shadow">
                                <form action="/fasilitaskos" method="POST">
                                    @csrf
                                    <div class="card-body pb-0">
                                        <label for="">Input Fasilitas</label>

                                        <div class="form-group mt-3">
                                            <input type="hidden" name="insert_type" value="select">

                                            <input type="hidden" name="kost_id" value="{{ $idkos->id }}">
                                            <select name="fasilitas_id[]" class="form-control select2" multiple required>
                                                @foreach ($dataFasilitas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_fas }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer pt-0">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                            Simpan</button>
                                        <button class="btn btn-secondary" type="button" data-toggle="collapse"
                                            data-target="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample"><i class="fas fa-list"></i> Input Fasilitas
                                            Lain</button>
                                    </div>
                                </form>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="card shadow">
                                    <form action="/fasilitaskos" method="POST">
                                        @csrf
                                        <div class="card-body pb-0">
                                            <label for="">Input Fasilitas Lainnya</label>

                                            <div class="form-group mt-3">
                                                <input type="hidden" name="insert_type" value="input">
                                                <input type="hidden" name="kost_id" value="{{ $idkos->id }}">
                                                <input type="text" name="nama_fas" class="form-control">
                                            </div>

                                        </div>
                                        <div class="card-footer pt-0">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                                Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="card shadow">
                                <div class="card-body p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Fasilitas</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        @foreach ($Fasilitas as $item)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ ucfirst($item->fasilitas->nama_fas) }}</td>
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
                            {{-- Jika data kos belum ada maka menampilkan pesan --}}
                            <div class="hero align-items-center bg-primary text-white">
                                <div class="hero-inner text-center">
                                    {{-- <h2>Perhatian</h2> --}}
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
