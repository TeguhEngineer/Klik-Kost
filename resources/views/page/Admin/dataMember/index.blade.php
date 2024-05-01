@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($datamember as $item)
        <div class="modal fade" id="modal-detail{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Detail Data Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Admin.dataMember.detail')
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($datamember as $item)
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Data Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Admin.dataMember.edit')
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($datamember as $item)
        <div class="modal fade" id="modal-edit-password{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Password Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Admin.dataMember.edit-password')
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($datamember as $item)
        <div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Admin.dataMember.delete')
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
    @if (session()->has('edit-password'))
        <button type="button" style="display: none" id="edit-password"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('edit-password');

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
    @error('password')
        <button type="button" style="display: none" id="gagal-edit-password"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('gagal-edit-password');

                // Simulasikan klik pada tombol
                button.click();
                button.style.display = 'none';
            };
        </script>
    @enderror

    <section class="section">
        <div class="section-header">
            <h1>Data Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Index</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card pt-3 shadow">
                        <div class="card-header-action">
                            <a href="/datamember/create" class="btn btn-icon icon-left btn-primary ml-4">
                                <i class="fas fa-user-plus"></i>
                                Tambah Member
                            </a>

                            {{-- <button class="btn btn-icon icon-center btn-warning rounded-circle mr-4 float-end"><i
                                    class="fas fa-info"></i></button> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>No Hp</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($datamember as $item)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->no_tlp }}</td>
                                                <td>
                                                    <div class="badge badge-primary">{{ $item->role }}</div>
                                                </td>
                                                <td>
                                                    @if ($item->status == 'non-aktif')
                                                        <div class="badge badge-danger">non-aktif</div>
                                                    @elseif ($item->status == 'aktif')
                                                        <div class="badge badge-success">aktif</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#modal-detail{{ $item->id }}"><i
                                                            class="fas fa-list"></i></button>

                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit{{ $item->id }}"><i
                                                            class="fas fa-edit"></i></button>
                                                    @if ($dataKos->where('user_id', $item->id)->count() > 0)
                                                        <button class="btn btn-secondary" type="button"
                                                            class="btn btn-primary" data-toggle="tooltip"
                                                            data-placement="top" title="Member memiliki data Kost."><i
                                                                class="fas fa-trash"></i></button>
                                                    @else
                                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete{{ $item->id }}"><i
                                                                class="fas fa-trash"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
