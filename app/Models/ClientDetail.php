<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'image' => 'array'
    ];

    public static function showData($id = null)
    {
        return $id ? self::find($id)->where('is_active', true) : self::where('is_active', true)->get();
    }
}
