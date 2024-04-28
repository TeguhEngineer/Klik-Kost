<form action="/datakost/{{ $item->id }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal-body py-0">
        <div class="d-flex p-2">

            <p class="mt-2">Anda yakin ? Data kos ini akan dihapus.</p>
           
        </div>
    </div>
    <div class="modal-footer pt-0">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
