@extends('layouts.app')

@section('title', 'Berkas Laporan')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Berkas</a></li>
                                <li>Berkas Laporan</li>
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
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Berkas Laporan</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered text-center"
                                cellspacing="0">
                                <thead style="background-color: azure">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama File</th>
                                        <th>Waktu Upload</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($files as $file)
                                        <tr>
                                            <td class="align-middle">{{ $no }}</td>
                                            <td class="align-middle">{{ $file->name }}</td>
                                            <td class="align-middle">{{ $file->created_at }}</td>
                                            <td class="align-middle justify-content-center d-flex">
                                                <form action="{{ route('file.download') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="path" id="path"
                                                        value="{{ $file->path }}">
                                                    <input type="hidden" name="name" id="name"
                                                        value="{{ $file->name }}">
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="ti-download"></i></button>
                                                </form>
                                                <span style="width: 0.5rem;"></span>
                                                <form action="{{ route('file.destroy', $file->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus File Ini?')"><i
                                                            class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

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
@endpush
