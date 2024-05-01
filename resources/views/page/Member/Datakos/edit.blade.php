<form action="/datakos/{{ $item->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body pb-0">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_kost">Nama Kos <span class="text-danger">*</span></label>
                <input type="text" name="nama_kost" class="form-control" id="nama_kost" placeholder="Nama Kos"
                    value="{{ ucfirst($item->nama_kost) }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Pemilik</label>
                <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" disabled>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tipe Kos <span class="text-danger">*</span></label>
                <select name="tipe_kost" class="form-control" required>
                    <option selected value="{{ ucfirst($item->tipe_kost) }}" hidden>{{ ucfirst($item->tipe_kost) }}</option>
                    <option value="putra">Putra</option>
                    <option value="putri">Putri</option>
                    <option value="campur">Campur</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="jumlah_kost">Jumlah Kost <span class="text-danger">*</span></label>
                <input type="number" name="jumlah_kost" class="form-control" id="jumlah_kost" placeholder="Jumlah Kos"
                    value="{{ ucfirst($item->jumlah_kost) }}" required>
            </div>
            <div class="form-group col-md-3">
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
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Kecamatan <span class="text-danger">*</span></label>
                <select name="kecamatan_id" class="form-control" required>
                    <option selected value="{{ ucfirst($item->kecamatan->id) }}" hidden>
                        {{ ucfirst($item->kecamatan->nama_kc) }}</option>
                    @foreach ($kecamatan as $kc)
                        <option value="{{ $kc->id }}">{{ $kc->nama_kc }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Area Kampus <span class="text-danger">*</span></label>
                <select name="area_id" class="form-control" required>
                    @if ($kost->area_id == null)
                        <option selected disabled value="">-- Masukan Area Kampus --</option>
                    @else
                        <option selected value="{{ ucfirst($item->area->id) }}" hidden>{{ ucfirst($item->area->nama_kps) }}
                        </option>
                    @endif
                    @foreach ($areaKampus as $area)
                        <option value="{{ $area->id }}">{{ $area->nama_kps }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="link_maps">Link Maps <span class="text-danger">*</span></label>
                <input type="text" name="link_maps" class="form-control" id="link_maps" placeholder="Link Maps"
                    value="{{ auth()->user()->link_maps }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" required>{{ ucfirst($item->deskripsi) }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat_kost" id="alamat" cols="30" rows="10" required>{{ ucfirst(auth()->user()->alamat_kost) }}</textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="harga">Harga <span class="text-danger">*</span></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input type="number" name="harga_kost" class="form-control" id="harga" placeholder="Harga Kos"
                        value="{{ $item->harga_kost }}" required>
                </div>
            </div>

        </div>


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
