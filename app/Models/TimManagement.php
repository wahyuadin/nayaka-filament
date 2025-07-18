<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimManagement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function showData($id = null)
    {
        return $id ? self::find($id)->get() : self::all()->first();
    }
}
