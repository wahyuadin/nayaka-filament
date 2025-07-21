<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    // app/Models/Tag.php
    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class, 'kegiatan_tags');
    }

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::latest()->get();
    }
}
