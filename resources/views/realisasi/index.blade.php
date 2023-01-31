@extends('layouts.app')

@section('title', 'Realisasi')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <ol class="breadcrumb text-left">
                                <li><a href="index.php">Dashboard</a></li>
                                <li><a href="#">Laporan</a></li>
                                <li>Realisasi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Laporan Realisasi</strong>
                            {{-- <button class="btn btn-success float-end rounded" onclick="ExportToExcel('xlsx')">Convert
                                to
                                Excel</button> --}}
                            <a href="{{ route('realisasi.export') }}" class="btn btn-success float-end rounded">Convert
                                to
                                Excel</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered text-center pt-3"
                                cellspacing="0">
                                <thead style="background-color: azure">
                                    <tr>
                                        <th style="vertical-align: middle" rowspan="2">No</th>
                                        <th style="vertical-align: middle" rowspan="2">Nama Kegiatan</th>
                                        <th style="vertical-align: middle" rowspan="2">Sub Kegiatan</th>
                                        <th style="vertical-align: middle" rowspan="2">Kode Rekening</th>
                                        <th style="vertical-align: middle" rowspan="2">Nama Kode Rekening</th>
                                        <th style="vertical-align: middle" rowspan="2">Nominal</th>
                                        <th style="vertical-align: middle" colspan="3">Realisasi</th>
                                        <th style="vertical-align: middle" colspan="3">Pengembalian</th>
                                        <th style="vertical-align: middle" rowspan="2">Realisasi Nett</th>
                                        <th style="vertical-align: middle" colspan="2">Output</th>
                                        <th style="vertical-align: middle" rowspan="2">Keterangan</th>
                                        <th style="vertical-align: middle" rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle">Tanggal</th>
                                        <th style="vertical-align: middle">No SP2D/GU/TU</th>
                                        <th style="vertical-align: middle">Nilai</th>
                                        <th style="vertical-align: middle">Tanggal</th>
                                        <th style="vertical-align: middle">No STS</th>
                                        <th style="vertical-align: middle">Nilai</th>
                                        <th style="vertical-align: middle">Volume</th>
                                        <th style="vertical-align: middle">Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($realisasi as $rel)
                                        <tr>
                                            <td class="align-middle">{{ $no }}</td>
                                            <td class="align-middle">{{ $rel->nama_kegiatan }}</td>
                                            <td class="align-middle">{{ $rel->sub_kegiatan }}</td>
                                            <td class="align-middle">{{ $rel->kode_rekening }}</td>
                                            <td class="align-middle">{{ $rel->nama_rekening }}</td>
                                            <td class="align-middle">Rp {{ number_format($rel->nominal, 0, '.', '.') }}</td>
                                            <td class="align-middle">{{ $rel->tanggal_realisasi }}</td>
                                            <td class="align-middle">{{ $rel->no_realisasi }}</td>
                                            <td class="align-middle">Rp
                                                {{ number_format($rel->nilai_realisasi, 0, '.', '.') }}</td>
                                            <td class="align-middle">{{ $rel->tanggal_pengembalian }}</td>
                                            <td class="align-middle">{{ $rel->no_pengembalian }}</td>
                                            <td class="align-middle">Rp
                                                {{ number_format($rel->nilai_pengembalian, 0, '.', '.') }}</td>
                                            <td class="align-middle">Rp
                                                {{ number_format($rel->nilai_realisasi - $rel->nilai_pengembalian, 0, '.', '.') }}
                                            </td>
                                            <td class="align-middle">{{ $rel->volume_output }}</td>
                                            <td class="align-middle">{{ $rel->satuan_output }}</td>
                                            <td class="align-middle">{{ $rel->keterangan }}</td>
                                            <td class="align-middle d-flex justify-content-center" style="padding: 5rem">
                                                <a href="{{ route('realisasi.edit', $rel->id) }}"
                                                    class="btn btn-warning rounded"><i class="ti-pencil"></i></a>
                                                <span style="width: 0.5rem"></span>
                                                <form action="{{ route('realisasi.destroy', $rel->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger rounded"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                            class="fa fa-trash-o"></i></button>
                                                </form>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>

@endsection

@push('after-style')
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css" />
@endpush

@push('after-script')
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#bootstrap-data-table-export").DataTable();
        });
    </script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById("bootstrap-data-table");
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "sheet1"
            });
            const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            const date = new Date();
            let tahun = date.getFullYear();
            let month = bulan[date.getMonth()];
            let tanggal = date.getDate() + " " + month + " " + tahun;
            return dl ? XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: "base64"
            }) : XLSX.writeFile(wb, fn || "Laporan " + tanggal + "." + (type || "xlsx"));
        }
    </script>
@endpush
