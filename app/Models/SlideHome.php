<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideHome extends Model
{
    use HasFactory;
    protected $guarded = [];


    public static function showData($id = null)
    {
        return $id ? self::find($id)->where('is_active', true) : self::select('id', 'nama', 'image', 'created_at', 'first_slide')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();;
    }
}
