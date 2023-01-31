@extends('layouts.app')

@section('title', 'Input Data Realisasi')

@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-8">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <ol class="breadcrumb text-left">
                                <li><a href="index.php">Dashboard</a></li>
                                <li><a href="#">Input Data</a></li>
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
            <form action="{{ route('realisasi.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Input Data Realisasi</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Sub Kegiatan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-book"></i>
                                        </div>
                                        <textarea readonly="readonly" name="sub_kegiatan" id="sub_kegiatan" cols="55" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Kode Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                        <input type="text" class="form-control" name="kode_rekening" id="kode_rekening"
                                            placeholder="Masukkan Nomor Rekening yang Sesuai" readonly="readonly"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nama Rekening</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <input type="text" class="form-control" name="nama_rekening" id="nama_rekening"
                                            readonly="readonly" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nominal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="number" class="form-control" name="nominal" id="nominal"
                                            readonly="readonly" required />
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
                            <div class="card-body pb-5">
                                <select id="uraian" name="nama_kegiatan" data-placeholder="Pilih Uraian Kegiatan"
                                    class="standardSelect" tabindex="1" onchange="changeData()">
                                    {{-- <option value="Dinsos: Asistensi Sosial Penyandang Disabilitas (ASPD)">Asistensi Sosial
                                        Penyandang Disabilitas (ASPD)</option>
                                    <option value="Dinsos: Bansos Ojek Konventional dan Online">Bansos Ojek Konventional dan
                                        Online
                                    </option>
                                    <option value="Diskanla: Bansos Nelayan">Diskanla: Bansos Nelayan</option>
                                    <option value="Dinkop UKM: Bansos Pelaku Usaha Mikro">Dinkop UKM: Bansos Pelaku Usaha
                                        Mikro</option>
                                    <option value="Din. ESDM: Bantuan Token Pulsa Listrik">Din. ESDM: Bantuan Token Pulsa
                                        Listrik
                                    </option>
                                    <option
                                        value="Dispertan KP: Peningkatan Ketersediaan Pangan Tingkat Rumah Tangga/Pekarangan Pangan Lestari (PEKAPARI-P2L)">
                                        Dispertan KP: Peningkatan Ketersediaan Pangan Tingkat Rumah Tangga/Pekarangan Pangan
                                        Lestari (PEKAPARI-P2L)
                                    </option>
                                    <option value="Dispertan KP: Gelar Pasar Pangan Murah">Dispertan KP: Gelar Pasar Pangan
                                        Murah</option>
                                    <option value="Disperindag: Pasar Murah Online">Disperindag: Pasar Murah Online</option>
                                    <option value="Biro Perekonomian: Lumbung Pangan Jatim">Biro Perekonomian: Lumbung
                                        Pangan Jatim</option> --}}
                                    <option value="">-- Pilih Uraian Kegiatan Terlebih Dahulu --</option>
                                    @foreach ($anggaran as $ang)
                                        <option value="{{ $ang->uraian_kegiatan }}">
                                            {{ $ang->uraian_kegiatan }}</option>
                                    @endforeach
                                </select>
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
                                        <input class="form-control" type="date" name="tanggal_realisasi" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">No SP2D/GU/TU</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input class="form-control" type="text" name="no_realisasi" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nilai</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input class="form-control" type="text" name="nilai_realisasi"
                                            id="nilai_realisasi" required />
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
                                            required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">No STS</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input class="form-control" type="text" name="no_pengembalian" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Nilai</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input class="form-control" type="text" name="nilai_pengembalian"
                                            id="nilai_pengembalian" required />
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
                                        <input class="form-control" type="number" name="volume_output" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Satuan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-balance-scale"></i>
                                        </div>
                                        <input class="form-control" type="text" name="satuan_output" required />
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label mb-2">Keterangan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-sticky-note-o"></i>
                                        </div>
                                        <input class="form-control" type="text" name="keterangan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success shadow" type="submit" name="input">Input</button>
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
        // function changeData() {
        //     let select = document.getElementById("uraian");
        //     let selectedValue = select.options[select.selectedIndex].value;
        //     let subkegiatan = document.getElementById("sub_kegiatan");

        //     if (selectedValue == "Asistensi Sosial Penyandang Disabilitas (ASPD)") {
        //         subkegiatan.innerHTML = "Fasilitasi Bantuan Pengembangan Ekonomi Masyarakat";
        //     } else if (selectedValue == "Bansos Ojek Konventional dan Online") {
        //         subkegiatan.innerHTML =
        //             "Pengendalian dan pengawasan ketersediaan angkutan umum untuk jasa angkutan orang dan/atau barang antar kota dalam 1 provinsi";
        //     } else if (selectedValue == "Bansos Nelayan") {
        //         subkegiatan.innerHTML = "Penjaminan Ketersediaan Sarana Usaha Perikanan Tangkap";
        //     } else if (selectedValue == "Bansos Pelaku Usaha Mikro") {
        //         subkegiatan.innerHTML =
        //             "Menumbuhkembangkan UMKM untuk menjadi usaha yang tangguh dan mandiri sehingga dapat meningkatkan penciptaan lapangan kerja, pemerataan pendapatan, pertumbuhan ekonomi, dan pengentasan kemiskinan";
        //     } else if (selectedValue == "Bantuan Token Pulsa Listrik") {
        //         subkegiatan.innerHTML =
        //             "Pembangunan Sarana Penyediaan Tenaga Listrik Belum Berkembang, Daerah Terpencil dan Perdesaan";
        //     } else if (selectedValue ==
        //         "Peningkatan Ketersediaan Pangan Tingkat Rumah Tangga/Pekarangan Pangan Lestari (PEKAPARI-P2L)") {
        //         subkegiatan.innerHTML = "Penyediaan Pangan Berbasis Sumber Daya Lokal";
        //     } else if (selectedValue == "Gelar Pasar Pangan Murah") {
        //         subkegiatan.innerHTML =
        //             "Koordinasi, Sinkronisasi dan Pelaksanaan Distribusi Pangan Pokok dan Pangan Lainnya";
        //     } else if (selectedValue == "Pasar Murah Online") {
        //         subkegiatan.innerHTML =
        //             "Operasi Pasar dalam rangka stabilitasi harga pangan pokok yang dampak beberapa daerah kabupaten/kota dalam 1 daerah provinsi";
        //     } else if (selectedValue == "Lumbung Pangan Jatim") {
        //         subkegiatan.innerHTML = "Fasilitasi Pengelolaan Kebijakan Ekonomi Makro";
        //     }
        // }
    </script>

    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#uraian').change(function() {
                var input1 = $(this).val();
                $.ajax({
                    url: "/get-data/" + input1,
                    type: 'GET',
                    data: {
                        uraian_kegiatan: input1
                    },
                    success: function(data) {
                        $('#sub_kegiatan').val(data.sub_kegiatan);
                        $('#kode_rekening').val(data.kode_rekening);
                        $('#nama_rekening').val(data.uraian_rekening);
                        $('#nominal').val(data.anggaran);
                    }
                });
            });
        });
    </script>

    <script>
        var input = document.getElementById("nilai_realisasi");
        input.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 4) {
                this.value = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
        });
    </script>

    <script>
        var input = document.getElementById("nilai_pengembalian");
        input.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 4) {
                this.value = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
        });
    </script>
@endpush
