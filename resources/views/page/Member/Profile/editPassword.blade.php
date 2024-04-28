<form id="editPasswordForm{{ $dataUser->id }}" action="/editPassword/{{ $dataUser->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <div class="form-group">
            <label for="nama">Password Baru</label>
            <input type="password" id="nama" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ 'Password tidak boleh kurang dari 8 karakter' }}
                </div>
            @enderror

        </div>
        <div class="form-group">
            <label for="telp">Konfirmasi Password</label>
            <input type="password" id="telp" name="password_confirmation" class="form-control"
                value="{{ old('password_confirmation') }}">
            <div id="editPasswordError{{ $dataUser->id }}" style="color: red;"></div>
        </div>
    </div>
    <div class="modal-footer pt-0 justify-content-center">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
    </div>
</form>
