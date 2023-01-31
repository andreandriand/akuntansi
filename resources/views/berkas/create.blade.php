@extends('layouts.app')

@section('title', 'Berkas')

@section('content')

    <div class="breadcrumbs mt-5">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <ol class="breadcrumb text-left">
                                <li><a href="index.php">Dashboard</a></li>
                                <li><a href="#">Berkas</a></li>
                                <li>Input Berkas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Input File Laporan</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">File</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input type="file"
                                            class="form-control @error('file_laporan') is-invalid @enderror"
                                            name="file_laporan" id="file_laporan" required />
                                    </div>
                                    @error('file_laporan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Template Laporan</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="stat-text">Template Laporan Realisasi <a href="{{ route('file.template') }}"
                                        class="btn btn-sm btn-success float-end rounded-1"><i class="ti-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success shadow" type="submit">Input</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- .animated -->
    </div>

@endsection
