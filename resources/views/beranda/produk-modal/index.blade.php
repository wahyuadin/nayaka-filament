@foreach ($produk as $produkModal)
    <div class="modal fade" id="produkModal{{ $produkModal->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-999" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Nayaka Era Husada | {{ $produkModal->title }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="py-5 bg-light">
                        <div class="container">
                            <div class="produk-section">
                                <!-- Gambar di kiri -->
                                <div class="produk-image">
                                    <img src="{{ asset('storage/' . $produkModal->image) }}"
                                        alt="{{ $produkModal->image }}" />
                                </div>

                                <!-- Teks di kanan -->
                                <div class="produk-text">
                                    {!! $produkModal->content !!}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm"
                        style="
                background-color: #969090;
                font-size: 1rem;
                padding: 0.3rem 0.85rem;
              "
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@push('style')
    <style>
        .produk-section {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 2rem;
        }

        .produk-image {
            flex: 0 0 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .produk-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .produk-text {
            flex: 1 1 60%;
        }

        @media (max-width: 768px) {
            .produk-section {
                flex-direction: column;
            }

            .produk-image {
                max-width: 100%;
            }
        }
    </style>
@endpush
