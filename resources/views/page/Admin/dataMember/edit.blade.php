<form action="/datamember/{{ $item->id }}" method="POST" class="p-0">
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
        <div class="form-group">
            <label for="alamat">Alamat Kos</label>
            <textarea class="form-control" name="alamat_kost" id="alamat" cols="30" rows="10">{{ $item->alamat_kost }}</textarea>
        </div>
        <div class="form-group">
            <label for="link_maps">Link Maps</label>
            <input type="text" name="link_maps" class="form-control" id="link_maps" value="{{ $item->link_maps }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                @if ($item->status == 'aktif')
                    @if ($item->status == 'aktif')
                        <option>Aktif</option>
                    @elseif ($item->status == 'non-aktif')
                        <option>Non-aktif</option>
                    @endif
                    <option value="non-aktif">Non-Aktif</option>
                @elseif ($item->status == 'non-aktif')
                    @if ($item->status == 'aktif')
                        <option>Aktif</option>
                    @elseif ($item->status == 'non-aktif')
                        <option>Non-aktif</option>
                    @endif
                    <option value="aktif">Aktif</option>
                @endif
            </select>
        </div>
        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
        data-bs-target="#modal-edit-password{{ $item->id }}"><i class="fas fa-key"></i> Edit Password</button>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
