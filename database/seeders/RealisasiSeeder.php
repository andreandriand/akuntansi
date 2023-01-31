<?php

namespace Database\Seeders;

use App\Models\Realisasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RealisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realisasi = [
            [
                'id' => 1,
                'nama_kegiatan' => 'Dinsos : Asistensi Sosial Penyandang Disabilitas (ASPD)',
                'sub_kegiatan' => 'Fasilitasi Bantuan Pengembangan Ekonomi Masyarakat',
                'kode_rekening' => '510601010001',
                'nama_rekening' => 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Individu',
                'nominal' => 2400000000,
                'tanggal_realisasi' => '2023-01-11',
                'no_realisasi' => '123456789',
                'nilai_realisasi' => 2000000000,
                'tanggal_pengembalian' => '2023-01-14',
                'no_pengembalian' => '987654321',
                'nilai_pengembalian' => 400000000,
                'volume_output' => 100,
                'satuan_output' => 'orang',
                'keterangan' => 'Bantuan untuk masyarakat yang membutuhkan',
                'bulan' => 'Januari',
                'tahun' => '2023',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
                'id' => 2,
                'nama_kegiatan' => 'Diskanla: Bansos Nelayan',
                'sub_kegiatan' => 'Penjaminan Ketersediaan Sarana Usaha Perikanan Tangkap',
                'kode_rekening' => '510601010001',
                'nama_rekening' => 'Belanja Bantuan Sosial Uang yang Direncanakan kepada Individu',
                'nominal' => 13919000000,
                'tanggal_realisasi' => '2023-02-04',
                'no_realisasi' => '123456789',
                'nilai_realisasi' => 11200000000,
                'tanggal_pengembalian' => '2023-02-10',
                'no_pengembalian' => '987654321',
                'nilai_pengembalian' => 1200000000,
                'volume_output' => 1000,
                'satuan_output' => 'orang',
                'keterangan' => 'Bantuan untuk masyarakat yang membutuhkan',
                'bulan' => 'Februari',
                'tahun' => '2023',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
        ];

        Realisasi::insert($realisasi);
    }
}
