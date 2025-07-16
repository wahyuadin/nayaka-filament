<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutHome extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::orderBy('created_at', 'desc')->take(1)->first();
    }
}
