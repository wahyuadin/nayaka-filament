@extends('layout.kegiatan')
@section('blog')
<div class="col-lg-8">
    <h5 class="section-heading mb-4 pb-2">
        Hasil Pencarian : <b class="text-primary">{{ $search ?? 'Semua Postingan' }}</b>
    </h5>
    <div class="row">
        @forelse ($data as $dataItem)
        <div class="col-md-6 mb-4">
            <article class="entry card border-0">
                <div class="entry-img">
                    <img src="{{ asset('storage/' . $dataItem->image) }}" alt="{{ $dataItem->title }}" class="img-fluid">
                </div>

                <div class="card-body entry-body">
                    <h2 class="entry-title">
                        <a href="{{ route('kegiatan.slug', $dataItem->slug) }}">{{ $dataItem->title }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul class="d-flex align-items-center mb-2">
                            <li class="d-flex align-items-center me-3">
                                <i class="bi bi-person me-1"></i>
                                <span class="text-muted">{{ ucwords($dataItem->user->name) }}</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-folder me-1"></i>
                                <a href="{{ route('kegiatan.kategori.slug', $dataItem->kategori->slug) }}" class="text-muted text-decoration-none">{{ ucwords($dataItem->kategori->nama_kategori) }}</a>
                            </li>
                        </ul>
                        <time datetime="#" class="text-muted small d-block mb-3">
                            <i class="bi bi-calendar me-1"></i> {{ Carbon\Carbon::parse($dataItem->date)->locale('id')->translatedFormat('d F Y') }}
                        </time>
                    </div>

                    <div class="entry-content">
                        <p class="text-muted mb-4">
                            {{ Str::limit(strip_tags($dataItem->description), 150) }} {{-- Display a short excerpt --}}
                        </p>
                        <div class="text-center">
                            <a href="{{ route('kegiatan.slug' , $dataItem->slug) }}" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center"><i class="bi bi-exclamation-triangle me-2"></i>Tidak ada data yang ditemukan.</p>
        </div>
        @endforelse
    </div>
</div>
@push('style')
<style>
    /* Styling for the category specific heading */
    .section-heading {
        font-size: 1.75rem;
        /* Slightly larger for prominence */
        font-weight: 600;
        color: #343a40;
        border-bottom: 2px solid #eee;
        /* Subtle underline */
        padding-bottom: 10px;
        margin-top: 1rem;
        /* Spacing from the breadcrumbs */
    }

    .section-heading b {
        color: #0172b6;
        /* Highlight the category name with primary color */
    }

</style>
@endpush
@endsection
