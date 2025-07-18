<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Formulir;
use App\Models\Inhouse;
use App\Models\provider;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function klinik()
    {
        // Logic for klinik layanan
        return view('layanan.klinik', ['data' => Clinic::showData()]);
    }

    public function trackingDownload($id)
    {
        $dataItem = Formulir::findOrFail($id);
        $counterPath = "download_counts/{$id}.txt";
        if (!Storage::exists($counterPath)) {
            Storage::put($counterPath, 0);
        }
        $count = (int)Storage::get($counterPath);
        $count++;
        Storage::put($counterPath, $count);
        return response()->download(storage_path('app/public/' . $dataItem->file_path));
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
        return view('layanan.download', ['data' => Formulir::showData()]);
        // Logic for download layanan
    }
}
