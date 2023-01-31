<?php

namespace App\Exports;

use App\Models\Anggaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnggaranExport implements FromView
{
    public function view(): View
    {
        return view('anggaran.export', [
            'anggaran' => Anggaran::all()
        ]);
    }
}
