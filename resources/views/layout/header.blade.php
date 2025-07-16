 <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
     <div class="container d-flex align-items-center justify-content-between">
         <a class="navbar-brand w-auto" href="{{ url('/') }}">
             <img class="logo dark img-fluid" src="assets/icon.png" alt="" width="160" />

             <img class="logo light img-fluid" src="assets/icon.png" alt="" />
         </a>
         <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1" aria-labelledby="fbs__net-navbarsLabel">
             <div class="offcanvas-header">
                 <div class="offcanvas-header-logo">
                     <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">
                         <img class="logo dark img-fluid" src="assets/icon.png" width="150" alt="FreeBootstrap.net image placeholder" />

                         <img class="logo light img-fluid" src="assets/icon.png" alt="FreeBootstrap.net image placeholder" /></a>
                 </div>
                 <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
             </div>

             <div class="offcanvas-body align-items-lg-center">
                 <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link scroll-link active" aria-current="page" href="#home"><b>Home</b></a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><b>Tentang</b> <i class="bi bi-chevron-down"></i></a>

                         <ul class="dropdown-menu">
                             <li>
                                 <a class="nav-link scroll-link dropdown-item" href="#about">Tentang Kami</a>
                             </li>
                             <li>
                                 <a class="nav-link scroll-link dropdown-item" href="{{ route('management.index') }}">Tim Management</a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link scroll-link" href="#pricing"><b>Produk</b></a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><b>Layanan</b> <i class="bi bi-chevron-down"></i></a>

                         <ul class="dropdown-menu">
                             <li>
                                 <a class="nav-link scroll-link dropdown-item" href="{{ route('layanan.klinik') }}">Klinik</a>
                             </li>
                             <li>
                                 <a class="nav-link scroll-link dropdown-item" href="{{ route('layanan.provider') }}">Provider</a>
                             </li>
                             <li>
                                 <a class="nav-link scroll-link dropdown-item" href="{{ route('layanan.inhouse') }}">Kerjasama Perusahaan</a>
                             </li>
                             <li>
                                 <a class="nav-link scroll-link dropdown-item" href="{{ route('layanan.download') }}">Download Formulir</a>
                             </li>
                             <li>
                                 <a class="nav-link scroll-link" href="#faqu">FAQ</a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link scroll-link" href="#services"><b>Kegiatan</b></a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link scroll-link" href="{{ route('carrier.index') }}"><b>Karir</b></a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link scroll-link" href="https://new.nayakaerahusada.com/kontak"><b>Kontak</b></a>
                     </li>
                 </ul>
                 <div class="offcanvas-body align-items-lg-center">
                     <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0"></ul>

                     <div class="mt-auto pt-3 pt-lg-0 d-lg-flex align-items-lg-center">
                         <ul class="navbar-nav nav mb-3 mb-lg-0">
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                     <img src="https://i.pinimg.com/736x/91/3d/f8/913df8098c7237aae279c4628302f49c.jpg" alt="Indonesia Flag" width="24" height="16" class="me-2" />
                                     <b>ID</b> <i class="bi bi-chevron-down ms-1"></i>
                                 </a>
                                 <ul class="dropdown-menu dropdown-menu-end">
                                     <li>
                                         <a class="dropdown-item d-flex align-items-center" href="#lang-id">
                                             <img src="https://i.pinimg.com/736x/91/3d/f8/913df8098c7237aae279c4628302f49c.jpg" alt="Indonesia Flag" width="24" height="16" class="me-2" />
                                             Indonesia
                                         </a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item d-flex align-items-center" href="#lang-en">
                                             <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/2560px-Flag_of_the_United_Kingdom_%283-5%29.svg.png" alt="UK Flag" width="24" height="16" class="me-2" />
                                             English
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                         </ul>
                         <div class="d-grid d-lg-block">
                             <a target="_blank" href="{{ url('panel') }}" class="btn btn-warning d-inline-flex align-items-center justify-content-center fw-bold px-2 py-1" style="
                                            font-size: 0.8rem;
                                            letter-spacing: 0.01em;
                                            box-shadow: 0 4px 10px rgba(255, 193, 7, 0.4);
                                            transition: all 0.3s ease;
                                        ">
                                 <i class="bi bi-box-arrow-in-right me-2"></i>
                                 Masuk
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="ms-auto w-auto">
             <div class="header-social d-flex align-items-center gap-1">
                 <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto" data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars" aria-controls="fbs__net-navbars" aria-label="Toggle navigation" aria-expanded="false">
                     <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <line x1="21" x2="3" y1="6" y2="6"></line>
                         <line x1="15" x2="3" y1="12" y2="12"></line>
                         <line x1="17" x2="3" y1="18" y2="18"></line>
                     </svg>
                     <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                         <path d="M18 6 6 18"></path>
                         <path d="m6 6 12 12"></path>
                     </svg>
                 </button>
             </div>
         </div>
     </div>
 </header>
