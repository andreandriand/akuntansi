<table id="bootstrap-data-table" class="table table-striped table-bordered text-center pt-3" cellspacing="0">
    <thead style="background-color: azure">
        <tr>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">No</th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Nama Kegiatan</th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Sub Kegiatan</th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Kode Rekening</th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Nama Kode Rekening
            </th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Nominal</th>
            <th style="background-color: lightblue; vertical-align: middle" colspan="3">Realisasi</th>
            <th style="background-color: lightblue; vertical-align: middle" colspan="3">Pengembalian</th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Realisasi Nett</th>
            <th style="background-color: lightblue; vertical-align: middle" colspan="2">Output</th>
            <th style="background-color: lightblue; vertical-align: middle" rowspan="2">Keterangan</th>
        </tr>
        <tr>
            <th style="background-color: lightblue; vertical-align: middle">Tanggal</th>
            <th style="background-color: lightblue; vertical-align: middle">No SP2D/GU/TU</th>
            <th style="background-color: lightblue; vertical-align: middle">Nilai</th>
            <th style="background-color: lightblue; vertical-align: middle">Tanggal</th>
            <th style="background-color: lightblue; vertical-align: middle">No STS</th>
            <th style="background-color: lightblue; vertical-align: middle">Nilai</th>
            <th style="background-color: lightblue; vertical-align: middle">Volume</th>
            <th style="background-color: lightblue; vertical-align: middle">Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($realisasi as $rel)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $rel->nama_kegiatan }}</td>
                <td>{{ $rel->sub_kegiatan }}</td>
                <td>{{ $rel->kode_rekening }}</td>
                <td>{{ $rel->nama_rekening }}</td>
                <td>Rp {{ number_format($rel->nominal, 0, '.', '.') }}</td>
                <td>{{ $rel->tanggal_realisasi }}</td>
                <td>{{ $rel->no_realisasi }}</td>
                <td>Rp {{ number_format($rel->nilai_realisasi, 0, '.', '.') }}</td>
                <td>{{ $rel->tanggal_pengembalian }}</td>
                <td>{{ $rel->no_pengembalian }}</td>
                <td>Rp {{ number_format($rel->nilai_pengembalian, 0, '.', '.') }}</td>
                <td>Rp
                    {{ number_format($rel->nilai_realisasi - $rel->nilai_pengembalian, 0, '.', '.') }}
                </td>
                <td>{{ $rel->volume_output }}</td>
                <td>{{ $rel->satuan_output }}</td>
                <td>{{ $rel->keterangan }}</td>
            </tr>
            <?php $no++; ?>
        @endforeach
    </tbody>
</table>
