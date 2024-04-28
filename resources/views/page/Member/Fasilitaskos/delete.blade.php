<form action="/fasilitaskos/{{ $item->id }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal-body pb-0 pt-4 mx-3 justify-content-center">
        <h6>Anda yakin ingin menghapus fasilitas <span class="text-danger">{{ $item->fasilitas->nama_fas }}</span> ?</h6>
    </div>
    <div class="modal-footer justify-content-center">
        <button class="btn btn-danger btn-sm px-4" type="submit">Hapus</button>
        <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal"
            aria-label="Close">Batal</button>
    </div>
</form>
