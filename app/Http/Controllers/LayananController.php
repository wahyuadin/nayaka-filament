<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Inhouse;
use App\Models\provider;

class LayananController extends Controller
{
    public function klinik()
    {
        // Logic for klinik layanan
        return view('layanan.klinik', ['data' => Clinic::showData()]);
    }

    public function provider()
    {
        // Logic for provider layanan
        return view('layanan.provider', ['data' => provider::showData()]);
    }

    public function inhouse()
    {
        // Logic for inhouse layanan
        return view('layanan.inhouse', ['data' => Inhouse::showData()]);
    }

    public function download()
    {
        return view('layanan.download');
        // Logic for download layanan
    }
}
