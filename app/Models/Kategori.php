<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public static function showData($id = null)
    {
        return $id ? self::find($id)->get() : self::latest()->get();
    }
}
