@extends('layout.app')

@section('content')
<div class="site-wrap">
    <main>
        <!-- Bagian Judul Halaman -->
        <div class="page-title py-5 bg-light" data-aos="fade-up" data-aos-delay="100">
            <div class="container text-center">
                <h1 class="display-5 fw-bold text-dark mb-2">Karir di Nayaka Era Husada</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none"><i class="bi bi-house"></i> Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Karir
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Bagian Daftar Lowongan Kerja -->
        <section class="py-5 px-3 px-md-5">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Filter Bar -->
                <div class="d-flex justify-content-center mb-4">
                    <h5 class="fw-semibold text-dark">Lowongan Terbaru</h5>
                </div>
                <div class="card shadow-sm border-0 mb-5 p-3 p-md-4">
                    <div class="row g-3 align-items-end">
                        <!-- Lokasi -->
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group border rounded bg-white">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-geo-alt text-muted"></i>
                                </span>
                                <select id="filter-location" class="form-select border-start-0">
                                    <option value="">Penempatan</option>
                                    @foreach ($location as $loc)
                                    <option value="{{ $loc->id }}" {{ request('location_id') == $loc->id ? 'selected' : '' }}>
                                        {{ $loc->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Departemen -->
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group border rounded bg-white">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-person-badge text-muted"></i>
                                </span>
                                <select id="filter-departement" class="form-select border-start-0">
                                    <option value="">Semua Departemen</option>
                                    @foreach ($departemen as $dept)
                                    <option value="{{ $dept->id }}" {{ request('departement_id') == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Pengalaman -->
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group border rounded bg-white">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-briefcase text-muted"></i>
                                </span>
                                <select id="filter-pengalaman" class="form-select border-start-0">
                                    <option value="">Semua Pengalaman</option>
                                    @foreach ($pengalaman as $exp)
                                    <option value="{{ $exp->id }}" {{ request('pengalaman_id') == $exp->id ? 'selected' : '' }}>
                                        {{ $exp->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Cari -->
                        <div class="col-lg-3 col-md-6">
                            <div class="d-grid">
                                <button class="btn btn-primary" id="btn-filter" type="button" style="font-size: 0.875rem; padding: 0.6rem 0.5rem;">
                                    <i class="bi bi-search me-1"></i> Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="loading-spinner" class="text-center my-5 d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <!-- Job Listings -->
                <div class="row g-4" id="job-list">
                    @include('carrier.filter', ['data' => $data])
                </div>

            </div>
        </section>
    </main>
</div>

@include('carrier.modal')
@endsection

@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    @media (max-width: 767.98px) {
        .job-details {
            width: 100%;
        }

        .job-listing-card .btn {
            width: 100%;
            text-align: center;
        }

        .input-group .form-control,
        .input-group .form-select {
            font-size: 0.875rem;
        }
    }

    .select2-container .select2-selection--single {
        height: 100%;
        padding: 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
    }

</style>
@endpush
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnFilter = document.getElementById('btn-filter');
        const locationSelect = document.getElementById('filter-location');
        const departementSelect = document.getElementById('filter-departement');
        const pengalamanSelect = document.getElementById('filter-pengalaman');
        const jobList = document.getElementById('job-list');
        const loadingSpinner = document.getElementById('loading-spinner');

        btnFilter.addEventListener('click', function() {
            const params = new URLSearchParams();

            if (locationSelect.value) {
                params.append('location_id', locationSelect.value);
            }
            if (departementSelect.value) {
                params.append('departement_id', departementSelect.value);
            }
            if (pengalamanSelect.value) {
                params.append('pengalaman_id', pengalamanSelect.value);
            }

            // Tampilkan loading
            loadingSpinner.classList.remove('d-none');
            jobList.innerHTML = '';

            fetch(`{{ route('carrier.filter') }}?${params.toString()}`)
                .then(response => response.json())
                .then(result => {
                    jobList.innerHTML = result.data;
                })
                .catch(err => {
                    console.error("Filter error:", err);
                    alert("Gagal memuat data.");
                })
                .finally(() => {
                    loadingSpinner.classList.add('d-none');
                });
        });
    });

</script>
@endpush
