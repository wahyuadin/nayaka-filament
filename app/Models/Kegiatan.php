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
        return self::where('is_active', true)->with('kategori', 'tags', 'user')->latest()->paginate(2);
    }

    public static function showBySlug($slug)
    {
        return self::whereHas('kategori', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with('kategori', 'tags', 'user')->latest()->get();
    }

    public static function showByTag($slug)
    {
        return self::whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with('kategori', 'tags', 'user')->latest()->get();
    }

    public static function search($cari)
    {
        return self::where('title', 'like', "%{$cari}%")
            ->orWhere('description', 'like', "%{$cari}%")
            ->with(['kategori', 'tags', 'user']) // eager load biar ga N+1
            ->where('is_active', true)
            ->latest()
            ->get();
    }
}
