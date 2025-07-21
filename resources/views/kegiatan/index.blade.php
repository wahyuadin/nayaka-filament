@extends('layout.kegiatan')
@section('blog')
    <div class="col-lg-8">
        <div class="row gy-5">
            @foreach ($data as $dataItem)
                <div class="col-md-12">
                    <article class="entry">
                        <div class="entry-img">
                            <img src="{{ asset('storage/' . $dataItem->image) }}"
                                alt="Gambar artikel tentang Medical Check-Up" width="{{ $dataItem->width }}" class="img-fluid">
                        </div>
                        <div class="p-4">
                            <h2 class="entry-title">
                                <a href="{{ route('kegiatan.slug', $dataItem->slug) }}">{{ $dataItem->title }}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-inline-flex align-items-center me-3"><i
                                            class="bi bi-person-circle me-1"></i> <a
                                            href="#">{{ $dataItem->user->name }}</a></li>
                                    <li class="d-inline-flex align-items-center me-3"><i class="bi bi-clock me-1"></i> <time
                                            datetime="{{ $dataItem->date }}">{{ $dataItem->date }}</time>
                                    </li>
                                    <li class="d-inline-flex align-items-center"><i class="bi bi-folder2-open me-1"></i> <a
                                            href="{{ route('kegiatan.kategori.slug', $dataItem->kategori->slug) }}">{{ $dataItem->kategori->nama_kategori }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{{ $dataItem->description }}</p>
                                <div class="text-end">
                                    <a href="{{ route('kegiatan.slug', $dataItem->slug) }}"
                                        class="btn btn-primary btn-sm">Baca
                                        Selengkapnya &rarr;</a>
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
