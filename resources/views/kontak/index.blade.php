@extends('layout.app')

@section('content')
<div class="site-wrap">
    <main>
        <div class="page-title py-5 bg-light" data-aos="fade-up" data-aos-delay="100">
            <div class="container text-center">
                <h1 class="display-5 fw-bold text-dark mb-2">Kontak Nayaka</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none"><i class="bi bi-house"></i>
                                Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kontak
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="contact-section py-5">
            <div class="container">
                <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-6 fw-bold text-dark mb-3">Hubungi Kami</h2>
                        <p class="lead text-muted">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui
                            informasi di bawah ini atau kunjungi kantor cabang kami.</p>
                    </div>
                </div>
                @php
                $kapu = \App\Models\Kontak::where([['is_active', true], ['is_pusat', true]])->first();
                @endphp
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 shadow-sm border-0 rounded-4 p-4 text-center">
                            <div class="card-body">
                                <i class="bi bi-geo-alt-fill text-primary display-4 mb-3"></i>
                                <h5 class="card-title fw-bold mb-2">{{ $kapu->title ?? 'Tidak ada data' }}</h5>
                                <p class="card-text text-muted">
                                    {{ $kapu->address ?? 'Tidak ada data'  }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card h-100 shadow-sm border-0 rounded-4 p-4 text-center">
                            <div class="card-body">
                                <i class="bi bi-envelope-fill text-primary display-4 mb-3"></i>
                                <h5 class="card-title fw-bold mb-2">Email Kami</h5>
                                <p class="card-text">
                                    <a href="mailto:{{ $kapu->email[0]['email'] ?? 'Tidak ada data' }}" class="text-decoration-none text-dark">{{ $kapu->email[0]['email'] ?? 'Tidak ada data' }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="card h-100 shadow-sm border-0 rounded-4 p-4 text-center">
                            <div class="card-body">
                                <i class="bi bi-phone-fill text-primary display-4 mb-3"></i>
                                <h5 class="card-title fw-bold mb-2">Telepon</h5>
                                <p class="card-text">
                                    @isset($kapu->telp)
                                    @foreach ($kapu->telp as $telpItem)
                                    <a href="tel:{{ $telpItem['nomor'] }}" class="text-decoration-none text-dark d-block">{{ $telpItem['nomor'] }}</a>
                                    @endforeach
                                    @else
                                    <span class="text-muted">Tidak ada data</span>
                                    @endisset
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5" data-aos="fade-up" data-aos-delay="600">
                    <div class="col-12">
                        <h3 class="fw-bold text-dark mb-4 text-center">Lokasi Kami di Peta</h3>
                        <div class="map-container rounded-4 shadow-sm overflow-hidden">
                            <iframe src="{{ $kapu->google_maps ?? 'Tidak ada data' }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="700">
                    <hr>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="800">
                    <div class="col-12 text-center mb-4">
                        <h3 class="fw-bold text-dark mb-3">Kantor Cabang Kami</h3>
                        <p class="lead text-muted">Temukan Nayaka Era Husada di berbagai kota di Indonesia.</p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    @foreach ($data as $dataItem)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 shadow-sm border-0 rounded-4 p-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-2 text-primary">{{ $dataItem->title }}</h5>
                                <p class="card-text text-muted mb-2">
                                    {{ $dataItem->address }}
                                </p>
                                @foreach ($dataItem->telp as $telpData)
                                <p class="card-text mb-0">
                                    <i class="bi bi-telephone-fill me-2"></i><a href="tel:{{ $telpData['nomor'] }}" class="text-decoration-none text-dark">{{ $telpData['nomor'] }}</a>
                                </p>
                                @endforeach
                                <p class="card-text">
                                    @foreach ($dataItem->email as $emailData)
                                    <i class="bi bi-envelope-fill me-2"></i><a href="mailto:{{ $emailData['email'] }}" class="text-decoration-none text-dark">{{ $emailData['email'] }}</a>
                                    @endforeach
                                </p>
                                <a href="{{ $dataItem->google_maps }}" target="_blank" class="btn btn-outline-primary btn-sm mt-3 rounded-pill">
                                    <i class="bi bi-map-fill me-2"></i>Lihat di Peta
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</div>
@endsection

@push('styles')
<style>
    /* Custom CSS for map container if needed */
    .map-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        border-radius: 1rem;
        /* Adjust to match rounded-4 */
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    /* Further refine card appearance if necessary */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    /* Icon styling */
    .contact-section .bi {
        color: #007bff;
        /* Primary color, adjust as needed */
    }

</style>
@endpush
