<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori');
            $table->text('descripsi');
            $table->text('inovasi');
            $table->string('sekolah');
            $table->string('photo');
            $table->string('video_produk');
            $table->text('nama_tim');
            $table->unsignedBigInteger('jurusan');
            $table->foreign('jurusan')->references('id')->on('jurusans')->onDelete('cascade');
            $table->text('material');
            $table->integer('harga');
            $table->date('tahun_produksi');
            $table->string('merk_dagang');
            $table->text('sertifikasi_haki');
            $table->text('sertifikasi_halal');
            $table->text('sni');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
