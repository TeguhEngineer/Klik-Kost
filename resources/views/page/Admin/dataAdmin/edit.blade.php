<form action="/dataadmin/{{ $item->id }}" method="POST" class="p-0">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="name" class="form-control" value="{{ $item->name }}">
        </div>
        <div class="form-group">

            <label for="no_tlp">No Telepon</label>
            <input type="number" id="no_tlp" name="no_tlp" class="form-control" value="{{ $item->no_tlp }}">
        </div>
        {{-- <button type="button" class="btn btn-outline-warning btn-sm btn-icon icon-left" data-bs-toggle="modal"
        data-bs-target="#edit-password{{ $item->id }}"><i class="fas fa-key"></i>Edit Password</button> --}}
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
