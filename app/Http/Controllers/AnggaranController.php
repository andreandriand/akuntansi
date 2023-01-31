<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggaranExport;
use App\Http\Requests\StoreAnggaranRequest;
use App\Http\Requests\UpdateAnggaranRequest;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggaran = Anggaran::all();
        return view('anggaran.index', ['anggaran' => $anggaran]);
    }

    // public function download()
    // {
    //     $anggaran = Anggaran::all();
    //     return view('anggaran.download', ['anggaran' => $anggaran]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnggaranRequest $request)
    {
        $request['anggaran'] = str_replace('.', '', $request['anggaran']);
        $request['anggaran'] = (int) $request['anggaran'];
        $anggaran = $request->validate(
            [
                'uraian_kegiatan' => 'required|string',
                'sub_kegiatan' => 'required|string',
                'kode_rekening' => 'required|integer',
                'uraian_rekening' => 'required|string',
                'anggaran' => 'required|integer',
                'sumber_dana' => 'required|string',
                'tahun' => 'required'
            ]
        );

        Anggaran::create($anggaran);

        return (redirect()->route('anggaran.create'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Anggaran $anggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggaran $anggaran)
    {
        $bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
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

        return view('anggaran.edit', ['anggaran' => $anggaran, 'bulan' => $bulan, 'uraian_kegiatan' => $uraian_kegiatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnggaranRequest  $request
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnggaranRequest $request, Anggaran $anggaran)
    {
        $anggarans = $request->validate(
            [
                'uraian_kegiatan' => 'required|string',
                'sub_kegiatan' => 'required|string',
                'kode_rekening' => 'required|integer',
                'uraian_rekening' => 'required|string',
                'anggaran' => 'required|integer',
                'bulan' => 'required|string',
                'tahun' => 'required'
            ]
        );

        $anggaran->update($anggarans);

        return (redirect()->route('anggaran.index'))->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggaran $anggaran)
    {
        Anggaran::destroy($anggaran->id);
        return (redirect()->route('anggaran.index'))->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {
        $name = 'Laporan Anggaran ' . date('d-m-Y') . '.xlsx';
        return Excel::download(new AnggaranExport, $name);
    }
}
