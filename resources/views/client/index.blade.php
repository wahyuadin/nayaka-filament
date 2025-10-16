@extends('layout.app')

@push('styles')
<style>
    /* 🌟 Section Client */
    .client-section {
        background-color: #ffffff;
    }

    .client-intro {
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* 🧱 Kotak logo */
    .client-logo-box {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.75rem;
        padding: 1rem;
        aspect-ratio: 4 / 3;
        /* menjaga proporsi */
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .client-logo-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        border-color: transparent;
    }

    /* 🖼️ Gambar logo */
    .client-logo-box img {
        display: block;
        max-width: 90%;
        max-height: 90%;
        width: auto;
        height: auto;
        object-fit: contain;
        object-position: center;
        filter: grayscale(100%);
        opacity: 0.85;
        transition: transform 0.3s ease, opacity 0.3s ease, filter 0.3s ease;
    }

    .client-logo-box:hover img {
        transform: scale(1.05);
        filter: grayscale(0%);
        opacity: 1;
    }

    /* Fade-in animasi */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: scale(0.98);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Terapkan ke semua logo client */
    .client-logo-box img {
        display: block;
        width: 100%;
        max-width: 150px;
        height: auto;
        object-fit: contain;
        object-position: center;
        filter: grayscale(100%);
        opacity: 0;
        animation: fadeIn 1s ease forwards;
        transition: filter 0.3s ease, transform 0.3s ease;
    }

    /* Hover tetap jalan */
    .client-logo-box:hover img {
        filter: grayscale(0%);
        transform: scale(1.05);
        opacity: 1;
    }


    /* 📱 Responsif di layar kecil */
    @media (max-width: 992px) {
        .client-logo-box {
            aspect-ratio: 5 / 4;
            padding: 0.75rem;
        }
    }

    @media (max-width: 576px) {
        .client-logo-box {
            aspect-ratio: 1 / 1;
            padding: 0.5rem;
        }
    }

</style>
@endpush

@section('content')
<div class="site-wrap">
    <main>
        <!-- 🌐 Header / Title -->
        <div class="page-title py-5 bg-light" data-aos="fade-up">
            <div class="container text-center">
                <h1 class="display-5 fw-bold text-dark mb-2">OUR CLIENTS</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none">
                                <i class="bi bi-house"></i> Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Clients</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- 🤝 Section Client -->
        <section class="client-section py-5">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="fw-bold">Our Trusted Clients</h2>
                    <p class="client-intro text-muted">
                        Dukungan dan kepercayaan klien kami menjadi motivasi untuk terus memberikan layanan kesehatan yang profesional, cepat, dan terpercaya.
                    </p>
                </div>

                <!-- 🧩 Grid Logo -->
                <div class="row g-4 justify-content-center">
                    @forelse ($data as $client)
                    @foreach ($client->image as $img)
                    <img src="{{ asset('storage/' . $img) }}" alt="Client Logo" loading="lazy">
                    @endforeach
                    @empty
                    <div class="col-12 text-center" data-aos="fade-up">
                        <p class="text-muted">Data klien belum tersedia.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
