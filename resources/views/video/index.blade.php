@extends('layout.video')
@section('blog')
<div class="col-lg-8">
    <div class="row gy-5">
        @foreach ($data as $dataItem)
        <div class="col-md-12">
            <article class="entry">
                <div class="entry-img">
                    <iframe src="{{ $dataItem->link_youtube }}" title="{{ $dataItem->title }}" allowfullscreen style="width:100%;height:400px;border:none;"></iframe>
                    {{-- <img src="{{ asset('storage/' . $dataItem->image) }}" alt="Gambar artikel tentang Medical Check-Up" width="{{ $dataItem->width }}" class="img-fluid"> --}}
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
