<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function showData($id = null)
    {
        return $id ? self::find($id)->with('user')->first() : self::with('user')->latest()->get();
    }

    public static function paginate()
    {
        return self::with('user')->latest()->paginate(6);
    }
}
