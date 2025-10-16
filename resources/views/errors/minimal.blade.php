@extends('layout.app')

@section('content')
<div class="site-wrap">
    <main>
        <div class="page-title" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <h1 class="mb-2">@yield('code') - @yield('message')</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Error
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <h1 class="error-code">@yield('code', '404')</h1>
                    <p class="error-message">@yield('message', 'Halaman Tidak Ditemukan')</p>
                    <p class="error-description">
                        Maaf, halaman yang Anda tuju sepertinya tidak ada atau telah dipindahkan. Mari kembali ke tempat yang lebih aman.
                    </p>

                    <a href="{{ url('/') }}" class="btn-home">
                        <i class="bi bi-house-heart-fill"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('style')
<style>
    .illustration {
        width: 100%;
        max-width: 200px;
        /* Sedikit lebih kecil agar fokus pada teks */
        margin-bottom: 2rem;
        animation: float 4s ease-in-out infinite;
    }

    .error-code {
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(4rem, 20vw, 8rem);
        /* Ukuran lebih dramatis */
        font-weight: 800;
        /* Lebih tebal */
        color: #f3ab01;
        margin: 0;
        line-height: 1;
        text-shadow: 4px 4px 0px #e9ecef;
        animation: slideInUp 0.6s ease-out;
    }

    .error-message {
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(1.25rem, 5vw, 1.75rem);
        /* Dibuat responsif */
        font-weight: 700;
        margin-top: 1rem;
        color: var(--secondary-color, #343a40);
        /* Menambahkan fallback color */
        animation: slideInUp 0.6s 0.1s ease-out backwards;
    }

    .error-description {
        margin-top: 0.75rem;
        margin-bottom: 2.5rem;
        /* Jarak lebih besar ke tombol */
        color: var(--text-color, #6c757d);
        /* Menambahkan fallback color */
        font-size: 1.1rem;
        line-height: 1.6;
        max-width: 500px;
        /* [TAMBAHKAN] Batasi lebar agar mudah dibaca */
        margin-left: auto;
        margin-right: auto;
        animation: slideInUp 0.6s 0.2s ease-out backwards;
    }

    .btn-home {
        display: inline-flex;
        /* [TAMBAHKAN] Agar 'gap' dan 'align-items' berfungsi */
        align-items: center;
        gap: 10px;
        /* Jarak antara ikon dan teks */
        background-color: #f3ab01;
        color: #ffffff;
        /* [PERBAIKI] Warna teks untuk kontras yang lebih baik */
        padding: 12px 28px;
        /* [PERBAIKI] Padding agar tombol tidak terlalu sempit */
        border-radius: 50px;
        text-decoration: none;
        margin-bottom: 30px;
        font-weight: 600;
        /* Sedikit lebih tebal */
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(243, 171, 1, 0.25);
        animation: slideInUp 0.6s 0.3s ease-out backwards;
    }

    .btn-home:hover {
        background-color: #e09f07;
        transform: translateY(-4px);
        /* Efek angkat lebih terasa */
        box-shadow: 0 8px 25px rgba(243, 171, 1, 0.35);
    }

    .btn-home i {
        font-size: 1.2rem;
        /* Ikon sedikit lebih besar */
    }

    /* Keyframes Animasi (Tetap sama, sudah bagus) */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }

        100% {
            transform: translateY(0px);
        }
    }

</style>
@endpush
