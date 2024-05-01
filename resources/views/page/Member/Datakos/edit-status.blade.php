<form action="/datakost/{{ $item->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
        {{-- <div class="form-row"> --}}
           
            <div class="form-group">
                <label>Status <span class="text-danger">*</span></label>
                <select name="status_kost" class="form-control" required>
                    @if ($item->status_kost == 'sisa1')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Tersisa 1 Kost</option>
                    @elseif ($item->status_kost == 'sisa2')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Tersisa 2 Kost</option>
                    @elseif ($item->status_kost == 'sisa3')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Tersisa 3 Kost</option>
                    @elseif ($item->status_kost == 'sisa4')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Tersisa 4 Kost</option>
                    @elseif ($item->status_kost == 'sisa5')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Tersisa 5 Kost</option>
                    @elseif ($item->status_kost == 'lebih5')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Tersisa 5 Kost Lebih</option>
                    @elseif ($item->status_kost == 'penuh')
                    <option selected value="{{ ucfirst($item->status_kost) }}" hidden>Penuh</option>
                    @endif
                    <option value="sisa1">Tersisa 1 Kost</option>
                    <option value="sisa2">Tersisa 2 Kost</option>
                    <option value="sisa3">Tersisa 3 Kost</option>
                    <option value="sisa4">Tersisa 4 Kost</option>
                    <option value="sisa5">Tersisa 5 Kost</option>
                    <option value="lebih5">Tersisa 5 Kost Lebih</option>
                    <option value="penuh">Penuh</option>
                </select>
            </div>
        {{-- </div> --}}
        


        <div class="form-group mb-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Ceklis untuk edit
                </label>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>

    </div>
</form>
