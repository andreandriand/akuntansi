<table id="bootstrap-data-table" class="table table-striped table-bordered text-center" cellspacing="0">
    <thead style="background-color: azure">
        <tr>
            <th>No</th>
            <th>Uraian Kegiatan</th>
            <th>Sub Kegiatan</th>
            <th>Kode Rekening</th>
            <th>Uraian Rekening</th>
            <th>Anggaran</th>
            <th>Periode</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($anggaran as $ang)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $ang->uraian_kegiatan }}</td>
                <td>{{ $ang->sub_kegiatan }}</td>
                <td>{{ $ang->kode_rekening }}</td>
                <td>{{ $ang->uraian_rekening }}</td>
                <td>Rp {{ number_format($ang->anggaran, 0, '.', '.') }}</td>
                <td>{{ $ang->bulan }} {{ $ang->tahun }}</td>
            </tr>
            <?php $no++; ?>
        @endforeach
    </tbody>
</table>
