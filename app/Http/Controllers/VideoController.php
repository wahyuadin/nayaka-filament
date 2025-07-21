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
}
