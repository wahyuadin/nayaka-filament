@foreach ($produk as $produkModal)
<div class="modal fade" id="produkModal{{ $produkModal->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-999" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        {!! $produkModal->content !!}
                        {{-- <div class="clinic-section">
                            </div> --}}
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="
                background-color: #969090;
                font-size: 1rem;
                padding: 0.3rem 0.85rem;
              " data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@endforeach
@push('styles')
<style>
    .modal-body img {
        max-width: 100%;
        height: auto;
        display: block;
    }

</style>
@endpush
