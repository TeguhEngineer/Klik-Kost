<form id="editPasswordForm{{ $dataUser->id }}" action="/editPassword/{{ $dataUser->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <div class="form-group mb-3">
            <label for="passwordInput">Password Baru</label>
            <input type="password" id="passwordInput" name="password" value="{{ old('password') }}"
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ 'Password tidak boleh kurang dari 8 karakter' }}
                </div>
            @enderror
        </div>

        <input type="checkbox" id="showPasswordCheckbox">
        <small>Tampilkan Password</small>

        

        <div class="form-group mt-2">
            <label for="passwordConf">Konfirmasi Password</label>
            <input type="password" id="passwordConf" name="password_confirmation" class="form-control"
                value="{{ old('password_confirmation') }}">
            <div id="editPasswordError{{ $dataUser->id }}" style="color: red;"></div>
        </div>

        <script>
            const passwordInput = document.getElementById('passwordInput');
            const passwordConf = document.getElementById('passwordConf');
            const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

            showPasswordCheckbox.addEventListener('change', function() {
                if (showPasswordCheckbox.checked) {
                    // Jika checkbox diceklis, tampilkan kata sandi
                    passwordInput.type = 'text';
                    passwordConf.type = 'text';
                } else {
                    // Jika checkbox tidak diceklis, sembunyikan kata sandi
                    passwordInput.type = 'password';
                    passwordConf.type = 'password';
                }
            });
        </script>
    </div>
    <div class="modal-footer pt-0 text-right">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
    </div>
</form>
