<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function showData()
    {
        return self::latest()->first();
    }
}
