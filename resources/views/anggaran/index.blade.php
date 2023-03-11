@extends('layouts.app')

@section('title', 'Anggaran')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <ol class="breadcrumb text-left">
                                <li><a href="/">Dashboard</a></li>
                                <li><a href="#">Laporan</a></li>
                                <li>Anggaran</li>
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
                            <strong class="card-title">Laporan Anggaran</strong>
                            {{-- <button class="btn btn-success float-end rounded" onclick="ExportToExcel('xlsx')">Convert
                                to
                                Excel</button> --}}
                            <a href="{{ route('anggaran.export') }}" class="btn btn-success float-end rounded">Convert
                                to
                                Excel</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered text-center"
                                cellspacing="0">
                                <thead style="background-color: azure">
                                    <tr>
                                        <th class="align-middle">No</th>
                                        <th class="align-middle">Uraian Kegiatan</th>
                                        <th class="align-middle">Sub Kegiatan</th>
                                        <th class="align-middle">Kode Rekening</th>
                                        <th class="align-middle">Uraian Rekening</th>
                                        <th class="align-middle">Anggaran</th>
                                        <th class="align-middle">Sumber Dana</th>
                                        <th class="align-middle">Periode</th>
                                        @if (Auth::user()->role == 'admin')
                                            <th class="align-middle">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($anggaran as $ang)
                                        <tr>
                                            <td class="align-middle">{{ $no }}</td>
                                            <td class="align-middle">{{ $ang->uraian_kegiatan }}</td>
                                            <td class="align-middle">{{ $ang->sub_kegiatan }}</td>
                                            <td class="align-middle">{{ $ang->kode_rekening }}</td>
                                            <td class="align-middle">{{ $ang->uraian_rekening }}</td>
                                            <td class="align-middle">Rp {{ number_format($ang->anggaran, 0, '.', '.') }}
                                            </td>
                                            <td class="align-middle">{{ $ang->sumber_dana }}</td>
                                            <td class="align-middle">{{ $ang->tahun }}</td>
                                            @if (Auth::user()->role == 'admin')
                                                <td class="align-middle d-flex justify-content-center"
                                                    style="padding: 3.5rem 1rem;">
                                                    <a href="{{ route('anggaran.edit', $ang->id) }}"
                                                        class="btn btn-warning rounded"><i class="ti-pencil"></i></a>
                                                    <span style="width: 0.5rem"></span>
                                                    <form action="{{ route('anggaran.destroy', $ang->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger rounded"
                                                            onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </td>
                                            @endif
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
    <link rel="stylesheet" href="{{ asset('/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/assets/js/init/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#bootstrap-data-table-export").DataTable();
        });
    </script>
    <script type="text/javascript" src="{{ url('https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js') }}"></script>
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
