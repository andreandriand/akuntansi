<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggaran extends Model
{
    use SoftDeletes;

    public $table = 'anggarans';

    protected $fillable = [
        'uraian_kegiatan',
        'sub_kegiatan',
        'kode_rekening',
        'uraian_rekening',
        'anggaran',
        'sumber_dana',
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
