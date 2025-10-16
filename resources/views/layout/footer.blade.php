<footer class="footer pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-between mb-5 g-xl-5">
            <div class="col-md-4 mb-5 mb-lg-0">
                <div class="">
                    <img class="" src="{{ asset('assets/footer_putih.png') }}" width="230" alt="" />
                </div>
                <p class="mb-4 mt-3" style="text-align: justify">
                    <b>PT. Nayaka Era Husada</b> adalah anak perusahaan dari DPK
                    BPJS Ketenagakerjaan yang bergerak di bidang Pelayanan
                    Kesehatan, Clinic, TPA/ASO, Managed Care dan MCU yang melayani
                    peserta Program JPK dan Masyarakat Umum.
                </p>
            </div>
            <div class="col-md-7">
                <div class="row g-2">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <h3 class="mb-3" style="font-weight: bold; font-size: 19px;">Tautan Cepat</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/#home') }}">Utama</a></li>
                            @php
                            use App\Models\Faq;
                            $faqData = Faq::showData();
                            @endphp

                            @if(!empty($faqData) && $faqData->count())
                            <li>
                                <a href="{{ url('/#faqu') }}">F.A.Q</a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ url('/#contact') }}">Kontak Kami</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-lg-4 mb-4 mb-lg-0">
                        <h2 class="mb-3" style="font-weight: bold; font-size: 19px;">Layanan Kami</h2>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('layanan.klinik') }}">Klinik Nayaka</a>
                            </li>
                            <li>
                                <a href="{{ route('layanan.provider') }}">Provider Nayaka</a>
                            </li>
                            <li>
                                <a href="{{ route('layanan.inhouse') }}">Klinik Kerjasama Perusahaan</a>
                            </li>
                            <li>
                                <a href="{{ route('layanan.download') }}">Download Formulir</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-4 mb-4 mb-lg-0 quick-contact">
                        <h3 class="mb-3" style="font-weight: bold; font-size: 19px;">Kontak</h3>
                        <p class="d-flex mb-3">
                            <i class="bi bi-geo-alt-fill me-3" style="color: white"></i><span>Gedung DPK BPJS Ketenagakerjaan. Jl. Tangkas Baru No.1,
                                <br />
                                Selatan 12930</span>
                        </p>
                        <a class="d-flex mb-3" href="mailto:pusat@nayakaerahusada.com"><i class="bi bi-envelope-fill me-3" style="color: white"></i><span>pusat@nayakaerahusada.com</span></a><a class="d-flex mb-3" href="tel://+62215260518"><i class="bi bi-telephone-fill me-3" style="color: white"></i><span>021-5260518</span></a>
                        <p class="d-flex mb-3">
                            <i class="bi bi-clock me-3" style="color: white"></i><span>Mon-Fri: 08.00 am - 05.00 pm</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center credits pt-3" style="color: white">
            <div class="row align-items-center credits pt-3" style="color: white">
                <div class="col-12 col-xl-8 text-center text-xl-start mb-3 mb-xl-0">
                    &copy; 2025 PT. Nayaka Era Husada
                </div>
                <div class="col-12 col-xl-4 text-center text-xl-end">
                    <img src="{{ asset('assets/images/ukas.png') }}" alt="UKAS" class="img-fluid" style="max-height: 100px; filter: brightness(0) invert(1)" />
                </div>
            </div>
        </div>
    </div>
</footer>
