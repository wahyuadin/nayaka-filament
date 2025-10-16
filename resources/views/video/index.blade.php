@extends('layout.video')
@section('blog')
<div class="col-lg-8">
    <div class="row gy-5">
        @foreach ($data as $dataItem)
        @php
        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $dataItem->link_youtube, $matches);
        $videoId = $matches[1] ?? null;
        @endphp
        <div class="col-md-12">
            <article class="entry">
                <div class="entry-img">
                    <a href="{{ $dataItem->link_youtube }}" target="_blank" rel="noopener" class="d-block position-relative rounded-2 overflow-hidden ratio ratio-16x9 w-100">
                        <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="{{ $dataItem->title }}" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
                        <span class="yt-play-btn"></span>
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="entry-title">
                        {{-- <a href="{{ route('video.slug', $dataItem->title) }}">{{ $dataItem->title }}</a> --}}
                        <a href="#">{{ $dataItem->title }}</a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-inline-flex align-items-center me-3"><i class="bi bi-person-circle me-1"></i> <a href="#">{{ $dataItem->user->name }}</a></li>
                            <li class="d-inline-flex align-items-center me-3"><i class="bi bi-clock me-1"></i> <time datetime="{{ $dataItem->updated_at }}">{{ $dataItem->updated_at->format('d-m-Y') }}</time>
                            </li>
                            <li class="d-inline-flex align-items-center"><i class="bi bi-folder2-open me-1"></i> <a href="#">{{ $dataItem->title }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>{{ $dataItem->description }}</p>
                        <div class="text-end">
                            <a href="{{ url($dataItem->link_youtube) }}" target="_blank" class="btn btn-primary btn-sm">Lihat di Youtube &rarr;</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div>

    <div class="blog-pagination">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
