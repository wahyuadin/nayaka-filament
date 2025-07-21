@extends('layout.app')
@section('content')
    <div class="site-wrap">
        <div class="page-title" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <h1 class="mb-2">KEGIATAN</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('kegiatan.index') }}"> Kegiatan</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <section id="blog" class="blog py-5">
            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <div class="row g-5">
                    @yield('blog')
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-item card shadow-sm mb-4">
                                <div class="card-body">
                                    <h3 class="sidebar-title">Cari Kegiatan</h3>
                                    <form action="" class="mt-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ketik di sini..."
                                                disabled>
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-item card shadow-sm mb-4">
                                <div class="card-body">
                                    <h3 class="sidebar-title">Kategori</h3>
                                    <div class="mt-3">
                                        <ul class="list-group list-group-flush">
                                            @php
                                                $kategoris = App\Models\Kategori::withCount('kegiatans')->get();
                                                $kegiatan = \App\Models\Kegiatan::showData();
                                                $tag = App\Models\Tag::showData();
                                            @endphp

                                            @foreach ($kategoris as $kategori)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                                    {{-- <a href="{{ route('kegiatan.kategori.slug', $kategori->slug) }}">
                                                        {{ $kategori->nama_kategori }}
                                                    </a> --}}
                                                    <a href="#">
                                                        {{ $kategori->nama_kategori }}
                                                    </a>
                                                    <span>({{ $kategori->kegiatans_count }})</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-item card shadow-sm mb-4">
                                <div class="card-body">
                                    <h3 class="sidebar-title">Kegiatan Terbaru</h3>
                                    <div class="mt-3">
                                        @foreach ($kegiatan as $kegiatanTerbaru)
                                            <div class="post-item mt-3 d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $kegiatanTerbaru->image) }}"
                                                    alt="Gambar recent post 1" class="img-fluid flex-shrink-0"
                                                    style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                <div class="ms-3">
                                                    <h6><a
                                                            href="{{ route('kegiatan.slug', $kegiatanTerbaru->slug) }}">{{ $kegiatanTerbaru->title }}</a>
                                                    </h6>
                                                    <time
                                                        datetime="{{ $kegiatanTerbaru->date }}">{{ Carbon\Carbon::parse($kegiatanTerbaru->date)->locale('id')->translatedFormat('d F Y') }}</time>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-item card shadow-sm">
                                <div class="card-body">
                                    <h3 class="sidebar-title">Tags</h3>
                                    <div class="mt-3">
                                        @foreach ($kegiatan as $item)
                                            @foreach ($item->tags as $tag)
                                                <a href="#" class="btn btn-outline-secondary btn-sm m-1">
                                                    {{ $tag->title }}
                                                </a>
                                            @endforeach
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('style')
        <style>
            .blog .entry {
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
                transition: 0.3s;
                border-radius: 10px;
                overflow: hidden;
            }

            .blog .entry:hover {
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            }

            .blog .entry .entry-title {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .blog .entry .entry-title a {
                color: #333;
                transition: 0.3s;
                text-decoration: none;
            }

            .blog .entry .entry-title a:hover {
                color: #0172b6;
            }

            .blog .entry .entry-meta {
                margin-bottom: 1rem;
                color: #6c757d;
                font-size: 0.9rem;
            }

            .blog .entry .entry-meta ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .blog .entry .entry-meta i {
                color: #0172b6;
            }

            .blog .entry .entry-meta a {
                color: #6c757d;
                transition: 0.3s;
                text-decoration: none;
            }

            .blog .entry .entry-meta a:hover {
                color: #0172b6;
            }

            .blog .sidebar-title {
                font-size: 1.25rem;
                font-weight: 700;
                color: #333;
                border-bottom: 2px solid #eee;
                padding-bottom: 10px;
                margin-bottom: 1rem;
            }

            .blog .sidebar .categories ul a,
            .blog .sidebar .recent-posts h4 a {
                color: #333;
                transition: 0.3s;
                text-decoration: none;
            }

            .blog .sidebar .categories ul a:hover,
            .blog .sidebar .recent-posts h4 a:hover {
                color: #0172b6;
            }

            .blog .sidebar .recent-posts .post-item h4 {
                font-size: 1rem;
                font-weight: 600;
                margin-bottom: 5px;
            }

            .blog .sidebar .recent-posts .post-item time {
                font-size: 0.8rem;
                color: #6c757d;
            }

            .blog-pagination {
                margin-top: 30px;
            }

            .blog-pagination ul {
                display: flex;
                padding: 0;
                margin: 0;
                list-style: none;
                justify-content: center;
            }

            .blog-pagination li {
                margin: 0 5px;
            }

            .blog-pagination li a {
                color: #333;
                padding: 8px 16px;
                border: 1px solid #ddd;
                transition: 0.3s;
                text-decoration: none;
                border-radius: 5px;
            }

            .blog-pagination li.active a,
            .blog-pagination li a:hover {
                background: #0172b6;
                color: #fff;
                border-color: #0172b6;
            }
        </style>
    @endpush
@endsection
