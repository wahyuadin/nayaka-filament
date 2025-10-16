<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Formulir;
use App\Models\Inhouse;
use App\Models\provider;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

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
        return view('layanan.provider');
    }

    public function inhouse()
    {
        // Logic for inhouse layanan
        return view('layanan.inhouse');
    }

    public function download()
    {
        return view('layanan.download', ['data' => Formulir::showData()]);
        // Logic for download layanan
    }

    // ======================================
    // SERVER SITE
    // ======================================
    public function serversiteProvider()
    {
        $data = Provider::showData();
        return DataTables::of($data)->addIndexColumn()->make(true);
    }

    public function serversiteKlinik()
    {
        $data = Clinic::showData();
        return DataTables::of($data)->addIndexColumn()->make(true);
    }

    public function serversiteInhouse()
    {
        $data = Inhouse::showData();
        return DataTables::of($data)->addIndexColumn()->make(true);
    }
}
