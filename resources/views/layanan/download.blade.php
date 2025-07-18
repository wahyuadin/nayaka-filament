@extends('layout.app')

@section('content')
<div class="site-wrap">

    <main>
        <div class="page-title py-5 bg-light">
            <div class="container text-center">
                <h1 class="display-5 fw-bold text-dark mb-2">Formulir Nayaka Era Husada</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none"><i class="bi bi-house"></i> Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Unduh Formulir
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold text-dark">Unduh Formulir</h2>
                        <p class="text-muted mt-3">Silakan unduh formulir yang tersedia di bawah ini untuk keperluan administrasi di Nayaka Era Husada.</p>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-lg-4"> {{-- Ditambah p-lg-4 untuk padding lebih baik di layar besar --}}
                            <div class="table-responsive">
                                <table id="formulirTable" class="table table-hover table-elegant align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama Formulir</th>
                                            <th>Upload</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dataItem)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-circle-sm">
                                                        <i class="{{ $dataItem->icon }} fs-4 text-primary"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <p class="fw-bold text-dark mb-0">{{ $dataItem->nama_formulir }}</p>
                                                        {{-- Jumlah Unduhan --}}
                                                        @php
                                                        $counterPath = 'download_counts/' . $dataItem->id . '.txt';
                                                        $count = \Illuminate\Support\Facades\Storage::exists($counterPath)
                                                        ? \Illuminate\Support\Facades\Storage::get($counterPath)
                                                        : 0;
                                                        @endphp

                                                        <small class="d-block text-muted mt-1">
                                                            <i class="bi bi-cloud-arrow-down-fill me-1"></i> {{ $count }} Unduhan
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-muted">{{ $dataItem->updated_at->format('d-m-Y') }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('formulir.download', $dataItem->id) }}" target="_blank" class="btn btn-primary btn-sm fw-semibold px-3 d-inline-flex align-items-center gap-2 mb-1">
                                                    <i class="bi bi-download"></i>
                                                    <span>Unduh</span>
                                                </a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@push('style')
<style>
    /* Variabel dan gaya kustom Bootstrap */
    :root {
        --bs-primary: #f3ab01;
        --bs-primary-rgb: 243, 171, 1;
        --bs-body-bg: #f8f9fa;
        --bs-body-font-family: 'Inter', sans-serif;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.075);
    }

    .btn-primary {
        /* Gaya dasar untuk tampilan yang bersih dan modern */
        --bs-btn-color: #ffffff;
        /* Teks putih untuk kontras */
        --bs-btn-bg: var(--bs-primary);
        /* Gunakan warna brand utama untuk latar belakang */
        --bs-btn-border-color: var(--bs-primary);
        /* Border sesuai dengan latar belakang */

        /* Status hover: Latar belakang dan border sedikit lebih gelap untuk isyarat visual halus */
        --bs-btn-hover-color: #ffffff;
        --bs-btn-hover-bg: #e6a700;
        /* Emas sedikit lebih kaya, lebih gelap saat hover */
        --bs-btn-hover-border-color: #d89b00;
        /* Border gelap yang cocok */

        /* Status aktif: Bahkan lebih gelap untuk efek "tertekan" */
        --bs-btn-active-bg: #d89b00;
        --bs-btn-active-border-color: #cc9000;

        /* Status fokus: Bayangan yang lebih halus yang selaras dengan skema warna tombol */
        --bs-btn-focus-shadow-rgb: 255, 215, 0;
        /* Cahaya keemasan yang melengkapi tombol */

        /* Tipografi dan ukuran untuk tampilan yang seimbang */
        font-size: 0.9rem;
        /* Ukuran font sedikit lebih besar untuk keterbacaan yang lebih baik */
        padding: 0.5rem 1.25rem;
        /* Padding lebih besar untuk area klik yang nyaman */
        border-radius: 0.5rem;
        /* Sudut membulat yang konsisten, sedikit membulat */

        /* Transisi halus untuk efek hover dan fokus */
        transition: all 0.3s ease-in-out;
        /* Menambahkan animasi halus untuk semua perubahan */
    }

    /* Opsional: Tambahkan efek angkat halus saat hover untuk nuansa yang lebih premium */
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        /* Bayangan lembut untuk kedalaman */
    }

    /* Pastikan gaya fokus selalu terlihat untuk aksesibilitas */
    .btn-primary:focus-visible {
        outline: 2px solid rgba(var(--bs-btn-focus-shadow-rgb), 0.7);
        /* Outline yang jelas menggunakan warna bayangan fokus */
        outline-offset: 2px;
        /* Jarak antara tombol dan outline */
    }

    .breadcrumb-item a {
        color: var(--bs-primary);
    }

    .breadcrumb-item a:hover {
        color: #d99801;
    }

    .icon-circle-sm {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 45px;
        height: 45px;
        background-color: rgba(var(--bs-primary-rgb), 0.1);
        border-radius: 50%;
    }

    /* Gaya Tabel Elegan */
    .table-elegant {
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-elegant thead th {
        border-bottom-width: 1px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: .8rem;
        color: #6c757d;
        padding-bottom: 1rem;
        /* Padding ditambahkan untuk memisahkan header dari konten */
    }

    .table-elegant tbody td {
        border-top: 1px solid var(--bs-border-color-translucent);
        padding-top: 1rem;
        /* Padding ditambahkan untuk spasi vertikal */
        padding-bottom: 1rem;
        /* Padding ditambahkan untuk spasi vertikal */
    }

    .card {
        border-radius: .75rem;
    }

    /* Kustomisasi DataTables */
    .dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
    }

    .dataTables_wrapper .dataTables_paginate .page-link {
        color: var(--bs-primary);
    }

    .dataTables_wrapper .dataTables_paginate .page-link:hover {
        background-color: #fef5e6;
    }

    .form-control:focus {
        border-color: #fce1a1;
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
    }

    /* Gaya untuk teks jumlah unduhan */
    .text-muted.mt-1 {
        font-size: 0.75rem;
        /* Sedikit lebih kecil untuk informasi yang halus */
        color: #8c8c8c !important;
        /* Warna muted yang sedikit lebih gelap untuk keterbacaan */
    }

</style>
@endpush
