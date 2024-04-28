@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($verifikasi as $item)
        <div class="modal fade" id="modal-verifikasi{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/verifikasi/{{ $item->id }}" method="POST">
                        <div class="modal-body pb-0">
                            <h6>Apakah anda yakin? data ini akan diverifikasi.</h6>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="aktif">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Ya</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @if (session()->has('verifikasi'))
        <button type="button" style="display: none" id="verifikasi"></button>
        <script>
            // Fungsi ini akan dipanggil saat halaman dimuat
            window.onload = function() {
                // Mengambil referensi tombol
                var button = document.getElementById('verifikasi');

                // Simulasikan klik pada tombol
                button.click();
                button.style.display = 'none';
            };
        </script>
    @endif

    <section class="section">
        <div class="section-header">
            <h1>User verifikasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Index</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
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
                                            <th>Alamat Kost</th>
                                            <th>Link Maps</th>
                                            <th>Status</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    @foreach ($verifikasi as $item)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->no_tlp }}</td>
                                                <td>{{ $item->alamat_kost }}</td>
                                                <td>{{ $item->link_maps }}</td>
                                                <td>
                                                    <div class="badge badge-danger">{{ $item->status }}</div>
                                                </td>
                                                <td class="d-flex">
                                                    {{-- <form action="/verifikasi/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="aktif"> --}}
                                                    <button class="btn btn-success mx-2" data-bs-toggle="modal"
                                                        data-bs-target="#modal-verifikasi{{ $item->id }}"><i
                                                            class="fas fa-check"></i></button>
                                                    {{-- </form> --}}

                                                    {{-- <button class="btn btn-danger"><i class="fas fa-times"></i></button> --}}
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
