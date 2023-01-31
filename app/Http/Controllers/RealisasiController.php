<?php

namespace App\Http\Controllers;

use App\Models\Realisasi;
use App\Http\Requests\StoreRealisasiRequest;
use App\Http\Requests\UpdateRealisasiRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RealisasiExport;
use App\Models\Anggaran;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realisasi = Realisasi::all();
        return view('realisasi.index', ['realisasi' => $realisasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggaran = Anggaran::all();
        return view('realisasi.create', ['anggaran' => $anggaran]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRealisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealisasiRequest $request)
    {
        $request['nilai_realisasi'] = str_replace('.', '', $request['nilai_realisasi']);
        $request['nilai_pengembalian'] = str_replace('.', '', $request['nilai_pengembalian']);
        $request['nilai_realisasi'] = (int) $request['nilai_realisasi'];
        $request['nilai_pengembalian'] = (int) $request['nilai_pengembalian'];

        $date = Carbon::createFromFormat('Y-m-d', $request->tanggal_realisasi);
        $month = $date->month;
        if ($month == 1) {
            $month = 'Januari';
        } elseif ($month == 2) {
            $month = 'Februari';
        } elseif ($month == 3) {
            $month = 'Maret';
        } elseif ($month == 4) {
            $month = 'April';
        } elseif ($month == 5) {
            $month = 'Mei';
        } elseif ($month == 6) {
            $month = 'Juni';
        } elseif ($month == 7) {
            $month = 'Juli';
        } elseif ($month == 8) {
            $month = 'Agustus';
        } elseif ($month == 9) {
            $month = 'September';
        } elseif ($month == 10) {
            $month = 'Oktober';
        } elseif ($month == 11) {
            $month = 'November';
        } elseif ($month == 12) {
            $month = 'Desember';
        }
        $year = $date->year;
        $realisasi = $request->validate([
            'nama_kegiatan' => 'required',
            'sub_kegiatan' => 'required',
            'kode_rekening' => 'required|integer',
            'nama_rekening' => 'required',
            'nominal' => 'required|integer',
            'tanggal_realisasi' => 'required',
            'no_realisasi' => 'required',
            'nilai_realisasi' => 'required',
            'tanggal_pengembalian' => 'required',
            'no_pengembalian' => 'required',
            'nilai_pengembalian' => 'required',
            'volume_output' => 'required',
            'satuan_output' => 'required',
            'keterangan' => 'required',
        ]);

        $realisasi['bulan'] = $month;
        $realisasi['tahun'] = $year;

        Realisasi::create($realisasi);

        return (redirect()->route('realisasi.create'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Realisasi $realisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Realisasi $realisasi)
    {
        $uraian_kegiatan = [
            'Dinsos: Asistensi Sosial Penyandang Disabilitas (ASPD)',
            'Dinsos: Bansos Ojek Konventional dan Online',
            'Diskanla: Bansos Nelayan',
            'Dinkop UKM: Bansos Pelaku Usaha Mikro',
            'Din. ESDM: Bantuan Token Pulsa Listrik',
            'Dispertan KP: Peningkatan Ketersediaan Pangan Tingkat Rumah Tangga/Pekarangan Pangan Lestari (PEKAPARI-P2L)',
            'Dispertan KP: Gelar Pasar Pangan Murah',
            'Disperindag: Pasar Murah Online',
            'Biro Perekonomian: Lumbung Pangan Jatim',
        ];

        return view('realisasi.edit', ['realisasi' => $realisasi, 'uraian_kegiatan' => $uraian_kegiatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealisasiRequest  $request
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealisasiRequest $request, Realisasi $realisasi)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->tanggal_realisasi);
        $month = $date->month;
        if ($month == 1) {
            $month = 'Januari';
        } elseif ($month == 2) {
            $month = 'Februari';
        } elseif ($month == 3) {
            $month = 'Maret';
        } elseif ($month == 4) {
            $month = 'April';
        } elseif ($month == 5) {
            $month = 'Mei';
        } elseif ($month == 6) {
            $month = 'Juni';
        } elseif ($month == 7) {
            $month = 'Juli';
        } elseif ($month == 8) {
            $month = 'Agustus';
        } elseif ($month == 9) {
            $month = 'September';
        } elseif ($month == 10) {
            $month = 'Oktober';
        } elseif ($month == 11) {
            $month = 'November';
        } elseif ($month == 12) {
            $month = 'Desember';
        }
        $year = $date->year;

        $request['nominal'] = (int) $request['nominal'];
        $request['nilai_realisasi'] = (int) $request['nilai_realisasi'];
        $request['nilai_pengembalian'] = (int) $request['nilai_pengembalian'];

        $realisasis = $request->validate(
            [
                'nama_kegiatan' => 'required',
                'sub_kegiatan' => 'required',
                'kode_rekening' => 'required|integer',
                'nama_rekening' => 'required',
                'nominal' => 'required|integer',
                'tanggal_realisasi' => 'required',
                'no_realisasi' => 'required',
                'nilai_realisasi' => 'required',
                'tanggal_pengembalian' => 'required',
                'no_pengembalian' => 'required',
                'nilai_pengembalian' => 'required',
                'volume_output' => 'required',
                'satuan_output' => 'required',
                'keterangan' => 'required',
            ]
        );

        $realisasis['bulan'] = $month;
        $realisasis['tahun'] = $year;

        $realisasi->update($realisasis);

        return (redirect()->route('realisasi.index'))->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realisasi $realisasi)
    {
        Realisasi::destroy($realisasi->id);

        return (redirect()->route('realisasi.index'))->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {
        $name = 'Laporan Realisasi ' . date('d-m-Y') . '.xlsx';
        return Excel::download(new RealisasiExport, $name);
    }

    public function getData($uraian_kegiatan)
    {
        $data = Anggaran::where('uraian_kegiatan', $uraian_kegiatan)->first();
        return response()->json($data);
    }
}
