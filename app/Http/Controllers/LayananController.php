<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function klinik()
    {
        // Logic for klinik layanan
        return view('layanan.klinik');
    }

    public function provider()
    {
        // Logic for provider layanan
        return view('layanan.provider');
    }

    public function inhouse()
    {
        // Logic for inhouse layanan
        return view('layanan.inhouse');
    }

    public function download()
    {
        return view('layanan.download');
        // Logic for download layanan
    }
}
