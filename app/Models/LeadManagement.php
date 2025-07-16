<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadManagement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::orderBy('created_at', 'desc')->take(2)->get();
    }
}
