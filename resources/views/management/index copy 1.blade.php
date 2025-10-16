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
                    max-width: 500px;
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

<section id="management-details" class="py-5" data-aos="fade-up" data-aos-delay="400">
    <div class="container">
        <h3 class="text-center mb-5">Komisaris & Direksi</h3>
        <div class="row justify-content-center mb-5 g-4">
            {!! $data->komisaris_direksi !!}
        </div>

        <h3 class="text-center mb-5">Senior Manager</h3>
        <div class="row text-center g-4">
            {!! $data->senior_manager !!}
        </div>
    </div>
</section>

@endsection
