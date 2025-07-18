<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use App\Models\DepartementCarrier;
use App\Models\LocationCarrier;
use App\Models\PengalamanCarrier;
use App\Models\TimManagement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function management()
    {
        return view('management.index', ['data' => TimManagement::showData()]);
    }

    public function carrier()
    {
        return view('carrier.index', [
            'data' => Carrier::showData(),
            'location' => LocationCarrier::all(),
            'pengalaman' => PengalamanCarrier::all(),
            'departemen' => DepartementCarrier::all(),
        ]);
    }

    public function filter(Request $request)
    {
        $query = Carrier::query();

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        if ($request->filled('departement_id')) {
            $query->where('departement_id', $request->departement_id);
        }

        if ($request->filled('pengalaman_id')) {
            $query->where('pengalaman_id', $request->pengalaman_id);
        }

        $data = $query->latest()->get();

        return response()->json([
            'data' => view('carrier.filter', compact('data'))->render()
        ]);
    }
}
