<form action="/edit-password-member/{{ $item->id }}" method="POST" class="p-0">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror">
            <div class="invalid-feedback">
                {{ 'Password tidak sama' }}
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Baru</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror">

        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
