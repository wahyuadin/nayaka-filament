<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::with('kota')->latest()->get();
    }
}
