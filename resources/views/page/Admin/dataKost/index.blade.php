@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($datakost as $item)
        <div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Admin.dataKost.delete')
                </div>
            </div>
        </div>
    @endforeach

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
        <div class="section-header">
            <h1>Data Kost</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Index</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card pt-3 shadow">
                        <div class="card-header-action">

                            {{-- <a class="btn btn-icon icon-left btn-info ml-4 text-white"><i class="fas fa-filter"></i>
                                Filter</a> --}}

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
                                            <th>Nama Kos</th>
                                            <th>Pemilik</th>
                                            <th>Kecamatan</th>
                                            <th>Area Kampus</th>
                                            <th>Status</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    @foreach ($datakost as $item)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $item->nama_kost }}
                                                </td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->kecamatan->nama_kc }}</td>
                                                @if ($item->area_id == null)
                                                    <td>Tidak ada Area Kampus</td>
                                                @else
                                                    <td>{{ $item->area->nama_kps }}</td>
                                                @endif
                                                <td>
                                                    @if ($item->user->status == 'non-aktif')
                                                        <div class="badge badge-danger">non-aktif</div>
                                                    @elseif ($item->user->status == 'aktif')
                                                        <div class="badge badge-success">aktif</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/datakost/{{ $item->id }}" class="btn btn-info"><i
                                                            class="fas fa-list"></i></a>

                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete{{ $item->id }}"><i
                                                            class="fas fa-trash"></i></button>
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
