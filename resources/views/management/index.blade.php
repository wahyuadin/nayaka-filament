@extends('layout.app')
@section('content')
<div class="page-title" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <h1 class="mb-2">TIM MANAGEMENT NAYAKA</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tim Manajemen
                </li>
            </ol>
        </nav>
    </div>
</div>
<section id="team-management" class="section" data-aos="fade-up" data-aos-delay="300">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center">
                <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->title }}" class="img-fluid rounded-4 shadow-lg" style="
                    max-width: 100%;
                    height: auto;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                  " onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.3)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.2)';" />
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <h3>{{ $data->title }}</h3>
                <p class="lead">
                    {{ $data->deskripsi }}
                </p>
            </div>
        </div>
    </div>
</section>

<section id="management-details" class="py-5">
    <div class="container">
        <h3 class="text-center mb-5">Komisaris & Direksi</h3>
        <div class="row justify-content-center mb-5 g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card text-center shadow-lg border-0 rounded-4 h-100 overflow-hidden transition">
                    <div class="card-body pb-0">
                        <h5 class="card-title fw-bold">Dewan Komisaris</h5>
                    </div>
                    <img src="assets/management/dita.png" class="img-fluid mt-3" alt="Dewan Komisaris" />
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card text-center shadow-lg border-0 rounded-4 h-100 overflow-hidden transition">
                    <div class="card-body pb-0">
                        <h5 class="card-title fw-bold">Dewan Direksi</h5>
                    </div>
                    <img src="https://nayakaerahusada.com/assets/images/direksi.png" class="img-fluid mt-3" alt="Dewan Direksi" />
                </div>
            </div>
        </div>

        <h3 class="text-center mb-5">Senior Manager</h3>
        <div class="row text-center g-4">
            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden transition">
                    <div class="card-body pb-0">
                        <h6 class="card-title fw-semibold">
                            Senior Manager Operasional &amp; Hub. PKK
                        </h6>
                    </div>
                    <img src="https://new.nayakaerahusada.com/assets/images/muin.png" class="img-fluid mt-3" alt="Fathul Muin" />
                    <div class="card-body pt-2">
                        <p class="mb-0 fw-semibold">Fathul Muin</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden transition">
                    <div class="card-body pb-0">
                        <h6 class="card-title fw-semibold">
                            Senior Manager Pelayanan
                        </h6>
                    </div>
                    <img src="https://new.nayakaerahusada.com/assets/images/wildan.png" class="img-fluid mt-3" alt="Wildan Fadilah" />
                    <div class="card-body pt-2">
                        <p class="mb-0 fw-semibold">Wildan Fadilah</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden transition">
                    <div class="card-body pb-0">
                        <h6 class="card-title fw-semibold">
                            Senior Manager Keuangan
                        </h6>
                    </div>
                    <img src="https://new.nayakaerahusada.com/assets/images/deian.png" class="img-fluid mt-3" alt="Deian Kurniasari" />
                    <div class="card-body pt-2">
                        <p class="mb-0 fw-semibold">Deian Kurniasari</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card shadow-sm border-0 rounded-4 h-100 overflow-hidden transition">
                    <div class="card-body pb-0">
                        <h6 class="card-title fw-semibold">
                            Senior Manager Umum &amp; SDM
                        </h6>
                    </div>
                    <img src="https://new.nayakaerahusada.com/assets/images/dawam.png" class="img-fluid mt-3" alt="Dawam Raharjo" />
                    <div class="card-body pt-2">
                        <p class="mb-0 fw-semibold">Dawam Raharjo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('style')
<style>
    /* Custom styles for team page */
    .team-member-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        margin-bottom: 30px;
    }

    .team-member-card img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        border: 3px solid #007bff;
        /* Example border color */
    }

    .team-member-card h4 {
        color: #333;
        margin-bottom: 5px;
    }

    .team-member-card p.title {
        color: #666;
        font-style: italic;
        margin-bottom: 15px;
    }

    .team-member-card p.description {
        color: #555;
        font-size: 0.9em;
        line-height: 1.6;
    }

    .page-title {
        text-align: center;
        padding: 60px 0;
        background-color: #f8f9fa;
        margin-bottom: 40px;
    }

    .page-title h1 {
        font-size: 2.8em;
        color: #333;
        margin-bottom: 10px;
    }

    .page-title p {
        font-size: 1.1em;
        color: #666;
    }

    @media (max-width: 576px) {
        .card img {
            max-width: 70%;
            margin: 0 auto;
            display: block;
            height: auto;
            margin-top: 1rem;
        }

        .card h5,
        .card h6,
        .card p {
            font-size: 0.9rem;
        }

        .card-body {
            padding: 0.75rem;
        }

        h1 {
            font-size: 1.5rem;
            /* ukuran ini cocok untuk mobile */
            text-align: center;
        }
    }

</style>
@endpush()
@endsection
