<style>
    .tabel tr td {
        border: 1px solid;
        border-collapse: collapse;
    }

    tr td {
        padding: 7px;
    }
</style>
<div class="modal-body d-flex justify-content-center pb-0">
    <table class="tabel">
        <tr>
            <td><b>Nama</b></td>
            <td><b>:</b></td>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <td><b>No Telepon</b></td>
            <td><b>:</b></td>
            <td>{{ $item->no_tlp }}</td>
        </tr>
        <tr>
            <td><b>Alamat Kos</b></td>
            <td><b>:</b></td>
            <td>{{ $item->alamat_kost }}</td>
        </tr>
        <tr>
            <td><b>Link Maps</b></td>
            <td><b>:</b></td>
            <td>
                <a href="{{ $item->link_maps }}">{{ $item->link_maps }}</a>
            </td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td><b>:</b></td>
            <td>
                <div class="badge badge-success px-3">{{ $item->status }}</div>
            </td>
        </tr>
    </table>
</div>
<div class="modal-footer justify-content-center">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
