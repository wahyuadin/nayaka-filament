<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderIcon extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'image' => 'array'
    ];

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::where('is_active', true)->get();
    }
}
