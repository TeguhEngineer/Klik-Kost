@extends('layouts.kerangkaAdmin')

@section('content')
    @foreach ($data as $item)
        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Profil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @include('page.Member.Profile.editProfil')
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="modal-edit-password{{ $dataUser->id }}" data-user-id="{{ $dataUser->id }}" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @include('page.Member.Profile.editPassword')
            </div>
        </div>
    </div>


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
    
    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Profil</h1>
            <button type="button" class="tombolClass" style="display: none" id="edit-password"></button>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header justify-content-center pb-1 pl-4">
                            <figure class="avatar mr-2 avatar-xl">
                                <img src="/assets/img/avatar/avatar-1.png" alt="...">

                                @if ($dataUser->status == 'aktif')
                                    <i class="avatar-presence online" data-toggle="popover" title="Aktif"  data-trigger="focus"></i>
                                @else
                                    <i class="avatar-presence busy" data-toggle="popover" title="Non-aktif"  data-trigger="focus"></i>
                                @endif
                            </figure>
                        </div>
                        <div class="card-body pt-0">
                            <h6 class="text-center mb-3">Member</h6>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control"
                                    value="{{ ucfirst($dataUser->name) }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telepon</label>
                                <input type="text" id="telp" class="form-control" value="{{ $dataUser->no_tlp }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" class="form-control"
                                    value="{{ ucfirst($dataUser->status) }}" disabled>
                            </div>
                        </div>
                        <div class="card-footer pt-0 text-center">
                            <button class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modal-edit{{ $dataUser->id }}"><i class="fas fa-edit"></i> Edit
                                Profil</button>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-edit-password{{ $dataUser->id }}"><i class="fas fa-key"></i> Edit
                                Password</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

@section('js')
    {{-- @error('password') --}}
    <script>
        $(document).ready(function() {
            // Ketika salah satu form edit password di-submit
            $('form[id^="editPasswordForm"]').submit(function(event) {
                event.preventDefault(); // Mencegah form dari submit secara default

                var userId = $(this).closest('.modal').data('user-id'); // Ambil ID pengguna dari data modal

                // Lakukan AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(), // Mengambil data form
                    success: function(response) {
                        // Jika edit password berhasil, tutup modal
                        $('#modal-edit-password' + userId).hide();
                        $('#editPasswordError' + userId).empty();
                        $('.tombolClass').click();
                        setTimeout(function() {
                            location.reload(); // Merefresh halaman
                        }, 2000);



                    },
                    error: function(xhr, status, error) {
                        // Jika edit password gagal, tampilkan kembali modal dengan pesan error
                        $('#editPasswordError' + userId).html(
                            'Password tidak sama'
                        ); // Menampilkan pesan error di kolom input password
                        $('#editPasswordModal' + userId).show();
                    }
                });
            });
        });

    </script>
    {{-- @enderror --}}
@endsection
