<?php

namespace App\Http\Controllers;

use App\Models\LeadManagement;
use App\Models\PartnerKami;
use App\Models\SlideHome;
use Illuminate\Http\Request;
use App\Models\ProviderIcon;
use App\Models\AboutHome;
use App\Models\Faq;
use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\WhyUs;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('beranda.index', [
            'slide' => SlideHome::showData(),
            'lead_management' => LeadManagement::showData(),
            'about_us' => AboutHome::showData(),
            'partner_kami' => PartnerKami::showData(),
            'provider_kami' => ProviderIcon::showData(),
            'why_us' => WhyUs::showData(),
            'produk' => Produk::showData(),
            'testimoni' => Testimoni::showData(),
            'faq' => Faq::showData(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
