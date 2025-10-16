@extends('layout.app')

@section('content')
<div class="section" id="home">
    <div id="carouselExampleFade" class="carousel slide carousel-fade custom-carousel hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slide as $slideItem)
            <div class="carousel-item {{ $slideItem->first_slide == 1 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $slideItem->image) }}" loading="lazy" class="d-block" width="300" height="" alt="{{ $slideItem->nama }}" />
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- End Hero-->

<!-- Komponen HTML Blade -->
<div data-aos="fade-center" data-aos-delay="200">
    <p class="fw-semibold text-center">Lead Management</p>

    <div class="d-flex flex-nowrap justify-content-center align-items-center gap-4">
        @foreach ($lead_management as $lead)
        <img src="{{ asset('storage/' . $lead->image) }}" alt="{{ $lead->image }}" class="lead-logo" />
        @endforeach
    </div>
</div>
<!-- ======= Stats =======-->
<section class="stats__v3 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-nowrap justify-content-center align-items-center gap-4 content rounded-4 position-relative overflow-hidden" data-aos="fade-up" data-aos-delay="0">
                    <div class="rounded-borders">
                        <div class="rounded-border-1"></div>
                        <div class="rounded-border-2"></div>
                        {{-- <div class="rounded-border-3"></div> --}}
                    </div>

                    <div class="stat-item col-sm-6 text-center" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="fs-1 fw-bold">
                            <span class="purecounter" data-purecounter-start="0" data-purecounter-end="550" data-purecounter-duration="1"></span><span style="color:var(--purecounter)">K+</span>
                        </h3>
                        <p class="mb-0" style="font-family: Montserrat, sans-serif;">Peserta Aktif</p>
                    </div>

                    <div class="stat-item col-sm-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="fs-1 fw-bold">
                            <span class="purecounter" data-purecounter-start="0" data-purecounter-end="3700" data-purecounter-duration="1"></span><span style="color:var(--purecounter)">+</span>
                        </h3>
                        <p class="mb-0" style="font-family: Montserrat, sans-serif;">Provider Kerjasama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section" style="background-color: #f7faff" data-aos="fade-right" data-aos-delay="200">
    <div class="container text-center">
        <!-- Rating & Logos -->
        <!-- partner -->
        <section class="pagination-wrapper">
            <div class="container text-center">
                <h2 class="mb-4" style="
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode',
                      'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                  ">
                    <b>Our Clients</b>
                </h2>
                <div class="logo-marquee-horizontal">
                    <div class="logo-track-horizontal">
                        <!-- Logo baris pertama -->
                        <div class="logo-group-horizontal">
                            @foreach ($partner_kami as $pk)
                            <img src="{{ asset('storage/' . $pk->image) }}" loading="lazy" width="" width="" alt="{{ $pk->image }}" style="width: {{ $pk->width ?? '' }}; height: {{ $pk->height ?? '' }}" />
                            @endforeach
                        </div>
                        <!-- Logo baris kedua (copy) -->
                        <div class="logo-group-horizontal">
                            @foreach ($partner_kami as $pk)
                            <img src="{{ asset('storage/' . $pk->image) }}" loading="lazy" width="" width="" alt="{{ $pk->image }}" style="width: {{ $pk->width ?? '' }}; height: {{ $pk->height ?? '' }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- partner -->
        <section class="pagination-wrapper">
            <div class="container text-center">
                <h2 class="mb-4" style="
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode',
                      'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                  ">
                    <b>Our Providers</b>
                </h2>
                <div class="logo-marquee-horizontal-kiri">
                    <div class="logo-track-horizontal-kiri">
                        <!-- Logo baris pertama -->
                        <div class="logo-group-horizontal-kiri">
                            @foreach ($provider_kami as $provider)
                            <img src="{{ asset('storage/' . $provider->image) }}" loading="lazy" width="" width="" alt="{{ $provider->image }}" />
                            @endforeach
                        </div>
                        <!-- Logo baris kedua (copy) -->
                        <div class="logo-group-horizontal-kiri">
                            @foreach ($provider_kami as $provider)
                            <img src="{{ asset('storage/' . $provider->image) }}" loading="lazy" width="" width="" alt="{{ $provider->image }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <a href="{{ route('layanan.provider') }}" class="btn btn-primary rounded-border-3 btn-sm mt-5">
                    <i class="fa-regular fa-eye"></i> Daftar Provider
                </a>
            </div>
        </section>
        <!-- End Partner -->

        <div class="mb-5">
            <div class="mb-2 text-warning fs-5">
            </div>
        </div>
    </div>
</section>
<!-- ======= About =======-->
<section class="about__v4 section-padding-top" id="about">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6 order-1 order-md-2">
                <div class="img-wrap position-relative">
                    <img class="img-fluid rounded-4" loading="lazy" width="" width="" src="{{ asset('storage/' . $about_us->image) }}" alt="Tentang Nayaka Era Husada" data-aos="fade-up" data-aos-delay="300" />
                </div>
            </div>
            <div class="col-md-6 order-2 order-md-1">
                <div class="row justify-content-end">
                    <div class="col-md-11 mb-4 mt-4 mb-md-0">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">{{ $about_us->label ?? '-' }}</span>
                        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="100">
                            {{ $about_us->title ?? 'Data Belum Diinput' }}
                        </h2>
                        <div data-aos="fade-up" data-aos-delay="200">
                            {!! $about_us->description ?? '<p>Data Belum Diinput</p>' !!}
                            <button class="btn btn-primary btn-sm rounded-4" data-bs-toggle="modal" data-bs-target="#aboutusModal{{ $about_us->id ?? '' }}">
                                <i class="bi bi-arrow-right-circle me-1"></i>
                                Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About-->
<!-- ======= Features =======-->
<section class="section features__v2" id="features">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-lg-flex p-5 rounded-4 content" data-aos="fade-in" data-aos-delay="0">
                    <div class="row">
                        <div class="col-lg-5 mb-lg-0 order-2" data-aos="fade-up" data-aos-delay="0">
                            <div class="row p-2">
                                <div class="col-lg-11">
                                    <div class="h-100 flex-column justify-content-between d-flex">
                                        <div>
                                            <h2 class="mb-4" style="
                                                            font-family: 'Trebuchet MS',
                                                                'Lucida Sans Unicode', 'Lucida Grande',
                                                                'Lucida Sans', Arial, sans-serif;
                                                            ">
                                                <b>{{ $why_us->title ?? 'Data Belum Diinput' }}</b>
                                            </h2>
                                            <div class="mb-5">
                                                {!! $why_us->content ?? '<p>Data Belum Diinput</p>' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row justify-content-end">
                                <div class="col-lg-11">
                                    <div class="row" data-aos="fade-in" data-aos-delay="200">
                                        @isset($why_us->image)
                                        <img src="{{ asset('storage/' . ($why_us->image ?? 'default.png')) }}" alt="Tentang Kami" style="border-radius: 5%" loading="lazy" width="" width="" class="img-fluid mb-4" />
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features-->

<!-- ======= Pricing =======-->
<section class="section-lead-management pricing__v2" id="pricing">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                    <b>Produk</b>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200">
                    Klinik | Managed Care | TPA/ASO | Medical Check Up
                </p>
            </div>
        </div>
        <div class="row g-4" data-aos="fade-up" data-aos-delay="120">
            <!-- g-4 = gutter/padding antar kolom -->
            @foreach ($produk as $produkItem)
            <div class="col-md-3">
                <div class="item__wrap p-4 rounded-4 h-100 shadow-xl d-flex flex-column align-items-center">
                    <div class="item__image mb-3 text-center">
                        <img src="{{ asset('storage/' . ($produkItem->image ?? 'default.png')) }}" width="{{ $produkItem->width_image ?? '' }}" height="{{ $produkItem->height_image ?? '' }}" alt="{{ $produkItem->title }}" loading="lazy" class="img-fluid rounded" />
                    </div>
                    <h3 class="item__title mb-2">{{ $produkItem->title }}</h3>
                    <div class="item__desc mb-3">
                        {!! $produkItem->description ?? '<p>Data Belum Diinput</p>' !!}
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produkModal{{ $produkItem->id }}">
                        <i class="bi bi-arrow-right-circle me-1"></i> Read more
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Pricing-->

<!-- ======= Services =======-->
<section class="section services__v3 bg-light py-5" id="services" data-aos="fade-right" data-aos-delay="200">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3">KEGIATAN</span>
                <h2 class="mb-3"><b>Kegiatan & Gallery</b></h2>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        Kegiatan
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Video
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper mb-5">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="row g-4">
                                @foreach ($kegiatan as $kegiatanItem)
                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="{{ asset('storage/' . $kegiatanItem->image) }}" loading="lazy" width="" width="" alt="Digital Payments Icon" class="card-img-top fade-hover rounded-2" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                {{ ucwords($kegiatanItem->title) }}
                                            </h3>
                                            <p>
                                                {{ Str::limit($kegiatanItem->description, 100) }}
                                            </p>
                                            <a href="{{ route('kegiatan.slug', $kegiatanItem->slug) }}" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Dots -->
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                            <i class="bi bi-eye"></i>
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row g-4 justify-content-center">
                    @foreach ($video as $videoItem)
                    @php
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $videoItem->link_youtube, $matches);
                    $videoId = $matches[1] ?? null;
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="service-card rounded-4 shadow-sm bg-white d-flex flex-column align-items-center">
                            <a href="{{ $videoItem->link_youtube }}" target="_blank" rel="noopener" class="d-block position-relative rounded-2 overflow-hidden ratio ratio-16x9 w-100">
                                <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="{{ $videoItem->title }}" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
                                <span class="yt-play-btn"></span>
                            </a>
                            <div class="p-4 w-100">
                                <h3 class="fs-5 mb-3">{{ $videoItem->title }}</h3>
                                <p>{{ Str::limit($videoItem->description, 120) }}</p>
                                <a href="{{ $videoItem->link_youtube }}" target="_blank" class="special-link d-inline-flex align-items-center text-decoration-none">
                                    <i class="bi bi-arrow-right-short me-1"></i>Lihat di YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-5">
                        <a href="https://www.nayakaerahusada.com/video" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                            <i class="bi bi-eye"></i>
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services-->

<!-- ======= Testimonials =======-->
<section class="section-padding-top testimonials__v2 mb-5" id="testimonials">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">
                    Testimoni
                </h2>
            </div>
        </div>
        <div class="row g-4" data-masonry='{"percentPosition": true }'>
            @foreach ($testimoni as $testimoniItem)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="testimonial rounded-4 p-4">
                    <blockquote class="mb-3">
                        &ldquo; {{ $testimoniItem->komentar }} &rdquo;
                    </blockquote>
                    <div class="testimonial-author d-flex gap-3 align-items-center">
                        <div class="author-img">
                            <img class="rounded-circle img-fluid" src="{{ asset('/storage/' . $testimoniItem->image) }}" alt="{{ $testimoniItem->nama }}" />
                        </div>
                        <div class="lh-base">
                            <strong class="d-block"> {{ $testimoniItem->nama }}
                            </strong><span>{{ $testimoniItem->sub_nama }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Testimonials-->

<!-- ======= FAQ =======-->
@if(!empty($faq) && $faq->count())
<section class="section-padding-top faq__v2" id="faqu" data-aos="fade-right" data-aos-delay="30">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6 col-lg-7 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">F.A.Q</span>
                <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">
                    Pertanyaan yang Sering Diajukan
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="faq-content">
                    <div class="accordion custom-accordion" id="accordionPanelsStayOpenExample">
                        @foreach ($faq as $index => $faqItem)
                        @php
                        $collapseId = 'collapseFaq' . $index;
                        $isFirst = $index === 0;
                        @endphp

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $isFirst ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                    {{ $faqItem->pertanyaan }}
                                </button>
                            </h2>
                            <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionPanelsStayOpenExample">
                                <div class="accordion-body">
                                    {!! $faqItem->jawaban !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('faq.index') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                            <i class="bi bi-eye"></i>
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End FAQ-->
</section>
@endif
<!-- End FAQ-->

<!-- ======= Contact =======-->
<section class="section-lead-management contact__v2" id="contact">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-7 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Kontak</span>
                <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">
                    Hubungi Kami
                </h2>
                <!-- s -->
            </div>
        </div>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-contact h-100 shadow-sm rounded-4 p-4 text-center">
                    <div class="card-body">
                        <div class="icon-wrapper">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-2">Hubungi Kami</h5>
                        <p class="card-text">
                            <a href="tel:0215260518">021-5260518</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card card-contact h-100 shadow-sm rounded-4 p-4 text-center">
                    <div class="card-body">
                        <div class="icon-wrapper">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-2">Kirim Email</h5>
                        <p class="card-text">
                            <a href="mailto:pusat@nayakaerahusada.com">pusat@nayakaerahusada.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="card card-contact h-100 shadow-sm rounded-4 p-4 text-center">
                    <div class="card-body">
                        <div class="icon-wrapper">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-2">Kantor Pusat</h5>
                        <p class="card-text text-muted" style="text-align:center">
                            Gedung DPK BPJS KETENAGAKERJAAN
                            Lt. 2 Jl. Tangkas Baru No.1
                            Jakarta Selatan 12930
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('beranda.produk-modal.index')
@include('beranda.about-us.index')
@push('style')
<style>
    body {
        background-color: #f8f9fa;
    }

    /* Kustomisasi kartu untuk tampilan yang lebih elegan */
    .card-contact {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #ffffff;
    }

    /* Efek hover yang halus: sedikit terangkat dengan bayangan yang lembut */
    .card-contact:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.08);
    }

    /* Wrapper untuk ikon agar memiliki latar belakang lingkaran */
    .icon-wrapper {
        width: 72px;
        height: 72px;
        margin: 0 auto 1.5rem auto;
        /* Atur margin bawah (mb-4) dan tengahkan */
        background-color: var(--bs-primary);
        /* Warna biru primer dengan opacity 10% */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .card-contact:hover .icon-wrapper {
        background-color: var(--bs-primary);
        /* Warna biru primer solid saat hover */
        transform: scale(1.05);
        /* Sedikit membesar saat hover */
    }

    /* Styling untuk ikon di dalam wrapper */
    .icon-wrapper .bi {
        color: #ffffff;
        /* Menggunakan warna primer Bootstrap */
        font-size: 2rem;
        /* Ukuran ikon 32px */
        transition: color 0.3s ease;
    }

    .card-contact:hover .icon-wrapper .bi {
        color: #ffffff;
        /* Ubah warna ikon menjadi putih saat hover */
    }

    /* Memastikan link di dalam kartu terlihat bagus */
    .card-contact .card-text a {
        color: #212529;
        /* Warna teks gelap standar */
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .card-contact .card-text a:hover {
        color: var(--bs-primary);
        /* Warna link menjadi biru saat disentuh */
        text-decoration: underline;
    }

    .yt-play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 68px;
        /* sesuaikan */
        height: 48px;
        background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 68 48'><path fill='%23FF0000' d='M66.5 7.1c-.8-3-3.2-5.4-6.2-6.2C55.7 0 34 0 34 0S12.3 0 7.7.9c-3 .8-5.4 3.2-6.2 6.2C0.7 11.7.7 24 .7 24s0 12.3.8 16.9c.8 3 3.2 5.4 6.2 6.2C12.3 48 34 48 34 48s21.7 0 26.3-.9c3-.8 5.4-3.2 6.2-6.2.8-4.6.8-16.9.8-16.9s0-12.3-.8-16.9z'/><path fill='%23FFF' d='M45 24 27 14v20'/></svg>") center/contain no-repeat;
        opacity: 0.9;
        /* transparansi ringan */
        transition: opacity .2s ease;
    }

    a:hover .yt-play-btn {
        opacity: 1;
    }

</style>
@endpush
@push('script')
<script>
    window.addEventListener('load', function() {
        const marquees = document.querySelectorAll('.logo-track-horizontal, .logo-track-horizontal-kiri');
        marquees.forEach((el) => {
            el.style.animation = 'none';
            // Paksa reflow
            el.offsetHeight;
            el.style.animation = '';
        });
    });

</script>
@endpush
<!-- End Contact-->
@endsection
