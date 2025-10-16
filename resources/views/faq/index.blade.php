@extends('layout.app')

@section('content')
<div class="site-wrap">
    <main>
        <!-- Judul Halaman -->
        <div class="page-title py-5 bg-light" data-aos="fade-up">
            <div class="container text-center">
                <h1 class="display-5 fw-bold text-dark mb-2">FAQ</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-decoration-none"><i class="bi bi-house"></i> Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            FAQ
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Bagian FAQ -->
        <section class="faq-section py-5">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-6 fw-bold text-dark mb-5">Pertanyaan yang Sering Diajukan</h2>
                        {{-- <p class="lead text-muted mb-5">Temukan jawaban cepat untuk pertanyaan umum tentang layanan kami.</p> --}}
                    </div>
                </div>

                <!-- Fitur Pencarian -->
                <div class="row justify-content-center mb-4" data-aos="fade-up" data-aos-delay="50">
                    <div class="col-lg-9">
                        <input type="text" id="faqSearchInput" class="form-control form-control-lg" placeholder="Cari pertanyaan atau jawaban...">
                    </div>
                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-9">
                        <div class="accordion" id="faqAccordion">
                            {{-- Ganti $data dengan variabel dari controller Anda --}}
                            @forelse ($data as $index => $faq)
                            <div class="accordion-item shadow-sm mb-3">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        {{ $faq->pertanyaan }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {!! $faq->jawaban !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center">
                                <p class="text-muted">Saat ini belum ada pertanyaan yang tersedia.</p>
                            </div>
                            @endforelse

                            {{-- Feedback jika hasil pencarian kosong --}}
                            <div id="faqSearchFeedback" class="text-center text-muted mt-4" style="display: none;">
                                <p><i class="bi bi-search"></i> Tidak ditemukan hasil yang cocok.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection

@push('styles')
<style>
    /* Accordion Custom Styles */
    .accordion {
        --bs-accordion-active-color: #ffffff;
        --bs-accordion-active-bg: #f3ab01;
        --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(243, 171, 1, 0.25);
    }

    .accordion-button {
        font-weight: 600;
    }

    .accordion-item {
        border: 1px solid #dee2e6;
        border-radius: .5rem;
        overflow: hidden;
    }

    .accordion-body {
        background-color: #f8f9fa;
    }

</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('faqSearchInput');
        const accordionItems = document.querySelectorAll('#faqAccordion .accordion-item');
        const searchFeedback = document.getElementById('faqSearchFeedback'); // Get the feedback element

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            let visibleItemsCount = 0; // Initialize a counter for visible items

            accordionItems.forEach(item => {
                const question = item.querySelector('.accordion-button').textContent.toLowerCase();
                const answer = item.querySelector('.accordion-body').textContent.toLowerCase();

                if (question.includes(filter) || answer.includes(filter)) {
                    item.style.display = ''; // Show the item
                    visibleItemsCount++; // Increment count if item is visible
                } else {
                    item.style.display = 'none'; // Hide the item
                }
            });

            // Show or hide the "No results found" message
            if (visibleItemsCount === 0 && filter.length > 0) { // Only show if no items and search input is not empty
                searchFeedback.style.display = 'block';
            } else {
                searchFeedback.style.display = 'none';
            }
        });
    });

</script>
@endpush
