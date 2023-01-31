<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 100);
            $table->text('sub_kegiatan');
            $table->string('kode_rekening', 50);
            $table->string('nama_rekening', 255);
            $table->bigInteger('nominal');
            $table->date('tanggal_realisasi');
            $table->string('no_realisasi', 255);
            $table->bigInteger('nilai_realisasi');
            $table->date('tanggal_pengembalian');
            $table->string('no_pengembalian', 255);
            $table->bigInteger('nilai_pengembalian');
            $table->integer('volume_output');
            $table->string('satuan_output', 50);
            $table->longText('keterangan')->nullable();
            $table->string('bulan');
            $table->char('tahun', 4);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasis');
    }
};
