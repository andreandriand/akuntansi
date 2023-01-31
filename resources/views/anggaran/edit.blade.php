@extends('layouts.app')

@section('title', 'Edit Anggaran')

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
                                <li><a href="{{ route('anggaran.index') }}">Anggaran</a></li>
                                <li>Edit Anggaran</li>
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

    <div class="content ">
        <div class="animated fadeIn">
            <form action="{{ route('anggaran.update', $anggaran->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Anggaran</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Sub Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <textarea class="@error('sub_kegiatan') is-invalid @enderror" name="sub_kegiatan" id="sub_kegiatan" cols="55"
                                            rows="4">{{ $anggaran->sub_kegiatan }}</textarea>
                                    </div>
                                    @error('sub_kegiatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Kode Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('kode_rekening') is-invalid @enderror"
                                            name="kode_rekening" id="kode_rekening"
                                            placeholder="Masukkan Nomor Rekening yang Sesuai"
                                            value="{{ $anggaran->kode_rekening }}" required />
                                    </div>
                                    @error('kode_rekening')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nama Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('uraian_rekening') is-invalid @enderror"
                                            name="uraian_rekening" id="uraian_rekening"
                                            value="{{ $anggaran->uraian_rekening }}" required />
                                    </div>
                                    @error('nama_rekening')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nominal Anggaran</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="text" class="form-control @error('anggaran') is-invalid @enderror"
                                            name="anggaran" id="anggaran" maxlength="20" value="{{ $anggaran->anggaran }}"
                                            required />

                                    </div>
                                    @error('anggaran')
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
                                <strong class="card-title">Uraian Kegiatan</strong>
                            </div>
                            <div class="card-body">
                                <select id="uraian" name="uraian_kegiatan" data-placeholder="Pilih Uraian Kegiatan"
                                    class="standardSelect @error('uraian_kegiatan') is-invalid @enderror" tabindex="1">
                                    <option selected value="{{ old('uraian_kegiatan', $anggaran->uraian_kegiatan) }}">
                                        {{ old('uraian_kegiatan', $anggaran->uraian_kegiatan) }}
                                    </option>
                                    @foreach ($uraian_kegiatan as $kegiatan)
                                        @if ($kegiatan != $anggaran->uraian_kegiatan)
                                            <option value="{{ $kegiatan }}">{{ $kegiatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('uraian_kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Periode</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Bulan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <select class="@error('bulan') is-invalid @enderror form-select" id="anggaran"
                                            name="bulan" data-placeholder="Pilih Bulan" tabindex="1">
                                            <option selected value="{{ old('bulan', $anggaran->bulan) }}">
                                                {{ old('bulan', $anggaran->bulan) }}
                                            </option>
                                            @foreach ($bulan as $item)
                                                @if ($item != $anggaran->bulan)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('bulan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2" for="tahun">Tahun</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control @error('tahun') is-invalid @enderror" type="text"
                                            name="tahun" id="tahun_anggaran" minlength="4" maxlength="4"
                                            value="{{ old('tahun', $anggaran->tahun) }}" required />
                                    </div>
                                    @error('tahun')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success shadow" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ asset('/assets/css/lib/chosen/chosen.min.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%",
            });
        });
    </script>

    <script>
        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(
                function(event) {
                    textbox.addEventListener(event, function(e) {
                        if (inputFilter(this.value)) {
                            // Accepted value.
                            if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                                this.classList.remove("input-error");
                                this.setCustomValidity("");
                            }

                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            // Rejected value: restore the previous one.
                            this.classList.add("input-error");
                            this.setCustomValidity(errMsg);
                            this.reportValidity();
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            // Rejected value: nothing to restore.
                            this.value = "";
                        }
                    });
                });
        }


        setInputFilter(document.getElementById("tahun_anggaran"), function(value) {
            return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
        }, "Hanya Boleh Diisi Angka");

        setInputFilter(document.getElementById("kode_rekening"), function(value) {
            return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
        }, "Hanya Boleh Diisi Angka");
    </script>
    <script>
        var input = document.getElementById("anggaran");
        input.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 4) {
                this.value = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
        });
    </script>
@endpush
