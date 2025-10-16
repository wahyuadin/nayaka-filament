@extends('layout.video')
@section('blog')
<div class="col-lg-8">
    <h5 class="section-heading mb-4 pb-2">
        Hasil Pencarian : <b class="text-primary">{{ $search ?? 'Semua Video' }}</b>
    </h5>
    <div class="row">
        @forelse ($data as $dataItem)
        @php
        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $dataItem->link_youtube, $matches);
        $videoId = $matches[1] ?? null;
        @endphp
        <div class="col-md-6 mb-4">
            <article class="entry card border-0">
                <a href="{{ $dataItem->link_youtube }}" target="_blank" rel="noopener" class="d-block position-relative rounded-2 overflow-hidden ratio ratio-16x9 w-100">
                    <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="{{ $dataItem->title }}" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
                    <span class="yt-play-btn"></span>
                </a>

                <div class="card-body entry-body">
                    <h2 class="entry-title">
                        <a href="#">{{ $dataItem->title }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul class="d-flex align-items-center mb-2">
                            <li class="d-flex align-items-center me-3">
                                <i class="bi bi-person me-1"></i>
                                <span class="text-muted">{{ ucwords($dataItem->user->name) }}</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-calendar me-1"></i> {{ Carbon\Carbon::parse($dataItem->date)->locale('id')->translatedFormat('d F Y') }}
                            </li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p class="text-muted mb-4">
                            {{ Str::limit(strip_tags($dataItem->description), 150) }} {{-- Display a short excerpt --}}
                        </p>
                        <div class="text-center">
                            <a href="{{ $dataItem->link_youtube }}" class="read-more">Lihat di YouTube <i class="bi bi-arrow-right"></i></a>
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
