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
                                <li><a href="{{ route('realisasi.index') }}">Realisasi</a></li>
                                <li>Edit Realisasi</li>
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
            <form action="{{ route('realisasi.update', $realisasi->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Realisasi</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Sub Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <textarea readonly="readonly" name="sub_kegiatan" id="sub_kegiatan" cols="55" rows="4">{{ old('sub_kegiatan', $realisasi->sub_kegiatan) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Kode Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                        <input type="text" class="form-control" name="kode_rekening" id="kode_rekening"
                                            placeholder="Masukkan Nomor Rekening yang Sesuai"
                                            value="{{ old('kode_rekening', $realisasi->kode_rekening) }}" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nama Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <input type="text" class="form-control" name="nama_rekening" id="nama_rekening"
                                            value="{{ old('nama_rekening', $realisasi->nama_rekening) }}" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nominal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="text" class="form-control" name="nominal" id="nominal"
                                            value="{{ old('nominal', $realisasi->nominal) }}" required />
                                    </div>
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
                                <select id="uraian" name="nama_kegiatan" data-placeholder="Pilih Uraian Kegiatan"
                                    class="standardSelect" tabindex="1" onchange="changeData()">
                                    <option selected value="{{ $realisasi->nama_kegiatan }}">{{ $realisasi->nama_kegiatan }}
                                    </option>
                                    @foreach ($uraian_kegiatan as $kegiatan)
                                        @if ($kegiatan != $realisasi->nama_kegiatan)
                                            <option value="{{ $kegiatan }}">{{ $kegiatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Silahkan Pilih Uraian Kegiatan Terlebih
                                    Dahulu</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Realisasi</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control" type="date" name="tanggal_realisasi"
                                            value="{{ old('tanggal_realisasi', $realisasi->tanggal_realisasi) }}"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">No SP2D/GU/TU</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input class="form-control" type="text" name="no_realisasi"
                                            value="{{ old('no_realisasi', $realisasi->no_realisasi) }}" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nilai</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input class="form-control" type="text" name="nilai_realisasi"
                                            id="nilai_realisasi"
                                            value="{{ old('nilai_realisasi', $realisasi->nilai_realisasi) }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pengembalian</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control" type="date" name="tanggal_pengembalian"
                                            value="{{ old('tanggal_pengembalian', $realisasi->tanggal_pengembalian) }}"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">No STS</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input class="form-control" type="text" name="no_pengembalian"
                                            value="{{ old('no_pengembalian', $realisasi->no_pengembalian) }}" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nilai</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input class="form-control" type="text" name="nilai_pengembalian"
                                            id="nilai_pengembalian"
                                            value="{{ old('nilai_pengembalian', $realisasi->nilai_pengembalian) }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Output</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Volume</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bar-chart"></i>
                                        </div>
                                        <input class="form-control" type="number" name="volume_output"
                                            value="{{ old('volume_output', $realisasi->volume_output) }}" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Satuan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-balance-scale"></i>
                                        </div>
                                        <input class="form-control" type="text" name="satuan_output"
                                            value="{{ old('satuan_output', $realisasi->satuan_output) }}" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Keterangan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sticky-note-o"></i>
                                        </div>
                                        <input class="form-control" type="text" name="keterangan"
                                            value="{{ old('keterangan', $realisasi->keterangan) }}" />
                                    </div>
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


        setInputFilter(document.getElementById("kode_rekening"), function(value) {
            return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
        }, "Hanya Boleh Diisi Angka");

        // setInputFilter(document.getElementById("nominal"), function(value) {
        //     return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
        // }, "Hanya Boleh Diisi Angka");

        // setInputFilter(document.getElementById("nilai_realisasi"), function(value) {
        //     return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
        // }, "Hanya Boleh Diisi Angka");

        // setInputFilter(document.getElementById("nilai_pengembalian"), function(value) {
        //     return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
        // }, "Hanya Boleh Diisi Angka");
    </script>
    <script>
        var nominal = document.getElementById("nominal");
        var realisasi = document.getElementById("nilai_realisasi");
        var pengembalian = document.getElementById("nilai_pengembalian");
        nominal.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 4) {
                this.value = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
        });
        realisasi.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 4) {
                this.value = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
        });
        pengembalian.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 4) {
                this.value = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
        });
    </script>

    <script>
        function changeData() {
            let select = document.getElementById("uraian");
            let selectedValue = select.options[select.selectedIndex].value;
            let subkegiatan = document.getElementById("sub_kegiatan");

            if (selectedValue == "Dinsos: Asistensi Sosial Penyandang Disabilitas (ASPD)") {
                subkegiatan.innerHTML = "Fasilitasi Bantuan Pengembangan Ekonomi Masyarakat";
            } else if (selectedValue == "Dinsos: Bansos Ojek Konventional dan Online") {
                subkegiatan.innerHTML =
                    "Pengendalian dan pengawasan ketersediaan angkutan umum untuk jasa angkutan orang dan/atau barang antar kota dalam 1 provinsi";
            } else if (selectedValue == "Diskanla: Bansos Nelayan") {
                subkegiatan.innerHTML = "Penjaminan Ketersediaan Sarana Usaha Perikanan Tangkap";
            } else if (selectedValue == "Dinkop UKM: Bansos Pelaku Usaha Mikro") {
                subkegiatan.innerHTML =
                    "Menumbuhkembangkan UMKM untuk menjadi usaha yang tangguh dan mandiri sehingga dapat meningkatkan penciptaan lapangan kerja, pemerataan pendapatan, pertumbuhan ekonomi, dan pengentasan kemiskinan";
            } else if (selectedValue == "Din. ESDM: Bantuan Token Pulsa Listrik") {
                subkegiatan.innerHTML =
                    "Pembangunan Sarana Penyediaan Tenaga Listrik Belum Berkembang, Daerah Terpencil dan Perdesaan";
            } else if (selectedValue ==
                "Dispertan KP: Peningkatan Ketersediaan Pangan Tingkat Rumah Tangga/Pekarangan Pangan Lestari (PEKAPARI-P2L)"
            ) {
                subkegiatan.innerHTML = "Penyediaan Pangan Berbasis Sumber Daya Lokal";
            } else if (selectedValue == "Dispertan KP: Gelar Pasar Pangan Murah") {
                subkegiatan.innerHTML =
                    "Koordinasi, Sinkronisasi dan Pelaksanaan Distribusi Pangan Pokok dan Pangan Lainnya";
            } else if (selectedValue == "Disperindag: Pasar Murah Online") {
                subkegiatan.innerHTML =
                    "Operasi Pasar dalam rangka stabilitasi harga pangan pokok yang dampak beberapa daerah kabupaten/kota dalam 1 daerah provinsi";
            } else if (selectedValue == "Biro Perekonomian: Lumbung Pangan Jatim") {
                subkegiatan.innerHTML = "Fasilitasi Pengelolaan Kebijakan Ekonomi Makro";
            }
        }
    </script>
@endpush
