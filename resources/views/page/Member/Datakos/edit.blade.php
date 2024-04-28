<form action="/datakos/{{ $item->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body">
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
                    <option selected value="{{ ucfirst($item->tipe_kost) }}">{{ ucfirst($item->tipe_kost) }}</option>
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
                    <option selected value="{{ ucfirst($item->status_kost) }}">{{ ucfirst($item->status_kost) }}
                    </option>
                    <option value="sisa1">Tersisa 1 Pintu</option>
                    <option value="sisa2">Tersisa 2 Pintu</option>
                    <option value="sisa3">Tersisa 3 Pintu</option>
                    <option value="sisa4">Tersisa 4 Pintu</option>
                    <option value="sisa5">Tersisa 5 Pintu</option>
                    <option value="lebih5">Tersisa 5 Pintu Lebih</option>
                    <option value="penuh">Penuh</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Kecamatan <span class="text-danger">*</span></label>
                <select name="kecamatan_id" class="form-control" required>
                    <option selected value="{{ ucfirst($item->kecamatan->id) }}">
                        {{ ucfirst($item->kecamatan->nama_kc) }}</option>
                    @foreach ($kecamatan as $kc)
                        <option value="{{ $kc->id }}">{{ $kc->nama_kc }}</option>
                    @endforeach
                    {{-- <option value="1">Cipedes</option>
                    <option value="2">Cihideung</option>
                    <option value="3">Cibereum</option>
                    <option value="4">Bungursari</option>
                    <option value="5">Indihiang</option>
                    <option value="6">Kawalu</option>
                    <option value="7">Mangkubumi</option>
                    <option value="8">Purbaratu</option>
                    <option value="9">Tamansari</option>
                    <option value="10">Tawang</option> --}}
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Area Kampus <span class="text-danger">*</span></label>
                <select name="area_id" class="form-control" required>
                    @if ($kost->area_id == null)
                        <option selected disabled value="">-- Masukan Area Kampus --</option>
                    @else
                        <option selected value="{{ ucfirst($item->area->id) }}">{{ ucfirst($item->area->nama_kps) }}
                        </option>
                    @endif
                    <option value=""></option>
                    @foreach ($areaKampus as $area)
                        <option value="{{ $area->id }}">{{ $area->nama_kps }}
                        </option>
                    @endforeach
                    {{-- <option value="1">UNSIL</option>
                    <option value="2">UPI</option>
                    <option value="3">POLTEKKES</option>
                    <option value="4">UMTAS</option>
                    <option value="5">UNPER</option>
                    <option value="6">YPPT</option>
                    <option value="7">BTH</option>
                    <option value="8">Poltekes Triguna</option>
                    <option value="9">STISIP</option>
                    <option value="10">STT YBSI</option>
                    <option value="11">LP3I</option>
                    <option value="12">STAI</option>
                    <option value="13">Mitra Kencana</option>
                    <option value="14">Akbid Kebidanan Shahida</option>
                    <option value="15">Akademi Pariwisata Siliwangi</option>
                    <option value="16">Politeknik Kesehatan Gigi</option>
                    <option value="17">Dirgantara Pilot School</option>
                    <option value="18">STIT</option>
                    <option value="19">STAINU</option> --}}
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="link_maps">Link Maps</label>
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
                <label for="alamat">Alamat</label>
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
