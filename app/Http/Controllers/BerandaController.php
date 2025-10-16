<?php

namespace App\Http\Controllers;

use App\Models\LeadManagement;
use App\Models\PartnerKami;
use App\Models\SlideHome;
use Illuminate\Http\Request;
use App\Models\ProviderIcon;
use App\Models\AboutHome;
use App\Models\Faq;
use App\Models\Kegiatan;
use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\Video;
use App\Models\WhyUs;
use Illuminate\Support\Facades\Cache;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('beranda.index', [
            'slide' => Cache::remember(
                'slide_home',
                60,
                fn() =>
                SlideHome::showData()
            ),

            'lead_management' => Cache::remember(
                'lead_management',
                60,
                fn() =>
                LeadManagement::showData()
            ),

            'about_us' => Cache::remember(
                'about_home',
                60,
                fn() =>
                AboutHome::showData()
            ),

            'partner_kami' => Cache::remember(
                'partner',
                60,
                fn() =>
                PartnerKami::showData()
            ),

            'provider_kami' => Cache::remember(
                'provider_icon',
                60,
                fn() =>
                ProviderIcon::showData()
            ),

            'why_us' => Cache::remember(
                'why_us',
                60,
                fn() =>
                WhyUs::showData()
            ),

            'produk' => Cache::remember(
                'produk_home',
                60,
                fn() =>
                Produk::showData()
            ),

            'testimoni' => Cache::remember(
                'testimoni',
                60,
                fn() =>
                Testimoni::showData()
            ),

            'faq' => Cache::remember(
                'faq_home',
                60,
                fn() =>
                Faq::select('pertanyaan', 'jawaban')->where('is_active', true)->limit(5)->get()
            ),

            'kegiatan' => Cache::remember(
                'kegiatan_home',
                60,
                fn() =>
                Kegiatan::showData()
            ),

            'video' => Cache::remember(
                'video_home',
                60,
                fn() =>
                Video::limit(3)->latest()->get()
            ),
        ]);
    }
}
