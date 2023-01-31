<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = [
            [
                'name' => 'laporan_anggaran.xlsx',
                'path' => '/storage/berkas/laporan_anggaran.xlsx',
                'created_at' => '2021-01-16 02:14:50',
                'updated_at' => '2021-01-16 02:14:50',
            ]
        ];

        File::insert($files);
    }
}
