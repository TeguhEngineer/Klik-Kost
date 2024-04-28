<form action="/dataadmin/{{ $item->id }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal-body pb-0">
        <div class="d-flex p-2">

            <span class="mt-2">Data admin ini akan dihapus : <b class="text-danger">{{ $item->name }}</b></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
