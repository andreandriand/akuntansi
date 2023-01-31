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
        Schema::create('anggarans', function (Blueprint $table) {
            $table->id();
            $table->string('uraian_kegiatan', 255);
            $table->text('sub_kegiatan');
            $table->string('kode_rekening', 100);
            $table->string('uraian_rekening');
            $table->bigInteger('anggaran');
            $table->string('sumber_dana', 100);
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
        Schema::dropIfExists('anggarans');
    }
};
