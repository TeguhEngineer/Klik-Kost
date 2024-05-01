@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($dataKost as $item)
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Data Kos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Member.Datakos.edit')
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($dataKost as $status)
        <div class="modal fade" id="status{{ $status->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Status Kos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Member.Datakos.edit-status')
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
    @if (session()->has('edit'))
        <button type="button" style="display: none" id="edit"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('edit');

                // Simulasikan klik pada tombol
                button.click();
                button.style.display = 'none';
            };
        </script>
    @endif
    @if (session()->has('edit-status'))
        <button type="button" style="display: none" id="edit-status"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('edit-status');

                // Simulasikan klik pada tombol
                button.click();
                button.style.display = 'none';
            };
        </script>
    @endif

    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Data Kos</h1>
        </div>

        <div class="section-body">
            @if ($cekStatus->status == 'aktif')

                <div class="row">
                    <div class="col-12">
                        @if ($kost)
                            {{-- ketika sudah ada data kos maka akan menampilkan detail --}}
                            <div class="card shadow">
                                @foreach ($dataKost as $item)
                                    <div class="card-body pb-0">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_kost">Nama Kos</label>
                                                <input type="text" name="nama_kost" class="form-control" id="nama_kost"
                                                    placeholder="Nama Kos" value="{{ ucfirst($item->nama_kost) }}" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name">Pemilik</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="{{ ucfirst(auth()->user()->name) }}" disabled>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tipe Kos</label>
                                                <input type="text" class="form-control"
                                                    value="{{ ucfirst($item->tipe_kost) }}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="jumlah_kost">Jumlah Kos</label>
                                                <input type="number" name="jumlah_kost" class="form-control"
                                                    id="jumlah_kost" placeholder="Jumlah Kos"
                                                    value="{{ $item->jumlah_kost }}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Status</label>
                                                @if ($item->status_kost == 'sisa1')
                                                    <input type="text" class="form-control" disabled
                                                        value="Tersisa 1 Kost">
                                                @elseif ($item->status_kost == 'sisa2')
                                                    <input type="text" class="form-control" disabled
                                                        value="Tersisa 2 Kost">
                                                @elseif ($item->status_kost == 'sisa3')
                                                    <input type="text" class="form-control" disabled
                                                        value="Tersisa 3 Kost">
                                                @elseif ($item->status_kost == 'sisa4')
                                                    <input type="text" class="form-control" disabled
                                                        value="Tersisa 4 Kost">
                                                @elseif ($item->status_kost == 'sisa5')
                                                    <input type="text" class="form-control" disabled
                                                        value="Tersisa 5 Kost">
                                                @elseif ($item->status_kost == 'lebih5')
                                                    <input type="text" class="form-control" disabled
                                                        value="Tersisa 5 Kost Lebih">
                                                @elseif ($item->status_kost == 'penuh')
                                                    <input type="text" class="form-control" disabled value="Penuh">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Kecamatan</label>
                                                <input type="text" class="form-control"
                                                    value="{{ ucfirst($item->kecamatan->nama_kc) }}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Area Kampus</label>
                                                @if ($kost->area_id == null)
                                                    <input type="text" class="form-control" value="Belum ada Area Kampus"
                                                        disabled>
                                                @else
                                                    <input type="text" class="form-control"
                                                        value="{{ ucfirst($item->area->nama_kps) }}" disabled>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="link_maps">Link Maps</label>
                                                <input type="text" class="form-control" id="link_maps"
                                                    placeholder="Link Maps" value="{{ auth()->user()->link_maps }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" disabled>{{ ucfirst($item->deskripsi) }}</textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" cols="30" rows="10" disabled>{{ ucfirst(auth()->user()->alamat_kost) }}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="harga">Harga</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prependd">
                                                        <div class="input-group-text">Rp</div>
                                                    </div>
                                                    <input type="text" name="harga_kost" class="form-control"
                                                        id="harga" placeholder="Harga Kos"
                                                        value="{{ number_format($item->harga_kost, 0, ',', '.') }}"
                                                        disabled>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 text-center">
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit{{ $item->id }}"><i class="fas fa-edit"></i>
                                            Edit Data</button>
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#status{{ $item->id }}"><i class="fas fa-edit"></i> Edit Status</button>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            {{-- ketika belum memiliki data kos maka menampilkan form input --}}
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4> Input Data Kos</h4>
                                </div>
                                <form action="/datakos" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nama_kost">Nama Kos <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_kost" class="form-control"
                                                    id="nama_kost" placeholder="Nama Kos" value="{{ old('nama_kost') }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name">Pemilik</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="{{ auth()->user()->name }}" disabled>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tipe Kos <span class="text-danger">*</span></label>
                                                <select name="tipe_kost" class="form-control" required>
                                                    <option selected disabled>--- Pilih Tipe Kos ---</option>
                                                    <option value="{{ old('tipe_kost') }}"
                                                        {{ Request::old('tipe_kost') ? 'selected' : '' }} hidden>
                                                        {{ ucfirst(old('tipe_kost')) }}</option>
                                                    <option value="putra">Putra</option>
                                                    <option value="putri">Putri</option>
                                                    <option value="campur">Campur</option>
                                                </select>
                                                @error('tipe_kost')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ 'Tipe Kos tidak boleh kosong.' }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="jumlah_kost">Jumlah Kos <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="jumlah_kost"
                                                    class="form-control @error('jumlah_kost') is-invalid @enderror"
                                                    id="jumlah_kost" placeholder="Jumlah Kos"
                                                    value="{{ old('jumlah_kost') }}" required>
                                                @error('jumlah_kost')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ 'Jumlah Kos tidak boleh kosong.' }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Status <span class="text-danger">*</span></label>
                                                <select name="status_kost" class="form-control" required>
                                                    <option selected disabled>--- Pilih Status ---</option>
                                                    @if (old('status_kost') == 'sisa1')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Tersisa 1 Kost' }}</option>
                                                    @elseif (old('status_kost') == 'sisa2')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Tersisa 2 Kost' }}</option>
                                                    @elseif (old('status_kost') == 'sisa3')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Tersisa 3 Kost' }}</option>
                                                    @elseif (old('status_kost') == 'sisa4')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Tersisa 4 Kost' }}</option>
                                                    @elseif (old('status_kost') == 'sisa5')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Tersisa 5 Kost' }}</option>
                                                    @elseif (old('status_kost') == 'lebih5')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Tersisa 5 Kost Lebih' }}</option>
                                                    @elseif (old('status_kost') == 'penuh')
                                                        <option value="{{ old('status_kost') }}"
                                                            {{ Request::old('status_kost') ? 'selected' : '' }} hidden>
                                                            {{ 'Penuh' }}</option>
                                                    @endif
                                                    <option value="sisa1">Tersisa 1 Kost</option>
                                                    <option value="sisa2">Tersisa 2 Kost</option>
                                                    <option value="sisa3">Tersisa 3 Kost</option>
                                                    <option value="sisa4">Tersisa 4 Kost</option>
                                                    <option value="sisa5">Tersisa 5 Kost</option>
                                                    <option value="lebih5">Tersisa 5 Kost Lebih</option>
                                                    <option value="penuh">Penuh</option>
                                                </select>
                                                @error('status_kost')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ 'Status Kos tidak boleh kosong.' }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Kecamatan <span class="text-danger">*</span></label>
                                                <select name="kecamatan_id" class="form-control select2 " required>
                                                    <option selected disabled>--- Pilih Kecamatan ---</option>
                                                    @foreach ($kecamatan as $item)
                                                        @if (old('kecamatan_id'))
                                                            <option value="{{ $item->id }}"
                                                                {{ old('kecamatan_id') == $item->id ? 'selected' : '' }}>
                                                                {{ ucfirst($item->nama_kc) }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->nama_kc }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('kecamatan_id')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ 'Kecamatan tidak boleh kosong.' }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Area Kampus <span class="text-danger">*</span></label>
                                                <select name="area_id" class="form-control select2" required>
                                                    <option selected disabled value="">--- Pilih Area Kampus ---
                                                    </option>
                                                    @foreach ($areaKampus as $item)
                                                        @if (old('area_id'))
                                                            <option value="{{ $item->id }}"
                                                                {{ old('area_id') == $item->id ? 'selected' : '' }}>
                                                                {{ ucfirst($item->nama_kps) }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{ $item->nama_kps }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="link_maps">Link Maps</label>
                                                <input type="text" class="form-control" id="link_maps"
                                                    placeholder="Link Maps" value="{{ auth()->user()->link_maps }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                                                cols="30" rows="10" required>{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <span class="invalid-feedback">
                                                    <strong>{{ 'Masukan deskripsi tentang kosan Anda.' }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" cols="30" rows="10" disabled>{{ auth()->user()->alamat_kost }}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="harga">Harga <span class="text-danger">*</span></label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp</div>
                                                    </div>
                                                    <input type="number" name="harga_kost"
                                                        class="form-control @error('harga_kost') is-invalid @enderror"
                                                        id="harga" placeholder="Harga Kos"
                                                        value="{{ old('harga_kost') }}" required>
                                                    @error('harga_kost')
                                                        <span class="invalid-feedback">
                                                            <strong>{{ 'Masukan harga kosan Anda.' }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group mb-0">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                                <label class="form-check-label" for="gridCheck">
                                                    Ceklis untuk simpan
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </form>
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
