<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'nama',
    //     'kategori',
    //     'descripsi',
    //     'inovasi',
    //     'user_id',
    //     'photo',
    //     'nama_tim',
    //     'jurusan_id',
    //     'material',
    //     'harga',
    //     'tahun_produksi',
    //     'merk_dagang',
    //     'sertifikasi_haki',
    //     'sertifikasi_halal',
    //     'sertifikasi_sni',
    //     'status'
    // ];

    // public function jurusans()
    // {
    //     return $this->belongsToMany(Jurusan::class);
    // }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function komentar(): HasMany
    {
        return $this->hasMany(Komentar::class);
    }
}
