<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'telp' => 'array',
        'email' => 'array'
    ];

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::where('is_active', true)->where('is_pusat', false)->latest()->get();
    }
}
