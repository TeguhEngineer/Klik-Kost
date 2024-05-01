<form action="/profil/{{ $item->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ ucfirst($item->name) }}">
        </div>
        <div class="form-group">
            <label for="telp">Nomor Telepon</label>
            <input type="number" id="telp" name="no_tlp"
                class="form-control @error('no_tlp') is-invalid @enderror" value="{{ $item->no_tlp }}">
                @error('no_tlp')
                    <div class="invalid-feedback">
                        {{ 'Nomor telepon minimal 12 & maksimal 13 karakter' }}
                    </div>
                @enderror
                @error('no_tlp')
                <button type="button" style="display: none" id="gagal-edit-data"></button>
                <script>
                    // Fungsi ini akan dipanggil saat halaman dimuat
                    window.onload = function() {
                        // Mengambil referensi tombol
                        var button = document.getElementById('gagal-edit-data');
        
                        // Simulasikan klik pada tombol
                        button.click();
                        button.style.display = 'none';
                    };
                </script>
                @enderror
        </div>

    </div>
    <div class="modal-footer pt-0 text-right">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
    </div>
</form>
