<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPribadi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pribadi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('tempat');
            $table->string('tanggal');
            $table->string('gender');
            $table->string('status_pribadi');
            $table->string('image');
            $table->string('jabatan');
            $table->string('wilayah');
            $table->string('alamat');
            $table->string('hp'); 
            $table->string('data_lengkap'); 
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
        Schema::dropIfExists('data_pribadi');
    }
}
