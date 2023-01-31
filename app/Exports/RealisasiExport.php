<?php

namespace App\Exports;

use App\Models\Realisasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RealisasiExport implements FromView
{
    public function view(): View
    {
        return view('realisasi.export', [
            'realisasi' => Realisasi::all()
        ]);
    }
}
