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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('photo');
            $table->string('video_produk');
            $table->text('nama_tim');
            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');
            $table->text('material');
            $table->integer('harga');
            $table->date('tahun_produksi');
            $table->string('merk_dagang');
            $table->string('sertifikasi_haki');
            $table->string('sertifikasi_halal');
            $table->string('sertifikasi_sni');
            $table->tinyInteger('status')->default(1)->comment('0=tidak aktif; 1=asesmen; 2=acc');
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
