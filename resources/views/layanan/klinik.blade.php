@extends('layout.app')

@section('content')
<div class="site-wrap">

    <main>
        <div class="page-title" data-aos="fade-up" data-aos-delay="100">
            <div class="container">
                <h1 class="mb-2">Klinik Nayaka Husada</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Klinik Nayaka Husada
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <section id="data-klinik" class="py-5 px-3 py-md-5 px-md-5">
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="p-1 mb-0 text-white">
                            <i class="bi bi-hospital me-2"></i> Daftar Klinik Nayaka Husada
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="klinikTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Faskes</th>
                                        <th>Nama Mitra</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Fasilitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_faskes }}</td>
                                        <td>{{ $item->nama_mitra }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->fasilitas }}</td>
                                    </tr>
                                    @endforeach
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
        // --- FUNGSI UNTUK MEMBUAT NAMA FILE DINAMIS ---
        function generateFilename(type) {
            const now = new Date();
            const date =
                ("0" + now.getDate()).slice(-2) +
                "-" +
                ("0" + (now.getMonth() + 1)).slice(-2) +
                "-" +
                now.getFullYear();
            const time =
                ("0" + now.getHours()).slice(-2) +
                ("0" + now.getMinutes()).slice(-2);
            return `${date}_${time}_${type}_jaringan_provider`;
        }

        // --- INISIALISASI DATATABLES ---
        $("#klinikTable").DataTable({
            // Mengatur layout untuk menempatkan tombol di atas kiri tabel
            layout: {
                topStart: {
                    buttons: [{
                            extend: "pdfHtml5"
                            , text: '<i class="bi bi-file-earmark-pdf-fill"></i> PDF'
                            , className: "btn-danger"
                            , title: "Klinik Nayaka Husada"
                            , filename: function() {
                                return generateFilename("PDF");
                            }
                            , orientation: "landscape"
                            , pageSize: "A4"
                            , customize: function(doc) {
                                // Pastikan semua kolom memiliki lebar proporsional
                                var colCount = doc.content[1].table.body[0].length;
                                var widths = Array(colCount).fill("*"); // ['*', '*', '*', ...]
                                doc.content[1].table.widths = widths;

                                // Tengah-kan teks di semua kolom
                                var tableBody = doc.content[1].table.body;
                                for (var i = 0; i < tableBody.length; i++) {
                                    for (var j = 0; j < tableBody[i].length; j++) {
                                        tableBody[i][j].alignment = "center";
                                    }
                                }

                                // Optional styling
                                doc.styles.tableHeader.alignment = "center";
                                doc.styles.tableHeader.fontSize = 10;
                                doc.defaultStyle.fontSize = 9;

                                // Optional: hilangkan margin default jika perlu
                                doc.content[1].margin = [0, 0, 0, 0];
                            }
                        , }
                        , {
                            extend: "print"
                            , text: '<i class="bi bi-printer-fill"></i> Print'
                            , className: "btn-secondary"
                            , title: "Klinik Nayaka Husada"
                        , }
                    , ]
                , }
            , }
            , language: {
                url: "https://cdn.datatables.net/plug-ins/2.0.8/i18n/id.json"
            , }
        , });
    });

</script>
<style>
    /* Perbaiki tampilan table saat mobile */
    @media (max-width: 576px) {

        #klinikTable th,
        #klinikTable td {
            white-space: nowrap;
            /* Hindari teks meluber ke bawah */
            font-size: 12px;
            /* Kecilkan font agar muat */
        }

        .table-responsive {
            padding: 0 !important;
        }

        .card-body {
            padding: 0.5rem !important;
        }

        .card-header h5 {
            font-size: 1rem;
        }
    }

</style>

@endpush
