@forelse ($data as $dataItem)
<div class="col-12">
    <div class="card h-100 shadow-sm border-0">
        <div class="card-body p-3 p-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5 class="fw-bold text-dark mb-1">{{ $dataItem->title }}</h5>
                    <p class="text-muted mb-0">
                        <i class="bi bi-geo-alt-fill me-2 text-warning"></i>{{ $dataItem->location->name }}
                    </p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <p class="text-muted mb-1">
                        <i class="bi bi-person me-2 text-warning"></i>{{ $dataItem->pengalaman->name }}
                    </p>
                    <p class="text-muted mb-0">
                        <i class="bi bi-briefcase me-2 text-warning"></i>{{ $dataItem->departement->name }}
                    </p>
                </div>
                <div class="col-md-2 text-md-end">
                    <button type="button" class="btn btn-warning fw-semibold text-white px-4 py-2" data-bs-toggle="modal" data-bs-target="#carrierModal{{ $dataItem->id }}">
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@empty
<div class="col-12">
    <div class="text-center mb-4">
        <i class="bi bi-briefcase"></i>
        <br>
        Tidak ada lowongan tersedia saat ini.
    </div>
</div>
@endforelse
