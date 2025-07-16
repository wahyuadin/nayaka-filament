<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ ucwords(str_replace(' ', ' ', config('app.name'))) }} | NAYAKA ERA HUSADA</title>
    <meta name="description" content="PT Nayaka Era Husada adalah perusahaan penyedia layanan jaminan pemeliharaan kesehatan dengan pengalaman lebih dari 30 tahun, jaringan provider luas, dan layanan 24/7." />
    <meta name="keywords" content="Nayaka Era Husada, layanan kesehatan, provider kesehatan, jaminan kesehatan, managed care, rumah sakit, klinik" />
    <meta name="author" content="PT Nayaka Era Husada" />
    <link rel="canonical" href="https://www.nayakaerahusada.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Nayaka Era Husada - Penyedia Layanan Kesehatan Terpercaya" />
    <meta property="og:description" content="Lebih dari 30 tahun melayani dengan jaringan provider luas dan layanan kesehatan 24 jam." />
    <meta property="og:image" content="https://new.nayakaerahusada.com/assets/images/logo_nayaka2.png" />
    <meta property="og:url" content="https://www.nayakaerahusada.com/" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Nayaka Era Husada - Penyedia Layanan Kesehatan Terpercaya" />
    <meta name="twitter:description" content="Lebih dari 30 tahun melayani dengan jaringan provider luas dan layanan kesehatan 24 jam." />
    <meta name="twitter:image" content="https://new.nayakaerahusada.com/assets/images/logo_nayaka2.png" />

    <!-- Favicon (contoh) -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />

    <!-- Font Awesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Styles -->
    <link href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @stack('style')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">
        <!-- ======= Header =======-->
        @include('layout.header')
        <!-- End Header-->

        <!-- ======= Main =======-->
        <main>
            @yield('content')
            <!-- ======= Shortcut =======-->
            @include('layout.shortcut')
            <!-- End Shortcut-->

            <!-- ======= Footer =======-->
            @include('layout.footer')
            <!-- End Footer-->
        </main>
    </div>
    <!-- ======= Back to Top =======-->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/gsap/gsap.min.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/glightbox/glightbox.min.js"></script>
    <script src="assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendors/aos/aos.js"></script>
    <script src="assets/vendors/purecounter/purecounter.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true
            , pagination: {
                el: ".swiper-pagination"
                , clickable: true
            , }
            , navigation: {
                nextEl: ".swiper-button-next"
                , prevEl: ".swiper-button-prev"
            , }
        , });

    </script>
    @stack('scripts')
    <!-- End JavaScripts-->
</body>
</html>
