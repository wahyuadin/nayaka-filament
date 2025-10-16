<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function showData($id = null)
    {
        return $id ? self::find($id) : self::select('pertanyaan', 'jawaban')->where('is_active', true)->get();
    }

    public static function showLimit($limit)
    {
        return self::limit($limit)->where('is_active', true)->get();
    }
}
