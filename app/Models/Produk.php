<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'descripsi',
        'inovasi',
        'sekolah',
        'photo',
        'nama_tim',
        'jurusan',
        'material',
        'harga',
        'tahun_produksi',
        'merk_dagang',
        'sertifikasi_haki',
        'sertifikasi_halal',
        'sni',
    ];

    // public function jurusans()
    // {
    //     return $this->belongsToMany(Jurusan::class);
    // }

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
