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
        return $slug;
    }

    public function tag($slug)
    {
        return $slug;
    }
}
