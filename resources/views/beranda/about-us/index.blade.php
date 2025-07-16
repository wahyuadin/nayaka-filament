<div class="modal fade" id="aboutusModal{{ $about_us->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Nayaka Era Husada | {{ $about_us->label }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="row card-row p-4">
                        {!! $about_us->content !!}
                    </div>
                    <hr />
                    <div class="row card-row p-4">
                        <div class="col-md-6 order-2 order-md-1">
                            <div class="row">
                                <div class="col-3 d-flex flex-column justify-content-between align-items-center">
                                    <p style="font-family: 'brush'; font-size: 60px; margin: 0">
                                        Visi
                                    </p>
                                    <p style="
                          font-family: 'brush';
                          font-size: 50px;
                          margin-bottom: 140px;
                        ">
                                        Misi
                                    </p>
                                </div>
                                <div class="col-9 li-custom">
                                    <p style="text-align: justify">
                                        Menjadi perusahaan penyelenggara jaminan pemeliharaan
                                        kesehatan dan pelayanan kesehatan terkemuka dengan
                                        pelayanan prima, memegang teguh komitmen serta menjaga
                                        integritas untuk memenuhi kenyamanan konsumen.
                                    </p>
                                    <ul>
                                        <li>
                                            Melaksanakan pendekatan managed care secara holistik,
                                        </li>
                                        <li>
                                            Membentuk jejaring provider yang bermutu untuk
                                            mendapatkan pelayanan terpadu, bersinambung, dan
                                            menerapkan sistem rujukan,
                                        </li>
                                        <li>
                                            Melindungi hak peserta untuk memperoleh manfaat
                                            program secara optimal dan pelayanan kesehatan
                                            bermutu,
                                        </li>
                                        <li>
                                            Memastikan pelayanan yang diberikan dapat memenuhi
                                            harapan dan kepuasan peserta.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 order-1 order-md-2">
                            <img src="assets/tentang_nakaya.png" class="img-fluid p-5" alt="Visi dan Misi" />
                        </div>
                    </div>

                    <div class="row card-row p-4 justify-content-center rounded" style="background-color: #f8f9fa">
                        <div class="col-md-12 order-2 order-md-1">
                            <h3 class="mb-5" style="
                      font-family: noto-serif-semicondensed, serif;
                      font-style: normal;
                      font-display: swap;
                      font-weight: 600;
                      text-align: center;
                    ">
                                <b>Semboyan Kerja</b>
                            </h3>
                            <div class="row justify-content-center">
                                <div class="row justify-content-center text-center">
                                    <div class="col-md-3 mb-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa-solid fa-hand-fist"></i>
                                        </div>
                                        <p style="text-align: center"><b>GESIT</b></p>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fas fa-hand-point-up"></i>
                                        </div>
                                        <p style="text-align: center">
                                            <b>SUKSES</b>
                                        </p>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="icon-circle mb-3">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </div>
                                        <p style="text-align: center">
                                            <b>HEBAT</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 order-2 order-md-1">
                            <h3 class="mb-5" style="
                      font-family: noto-serif-semicondensed, serif;
                      font-style: normal;
                      font-display: swap;
                      font-weight: 600;
                      text-align: center;
                      margin-top: 50px;
                    ">
                                <b>Budaya Kerja</b>
                            </h3>
                            <div class="row justify-content-center">
                                <div class="row justify-content-center text-center">
                                    <div class="col-md-4 mb-4 text-center">
                                        <div class="icon-circle-budaya mb-3">
                                            <i class="fa-solid fa-handshake"></i>
                                        </div>
                                        <p><b>SOLID</b></p>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="icon-circle-budaya mb-3">
                                            <i class="fa-solid fa-hands-clapping"></i>
                                        </div>
                                        <p style="text-align: center"><b>INTEGRITAS</b></p>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="icon-circle-budaya mb-3">
                                            <i class="fa-solid fa-heart-circle-check"></i>
                                        </div>
                                        <p style="text-align: center"><b>PASSION</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
