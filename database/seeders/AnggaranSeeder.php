<?php

namespace Database\Seeders;

use App\Models\Anggaran;
use Illuminate\Database\Seeder;

class AnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggarans = [
            [
                'id' => 1,
                'uraian_kegiatan' => 'Dinsos : Asistensi Sosial Penyandang Disabilitas (ASPD)',
                'sub_kegiatan' => 'Fasilitasi Bantuan Pengembangan Ekonomi Masyarakat',
                'kode_rekening' => '510601010001',
                'uraian_rekening' => 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Individu',
                'anggaran' => 2400000000,
                'sumber_dana' => 'APBN',
                'tahun' => '2023',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
                'id' => 2,
                'uraian_kegiatan' => 'Diskanla: Bansos Nelayan',
                'sub_kegiatan' => 'Penjaminan Ketersediaan Sarana Usaha Perikanan Tangkap',
                'kode_rekening' => '510601010001',
                'uraian_rekening' => 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Individu',
                'anggaran' => 13919000000,
                'sumber_dana' => 'APBD',
                'tahun' => '2023',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]
        ];

        Anggaran::insert($anggarans);
    }
}
