<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subcategory(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
    public function karya(): HasMany
    {
        return $this->hasMany(Karya::class);
    }

}
