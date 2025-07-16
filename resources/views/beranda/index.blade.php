@extends('layout.app')

@section('content')
<div class="section" id="home">
    <div id="carouselExampleFade" class="carousel slide carousel-fade custom-carousel hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slide as $slideItem)
            <div class="carousel-item {{ $slideItem->first_slide == 1 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $slideItem->image) }}" class="d-block w-100" alt="{{ $slideItem->nama }}" />
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
<p class="fw-semibold text-center">Lead Management</p>
<div class="d-flex flex-wrap justify-content-center align-items-center gap-4" style="margin-bottom: 30px">
    @foreach ($lead_management as $lead)
    <img src="{{ asset('storage/' . $lead->image) }}" height="50" alt="{{ $lead->image }}" />
    @endforeach
</div>
<section class="testimonial-section" style="background-color: #f7faff" data-aos="fade-right" data-aos-delay="200">
    <div class="container text-center">
        <!-- Rating & Logos -->
        <!-- partner -->
        <section class="py-5">
            <div class="container text-center">
                <h1 class="mb-4" style="
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode',
                      'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                  ">
                    <b>Partner Kami</b>
                </h1>
                <div class="logo-marquee-horizontal">
                    <div class="logo-track-horizontal">
                        <!-- Logo baris pertama -->
                        <div class="logo-group-horizontal">
                            @foreach ($partner_kami as $pk)
                            <img src="{{ asset('storage/' . $pk->image) }}" alt="{{ $pk->image }}" />
                            @endforeach
                        </div>
                        <!-- Logo baris kedua (copy) -->
                        <div class="logo-group-horizontal">
                            @foreach ($partner_kami as $pk)
                            <img src="{{ asset('storage/' . $pk->image) }}" alt="{{ $pk->image }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- partner -->
        <section class="py-5">
            <div class="container text-center">
                <h1 class="mb-4" style="
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode',
                      'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                  ">
                    <b>Provider Kami</b>
                </h1>
                <div class="logo-marquee-horizontal-kiri">
                    <div class="logo-track-horizontal-kiri">
                        <!-- Logo baris pertama -->
                        <div class="logo-group-horizontal-kiri">
                            @foreach ($provider_kami as $provider)
                            <img src="{{ asset('storage/' . $provider->image) }}" alt="{{ $provider->image }}" />
                            @endforeach
                        </div>
                        <!-- Logo baris kedua (copy) -->
                        <div class="logo-group-horizontal-kiri">
                            @foreach ($provider_kami as $provider)
                            <img src="{{ asset('storage/' . $provider->image) }}" alt="{{ $provider->image }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <a href="https://new.nayakaerahusada.com/layanan/provider" target="_blank" class="btn btn-primary rounded-border-3 btn-sm mt-5">
                    <i class="fa-regular fa-eye"></i> Daftar Provider
                </a>
            </div>
        </section>
        <!-- End Partner -->

        <div class="mb-5">
            <div class="mb-2 text-warning fs-5">
                <!-- <img
                  src="assets/logo_nayaka2.png"
                  alt=""
                  width="80"
                  class="me-2"
                /> -->
            </div>
            <!-- <h4 class="fw-semibold">PT NAYAKA ERA HUSADA</h4> -->
        </div>
    </div>
</section>
<!-- ======= About =======-->
<section class="about__v4 section-padding-top" id="about">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6 order-1 order-md-2">
                <div class="img-wrap position-relative">
                    <img class="img-fluid rounded-4" src="assets/tentang_nakaya.png" alt="" data-aos="fade-up" data-aos-delay="300" />
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
                                        <img src="{{ asset('storage/' . ($why_us->image ?? 'default.png')) }}" style="border-radius: 5%" class="img-fluid mb-4" />
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
                        <img src="{{ asset('storage/' . ($produkItem->image ?? 'default.png')) }}" width="{{ $produkItem->width_image ?? '' }}" height="{{ $produkItem->height_image ?? '' }}" alt="{{ $produkItem->title }}" class="img-fluid rounded" />
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
<section class="section services__v3 bg-light py-5" id="services" data-aos="fade-right" data-aos-delay="1100">
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
                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="https://nayakaerahusada.com/assets/media/images/kegiatan/website_20_05_2025.jpg" alt="Digital Payments Icon" class="card-img-top fade-hover rounded-2" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                Selamat Bertugas Bpk Anggoro Eko Cahyo
                                            </h3>
                                            <p>
                                                Kami segenap keluarga besar PT. Nayaka Era
                                                Husada mengucapkan Selamat Bertugas kepada Bpk
                                                Anggoro Eko Cahyo sebagai Direktur Utama PT Bank
                                                Syariah Indonesia Tbk.
                                            </p>
                                            <a href="#" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="assets/postingan/1.png" alt="" class="card-img-top fade-hover rounded-2" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                Penandatanganan Kerjasama PT NAYAKA ERA HUSADA
                                                BRANCH OFFICE SEMARANG dengan PT HANSOLL INDO
                                                JAVA
                                            </h3>
                                            <p>
                                                Kami dengan bangga mengumumkan kerja sama antara
                                                PT Nayaka Era Husada Branch Office Semarang
                                                dengan PT Hansoll Indo Java.
                                            </p>
                                            <a href="#" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="assets/postingan.png" class="card-img-top fade-hover rounded-2" alt="" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                Perubahan Jadwal Pelayanan Pemeriksaan Kesehatan
                                                Di UPT PPP Mayangan
                                            </h3>
                                            <p>
                                                Pemberihatuan Perubahan jadwal jam operasional
                                                pada UPT PPP Mayangan.
                                            </p>
                                            <a href="#" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 (copy if needed) -->
                        <div class="swiper-slide">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="https://nayakaerahusada.com/assets/media/images/kegiatan/website_20_05_2025.jpg" alt="Digital Payments Icon" class="card-img-top fade-hover rounded-2" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                Selamat Bertugas Bpk Anggoro Eko Cahyo
                                            </h3>

                                            <p>
                                                Kami segenap keluarga besar PT. Nayaka Era
                                                Husada mengucapkan Selamat Bertugas kepada Bpk
                                                Anggoro Eko Cahyo sebagai Direktur Utama PT Bank
                                                Syariah Indonesia Tbk.
                                            </p>
                                            <a href="#" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="https://nayakaerahusada.com/assets/media/images/kegiatan/template_posting_ig_(mohon_diduplicate_saat_mengerjakan)_(1).png" alt="" class="card-img-top fade-hover rounded-2" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                Penandatanganan Kerjasama PT NAYAKA ERA HUSADA
                                                BRANCH OFFICE SEMARANG dengan PT HANSOLL INDO
                                                JAVA
                                            </h3>
                                            <p>
                                                Kami dengan bangga mengumumkan kerja sama antara
                                                PT Nayaka Era Husada Branch Office Semarang
                                                dengan PT Hansoll Indo Java.
                                            </p>
                                            <a href="#" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="service-card rounded-4 h-100 shadow-sm bg-white">
                                        <img src="assets/postingan.png" class="card-img-top fade-hover rounded-2" alt="" />
                                        <div class="p-4">
                                            <h3 class="fs-5 mb-3">
                                                Perubahan Jadwal Pelayanan Pemeriksaan Kesehatan
                                                Di UPT PPP Mayangan
                                            </h3>
                                            <p>
                                                Pemberihatuan Perubahan jadwal jam operasional
                                                pada UPT PPP Mayangan.
                                            </p>
                                            <a href="#" class="special-link d-inline-flex align-items-center text-decoration-none">
                                                <i class="bi bi-arrow-right-short me-1"></i>Read
                                                more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Dots -->
                    <div class="swiper-pagination mt-4" style="z-index: 2; position: relative; color: #f3ab01"></div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="postingan.html" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                            <i class="bi bi-eye"></i>
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card rounded-4 h-100 shadow-sm bg-white d-flex flex-column align-items-center">
                            <div class="ratio ratio-16x9 rounded-2 w-100">
                                <iframe src="https://www.youtube.com/embed/LMpNtg4_9gU?si=tl-A6j2hMhFgFuEU" title="YouTube video player" allowfullscreen></iframe>
                            </div>
                            <div class="p-4 w-100">
                                <h3 class="fs-5 mb-3">Nayaka Husada - JKN Mobile</h3>
                                <p>
                                    Sudah saatnya Anda dan keluarga merasakan pelayanan
                                    kesehatan yang lebih baik! Kami memahami pindah faskes
                                    kadang terasa rumit, karena itu kami siapkan tutorial
                                    praktis untuk membantu Anda pindah ke Klinik Nayaka
                                    Husada.
                                </p>
                                <a href="https://www.youtube.com/watch?v=0Pz5QFOrKlk" target="_blank" class="special-link d-inline-flex align-items-center text-decoration-none">
                                    <i class="bi bi-arrow-right-short me-1"></i>Lihat di
                                    YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card rounded-4 h-100 shadow-sm bg-white d-flex flex-column align-items-center">
                            <div class="ratio ratio-16x9 rounded-2 w-100">
                                <iframe src="https://www.youtube.com/embed/LT6UruDgoEY?si=Jn54IxlEMtFA6pQW" title="Kegiatan Nayaka" allowfullscreen></iframe>
                            </div>
                            <div class="p-4 w-100">
                                <h3 class="fs-5 mb-3">
                                    Testimoni | PT GELORA DJAJA (WISMILAK)
                                </h3>
                                <p>
                                    Testimoni dari PT Gelora Djaja (WISMILAK) mengenai
                                    pengalaman positif bekerja sama dengan Nayaka Era
                                    Husada dalam penyelenggaraan layanan kesehatan
                                    karyawan, mulai dari proses administrasi hingga
                                    pelaksanaan Medical Check Up (MCU) yang profesional
                                    dan responsif.
                                </p>
                                <a href="https://www.youtube.com/watch?v=4Q1F1kK5QvI" target="_blank" class="special-link d-inline-flex align-items-center text-decoration-none">
                                    <i class="bi bi-arrow-right-short me-1"></i>Lihat di
                                    YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card rounded-4 h-100 shadow-sm bg-white d-flex flex-column align-items-center">
                            <div class="ratio ratio-16x9 rounded-2 w-100">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/q_fuJkUG4I4?si=5oZXYWmzVsOgk4Qx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="p-4 w-100">
                                <h3 class="fs-5 mb-3">
                                    Testimoni drg Iing Ichsan Hanafi, MARS, MH RS Hermina
                                </h3>
                                <p>
                                    Simak testimoni dari drk Ling Ichsan Hanafi, MARS, MH
                                    selaku kepala rumah sakit Hermina.
                                </p>
                                <a href="https://www.youtube.com/embed/q_fuJkUG4I4" target="_blank" class="special-link d-inline-flex align-items-center text-decoration-none">
                                    <i class="bi bi-arrow-right-short me-1"></i>Lihat di
                                    YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="video.html" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                        <i class="bi bi-eye"></i>
                        Lihat Semua
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services-->

<!-- ======= Testimonials =======-->
<section class="section testimonials__v2" id="testimonials">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <!-- <span
                  class="subtitle text-uppercase mb-3"
                  data-aos="fade-up"
                  data-aos-delay="0"
                  >Testimonials</span
                > -->
                <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">
                    Testimoni
                </h2>

                <!-- <a href="" data-aos="fade-up" data-aos-delay="200">
                  -> Apa kata mereka tentang PT Nayaka Era Husada
                </a> -->
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
                            <strong class="d-block"> {{ $testimoniItem->nama }} </strong><span>{{ $testimoniItem->sub_nama }}</span>
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
<section class="section faq__v2" id="faqu" data-aos="fade-right" data-aos-delay="30">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6 col-lg-7 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">F.A.Q</span>
                <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <!-- <p data-aos="fade-up" data-aos-delay="100">
                  Manfaatkan perangkat kami untuk mengembangkan konsep dan
                  mewujudkan visi Anda. Setelah selesai, bagikan kreasi Anda
                  dengan mudah.
                </p> -->
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

                </div>
            </div>
        </div>
    </div>
    <!-- End FAQ-->
</section>
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
        <div class="row">
            <style>
                /* Tambahkan CSS ini ke file CSS Anda atau di dalam tag <style> */
                .contact-item {
                    padding: 20px;
                    background-color: #f8f9fa;
                    /* Warna latar belakang ringan */
                    border-radius: 12px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
                    transition: all 0.3s ease;
                    text-decoration: none;
                    /* Hilangkan underline pada link */
                    color: inherit;
                    /* Warisi warna teks */
                    display: flex;
                    /* Pastikan flexbox untuk item di dalamnya */
                    align-items: center;
                    /* Sejajarkan item secara vertikal */
                }

                .contact-item:hover {
                    transform: translateY(-5px);
                    /* Efek naik sedikit saat dihover */
                    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
                    /* Bayangan lebih gelap saat dihover */
                    background-color: #e9ecef;
                    /* Warna latar belakang sedikit lebih gelap saat dihover */
                }

                .contact-item .icon {
                    font-size: 2.2rem;
                    /* Ukuran ikon lebih besar */
                    color: #007bff;
                    /* Warna ikon yang menonjol (biru Bootstrap) */
                    margin-right: 15px;
                    /* Jarak antara ikon dan teks */
                    line-height: 1;
                    /* Pastikan ikon tidak memengaruhi tinggi baris */
                }

                .contact-item span strong {
                    display: block;
                    /* Pastikan nomor/email di baris baru */
                    font-size: 1.15rem;
                    /* Ukuran teks lebih besar untuk informasi penting */
                    margin-top: 5px;
                    /* Jarak antara label dan informasi */
                }

                .contact-item address {
                    margin-bottom: 0;
                    /* Hapus margin bawah default address */
                    font-size: 1.15rem;
                    line-height: 1.5;
                }

                .contact-item .label {
                    font-size: 0.9rem;
                    /* Ukuran teks label lebih kecil */
                    color: #6c757d;
                    /* Warna teks label abu-abu */
                    text-transform: uppercase;
                    /* Membuat label uppercase */
                    letter-spacing: 0.5px;
                    /* Sedikit spasi huruf untuk label */
                }

                /* Penyesuaian untuk tampilan mobile */
                @media (max-width: 767.98px) {
                    .contact-item {
                        flex-direction: column;
                        /* Tumpuk ikon dan teks di mobile */
                        text-align: center;
                        padding: 15px;
                    }

                    .contact-item .icon {
                        margin-right: 0;
                        /* Hapus margin kanan ikon */
                        margin-bottom: 10px;
                        /* Tambah margin bawah ikon */
                    }
                }

            </style>

            <div class="col-md-12">
                <div class="row justify-content-center g-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                        <a href="tel:+62215260518" class="contact-item d-block">
                            <div class="icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <span class="d-block label">Hubungi Kami</span>
                                <strong>021-5260518</strong>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="mailto:pusat@nayakaerahusada.com" class="contact-item d-block">
                            <div class="icon">
                                <i class="bi bi-send"></i>
                            </div>
                            <div>
                                <span class="d-block label">Kirim Email</span>
                                <strong>pusat@nayakaerahusada.com</strong>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-item">
                            <div class="icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <span class="d-block label">Kantor Pusat</span>
                                <address class="fw-bold">
                                    Gedung DPK BPJS KETENAGAKERJAAN <br />
                                    Lt. 2 Jl. Tangkas Baru No.1 Jakarta Selatan 12930
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="d-flex gap-5 flex-column">
                  <div
                    class="d-flex align-items-start gap-3"
                    data-aos="fade-up"
                    data-aos-delay="0"
                  >
                    <div class="icon d-block">
                      <i class="bi bi-telephone"></i>
                    </div>
                    <span>
                      <span class="d-block">TELEPON SEKARANG</span
                      ><strong>021-5260518</strong></span
                    >
                  </div>
                  <div
                    class="d-flex align-items-start gap-3"
                    data-aos="fade-up"
                    data-aos-delay="100"
                  >
                    <div class="icon d-block"><i class="bi bi-send"></i></div>
                    <span>
                      <span class="d-block">EMAIL KAMI KAPAN SAJA</span
                      ><strong>pusat@nayakaerahusada.com </strong></span
                    >
                  </div>
                  <div
                    class="d-flex align-items-start gap-3"
                    data-aos="fade-up"
                    data-aos-delay="200"
                  >
                    <div class="icon d-block">
                      <i class="bi bi-geo-alt"></i>
                    </div>
                    <span>
                      <span class="d-block">KANTOR PUSAT</span>
                      <address class="fw-bold">
                        Gedung DPK BPJS KETENAGAKERJAAN <br />
                        Lt. 2 Jl. Tangkas Baru No.1 Jakarta Selatan 12930
                      </address></span
                    >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div
                  class="form-wrapper"
                  data-aos="fade-up"
                  data-aos-delay="300"
                >
                  <form id="contactForm">
                    <div class="row gap-3 mb-3">
                      <div class="col-md-12">
                        <label class="mb-2" for="name">Nama</label>
                        <input
                          class="form-control"
                          id="name"
                          type="text"
                          name="name"
                          required
                          placeholder="Masukkan Nama Lengkap"
                        />
                      </div>
                      <div class="col-md-12">
                        <label class="mb-2" for="email">Alamat Email</label>
                        <input
                          class="form-control"
                          id="email"
                          type="email"
                          name="email"
                          required
                          placeholder="Masukkan Alamat Email"
                        />
                      </div>
                    </div>
                    <div class="row gap-3 mb-3">
                      <div class="col-md-12">
                        <label class="mb-2" for="subject">Subjek</label>
                        <input
                          class="form-control"
                          id="subject"
                          type="text"
                          name="subject"
                          placeholder="Masukkan Subjek"
                        />
                      </div>
                    </div>
                    <div class="row gap-3 gap-md-0 mb-3">
                      <div class="col-md-12">
                        <label class="mb-2" for="message">Pesan</label>
                        <textarea
                          class="form-control"
                          id="message"
                          name="message"
                          rows="5"
                          placeholder="Masukkan Pesan"
                          required=""
                        ></textarea>
                      </div>
                    </div>
                    <button class="btn btn-primary fw-semibold" type="submit">
                      <i class="bi bi-send me-1"></i> Kirim Pesan
                    </button>
                  </form>
                  <div
                    class="mt-3 d-none alert alert-success"
                    id="successMessage"
                  >
                    Message sent successfully!
                  </div>
                  <div class="mt-3 d-none alert alert-danger" id="errorMessage">
                    Message sending failed. Please try again later.
                  </div>
                </div>
              </div> -->
        </div>
    </div>
</section>
@include('beranda.produk-modal.index')
@include('beranda.about-us.index')
<!-- End Contact-->
@endsection
