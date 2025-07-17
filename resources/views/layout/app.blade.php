<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }} | NAYAKA ERA HUSADA</title>
    <meta name="description" content="PT Nayaka Era Husada adalah perusahaan penyedia layanan jaminan pemeliharaan kesehatan dengan pengalaman lebih dari 30 tahun, jaringan provider luas, dan layanan 24/7.">
    <meta name="keywords" content="Nayaka Era Husada, layanan kesehatan, provider kesehatan, jaminan kesehatan, managed care, rumah sakit, klinik">
    <meta name="author" content="PT Nayaka Era Husada">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="Nayaka Era Husada - Penyedia Layanan Kesehatan Terpercaya">
    <meta property="og:description" content="Lebih dari 30 tahun melayani dengan jaringan provider luas dan layanan kesehatan 24 jam.">
    <meta property="og:image" content="https://new.nayakaerahusada.com/assets/images/logo_nayaka2.png">
    <meta property="og:url" content="https://www.nayakaerahusada.com/">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nayaka Era Husada - Penyedia Layanan Kesehatan Terpercaya">
    <meta name="twitter:description" content="Lebih dari 30 tahun melayani dengan jaringan provider luas dan layanan kesehatan 24 jam.">
    <meta name="twitter:image" content="https://new.nayakaerahusada.com/assets/images/logo_nayaka2.png">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/icon.png') }}" type="image/png" />

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" />

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <style>
        .page-title {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 40vh;
            position: relative;
            background: url("{{ asset('assets/management/header.png') }}") center top / cover no-repeat;
            padding: 160px 0;
            opacity: 0.9;
            text-align: center;
            z-index: 1;
            overflow: hidden;
        }

        .entry-title {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .entry-meta {
            margin-bottom: 1.5rem;
            color: #6c757d;
        }

        .entry-meta ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .entry-meta i {
            color: #0172b6;
        }

        .entry-meta a {
            color: #6c757d;
            text-decoration: none;
            transition: 0.3s;
        }

        .entry-meta a:hover {
            color: #0172b6;
        }

        .entry-content h3 {
            font-weight: 600;
            font-size: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .entry-content blockquote {
            border-left: 3px solid #0172b6;
            padding: 1rem 1.5rem;
            background-color: #f8f9fa;
            font-style: italic;
        }

        .entry-footer .tags a {
            background: #f2f2f2;
            color: #555;
            padding: 5px 15px;
            margin: 0 5px 5px 0;
            display: inline-block;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .entry-footer .tags a:hover {
            background: #0172b6;
            color: #fff;
        }

        .author-box {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .comments .comment {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .comments .comment-img img {
            width: 60px;
            height: 60px;
        }

        .comments .reply {
            background: #f8f9fa;
            padding: 10px 15px;
            border-radius: 8px;
        }

    </style>

    @stack('style')
</head>
<body>
    <div class="site-wrap">
        @include('layout.header')

        <main>
            @yield('content')
            @include('layout.shortcut')
            @include('layout.footer')
        </main>
    </div>

    <!-- Back to Top -->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendors/purecounter/purecounter.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>


    @stack('script')
</body>
</html>
