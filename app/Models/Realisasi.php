<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realisasi extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'realisasis';

    protected $fillable = [
        'nama_kegiatan',
        'sub_kegiatan',
        'kode_rekening',
        'nama_rekening',
        'nominal',
        'tanggal_realisasi',
        'no_realisasi',
        'nilai_realisasi',
        'tanggal_pengembalian',
        'no_pengembalian',
        'nilai_pengembalian',
        'volume_output',
        'satuan_output',
        'keterangan',
        'bulan',
        'tahun',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $dates = [
        'update_at',
        'created_at',
        'deleted_at'
    ];
}
