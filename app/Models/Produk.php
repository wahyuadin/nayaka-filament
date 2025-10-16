<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function showData($id = null)
    {
        $select = [
            'id',
            'title',
            'description',
            'image',
            'height_image',
            'width_image',
            'content',
            'created_at',
        ];
        return $id ? self::select($select)->findOrFail($id) : self::select($select)->where('is_active', true)->orderBy('created_at', 'ASC')->get();
    }
}
