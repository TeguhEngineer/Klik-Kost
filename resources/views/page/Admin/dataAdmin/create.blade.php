@extends('layouts.kerangkaAdmin')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/dataadmin" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/dataadmin">Index</a></div>
                <div class="breadcrumb-item active"><a href="#">Tambah Admin</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 shadow">
                        <form action="/dataadmin" method="post">
                            @csrf
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="number" name="no_tlp"
                                                class="form-control @error('no_tlp') is-invalid @enderror" value="{{ old('no_tlp') }}" required>
                                            @error('no_tlp')
                                                <div class="invalid-feedback">
                                                    {{ 'Nomor telepon minimal 12 & maksimal 13 karakter' }}
                                                </div>
                                            @enderror
                                        </div>

                                        <input type="hidden" name="alamat_kost" value="admin">
                                        <input type="hidden" name="link_maps" value="admin">
                                        <select name="status" hidden>
                                            <option value="aktif" selected hidden>-</option>
                                        </select>
                                        <select name="role" hidden>
                                            <option value="admin" selected hidden>admin</option>
                                        </select>


                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" required>

                                        </div>
                                        <div class="form-group">
                                            <label> Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ 'Password tidak sesuai' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-lg fw-bold " type="submit"><i class="fas fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
