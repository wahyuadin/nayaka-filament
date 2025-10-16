<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('video.index', ['data' => Video::paginate()]);
    }

    public function slug($slug)
    {
        return $slug;
    }

    public function kategori($slug)
    {
        return $slug;
    }

    public function tag($slug)
    {
        return $slug;
    }

    public function carivideoPost(Request $request)
    {
        return view('video.search', [
            'search' => $request->search,
            'data' => Video::searchByRequest($request->search)
        ]);
    }
}
