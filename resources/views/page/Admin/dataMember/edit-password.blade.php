<form action="/edit-password-member/{{ $item->id }}" method="POST" class="p-0">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <div class="form-group mb-3">
            <label for="passwordInput">Password Baru</label>
            <input type="password" id="passwordInput" name="password"
                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
            <div class="invalid-feedback">
                {{ 'Password tidak sama' }}
            </div>
        </div>

        <input type="checkbox" id="showPasswordCheckbox">
        <small>Tampilkan Password</small>

        <div class="form-group mt-3">
            <label for="passwordConf">Konfirmasi Password</label>
            <input type="password" id="passwordConf" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror">

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
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
