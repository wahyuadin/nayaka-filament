<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormulirController extends Controller
{


    // public function download($id)
    // {
    //     $dataItem = Formulir::findOrFail($id);
    //     $counterPath = "download_counts/{$id}.txt";
    //     if (!Storage::exists($counterPath)) {
    //         Storage::put($counterPath, 0);
    //     }
    //     $count = (int)Storage::get($counterPath);
    //     $count++;
    //     Storage::put($counterPath, $count);
    //     return response()->download(storage_path('app/public/' . $dataItem->file_path));
    // }
}
