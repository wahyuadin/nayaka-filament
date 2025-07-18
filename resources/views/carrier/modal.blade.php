@foreach ($data as $dataModal)
<!-- Modal -->

<div class="modal fade" id="carrierModal{{ $dataModal->id }}" tabindex="-1" aria-labelledby="carrierModalLabel{{ $dataModal->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carrierModalLabel{{ $dataModal->id }}">Karir | {{ $dataModal->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    {!! $dataModal->description !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="background-color: #6c757d; font-size: 0.9rem; padding: 0.6rem 0.5rem;">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@endforeach
