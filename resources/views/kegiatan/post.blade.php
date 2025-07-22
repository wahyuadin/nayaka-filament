@extends('layout.kegiatan')
@section('blog')
<div class="col-lg-8">
    <article class="entry" style="padding: 20px">
        <h2 class="entry-title">{{ $data->title ?? 'error' }}</h2>
        <div class="entry-meta">
            <ul>
                <li class="d-inline-flex align-items-center me-3"><i class="bi bi-person-circle me-1"></i> <a href="#">{{ $data->user->name ?? 'error' }}</a>
                </li>
                <li class="d-inline-flex align-items-center me-3"><i class="bi bi-clock me-1"></i> <time datetime="{{ $data->date ?? 'error' }}">{{ Carbon\Carbon::parse($data->date ?? '')->locale('id')->translatedFormat('d F Y') ?? 'error' }}</time>
                </li>
                <li class="d-inline-flex align-items-center"><i class="bi bi-folder2-open me-1"></i> <a href="{{ route('kegiatan.kategori.slug', $data->kategori->slug) }}">{{ $data->kategori->nama_kategori ?? 'error' }}</a>
                </li>
            </ul>
        </div>

        {!! $data->content ?? '<p>Error</p>' !!}

        <div class="entry-footer mt-4 pt-4 border-top">
            <div class="tags">
                <i class="bi bi-tags-fill me-1"></i>
                @forelse ($data->tags as $tagsItem)
                <a href="{{ route('kegiatan.tag.slug', $tagsItem->slug) }}">{{ $tagsItem->title }}</a>
                @empty
                Tidak ada tags
                @endforelse
            </div>
        </div>
    </article>
</div>
@endsection
