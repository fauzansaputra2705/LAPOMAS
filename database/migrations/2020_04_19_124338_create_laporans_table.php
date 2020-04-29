<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->integer('kategori_id');
            $table->integer('user_id');
            // $table->string('judul_laporan');
            $table->text('isi_laporan');
            $table->date('tanggal_laporan');
            // $table->text('tanggapan_laporan');
            $table->text('foto');
            $table->enum('status_laporan',['0','proses','selesai','ga_tanggapi', 'tolak']);
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
        Schema::dropIfExists('laporans');
    }
}
