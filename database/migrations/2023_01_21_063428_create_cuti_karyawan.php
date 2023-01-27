<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama'); 
            $table->string('divisi_kerja'); 
            $table->string('wilayah_kerja'); 
            $table->string('surat_cuti'); 
            $table->string('hp'); 
            $table->string('keterangan_cuti'); 
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
        Schema::dropIfExists('cuti_karyawan');
    }
}
