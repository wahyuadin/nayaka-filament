<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\Tag;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('kegiatan.index', [
            'data' => Kegiatan::paginate(),
            'kategori' => Kategori::showData(),
            'tag' => Tag::showData()
        ]);
    }

    public function slug($slug)
    {
        return view('kegiatan.post', ['data' => Kegiatan::showData($slug)]);
    }

    public function kategori($slug)
    {
        return view('kegiatan.kategori', [
            'data' => Kegiatan::showBySlug($slug),
            'slug' => $slug
        ]);
    }

    public function showTag($slug)
    {
        return view('kegiatan.tag', ['data' => Kegiatan::showByTag($slug), 'slug' => $slug]);
    }

    public function carikegiatanPost(Request $request)
    {
        return view('kegiatan.search', [
            'data' => Kegiatan::search($request->search),
            'kategori' => Kategori::showData(),
            'tag' => Tag::showData(),
            'search' => $request->search
        ]);
    }

    public function validasi(Request $request)
    {
        $request->validate([
            'search' => 'required|min:1'
        ]);
    }
}
