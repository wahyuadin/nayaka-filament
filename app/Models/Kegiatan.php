<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'kegiatan_tags');
    }


    public static function showData($id = null)
    {
        return $id ? self::with('kategori', 'tags')->where('slug', $id)->first() : self::where('is_active', true)->with('kategori', 'tags')->latest()->limit(3)->get();
    }

    public static function paginate()
    {
        return self::where('is_active', true)->with('kategori', 'tags')->latest()->paginate(2);
    }
}
