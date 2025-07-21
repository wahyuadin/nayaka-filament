@extends('layout.kegiatan')
@section('blog')
    <div class="col-lg-8">
        <article class="entry" style="padding: 20px">
            <h2 class="entry-title">{{ $data->title }}</h2>

            <div class="entry-meta">
                <ul>
                    <li class="d-inline-flex align-items-center me-3"><i class="bi bi-person-circle me-1"></i> <a
                            href="#">{{ $data->user->name }}</a>
                    </li>
                    <li class="d-inline-flex align-items-center me-3"><i class="bi bi-clock me-1"></i> <time
                            datetime="{{ $data->date }}">{{ Carbon\Carbon::parse($data->date)->locale('id')->translatedFormat('d F Y') }}</time>
                    </li>
                    <li class="d-inline-flex align-items-center"><i class="bi bi-folder2-open me-1"></i> <a
                            href="#">{{ $data->kategori->nama_kategori }}</a>
                    </li>
                </ul>
            </div>

            {!! $data->content !!}

            <div class="entry-footer mt-4 pt-4 border-top">
                <div class="tags">
                    <i class="bi bi-tags-fill me-1"></i>
                    @foreach ($data->tags as $tagsItem)
                        <a href="#">{{ $tagsItem->title }}</a>
                    @endforeach
                </div>
            </div>
        </article>
    </div>
@endsection
