@extends('layout.app')

@section('content')
<div class="site-wrap">

    <main>
        <div class="page-title" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <h1 class="mb-2">Klinik Kerjasama Perusahaan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Klinik Kerjasama Perusahaan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="py-5 px-3 py-md-5 px-md-5">
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="p-1 mb-0 text-white">
                            <i class="bi bi-hospital me-2"></i> Daftar Inhouse Mitra Nayaka
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inhouseTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Faskes</th>
                                        <th>Nama Klinik</th>
                                        <th>Kota</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Fasilitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#inhouseTable').DataTable({
            processing: true
            , serverSide: true
            , language: {
                processing: "Please wait..."
            }
            , ajax: "{{ route('inhouse.serversite') }}"
            , columns: [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                    , orderable: false
                    , searchable: false
                }
                , {
                    data: 'kode_faskes'
                    , name: 'kode_faskes'
                }
                , {
                    data: 'nama_mitra'
                    , name: 'nama_mitra'
                }
                , {
                    data: 'kota.nama'
                    , name: 'kota.nama'
                }
                , {
                    data: 'alamat'
                    , name: 'alamat'
                }
                , {
                    data: 'telepon'
                    , name: 'telepon'
                }
                , {
                    data: 'fasilitas'
                    , name: 'fasilitas'
                }
            ]
        });
    });

</script>
@endpush
