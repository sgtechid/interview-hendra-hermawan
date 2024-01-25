<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo">
                    <a href="{{ url('/') }}" class="mb-0">
                        <img src="{{url('front/images/logo.png') }}" alt="Image" width="100" height="100" class="img-fluid"> 
                    </a>
                </h1>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                    <li><a href="{{ url('/') }}" class="{{ $page =='beranda' ? 'nav-link active' : '' }} ">Beranda</a></li>
                    <li class="has-children">
                        <a href="#about-section" class="{{ $page =='VisiMisi' || $page =='Sejarah' || $page =='Identitas' ? 'nav-link active' : '' }} ">Profil Sekolah</a>
                        <ul class="dropdown">
                        <li><a href="{{ url('/Sejarah') }}" class="{{ $page =='Sejarah' ? 'nav-link active' : '' }} ">Sejarah</a></li>
                        <li><a href="{{ url('/Identitas') }}" class="{{ $page =='Identitas' ? 'nav-link active' : '' }} ">Identitas</a></li>
                        <li><a href="{{ url('/VisiMisi') }}" class="{{ $page =='VisiMisi' ? 'nav-link active' : '' }} ">Visi Dan Misi</a></li>
                        <!-- <li class="has-children">
                            <a href="#">More Links</a>
                            <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                            </ul>
                        </li> -->
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#about-section" class="{{ $page =='ProfilWaka' || $page =='ProfilKa' ? 'nav-link active' : '' }} " >Profil Guru Dan Karyawan</a>
                        <ul class="dropdown">
                        <li><a href="{{ url('/ProfilWaka') }}" class="{{ $page =='ProfilWaka' ? 'nav-link active' : '' }} ">Profil Waka. Sekolah</a></li>
                        <li><a href="{{ url('/ProfilKa') }}" class="{{ $page =='ProfilKa' ? 'nav-link active' : '' }} ">Profil KA T.U</a></li>
                        <!-- <li class="has-children">
                            <a href="#about-section" class="nav-link">Profil T.U</a>
                            <ul class="dropdown">
                                <li><a href="#pricing-section" class="nav-link">Staf Keuangan</a></li>
                                <li><a href="#team-section" class="nav-link">Staf Kepegawaian</a></li>
                                <li><a href="#faq-section" class="nav-link">Staf Kesiswaan</a></li>
                                <li><a href="#faq-section" class="nav-link">Staf Operator</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="has-children">
                            <a href="#">Profil Guru</a>
                            <ul class="dropdown">
                                <li><a href="#">Pendidikan Agama</a></li>
                                <li><a href="#">PPKN</a></li>
                                <li class="has-children">
                                    <a href="#">Bahasa</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Indonesia</a></li>
                                        <li><a href="#">Ingris</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#about" class="{{ $page =='Kegiatan' || $page =='EktraKurikuler' || $page =='Video' ? 'nav-link active' : '' }} " >Galeri</a>
                        <ul class="dropdown">
                        <li><a href="{{ url('/Kegiatan') }}" class="{{ $page =='Kegiatan' ? 'nav-link active' : '' }} ">Kegiatan</a></li>
                        <li><a href="{{ url('/EktraKurikuler') }}" class="{{ $page =='EktraKurikuler' ? 'nav-link active' : '' }} ">Ekstra KuriKuler</a></li>
                        <li><a href="{{ url('/Video') }}" class="{{ $page =='Video' ? 'nav-link active' : '' }} ">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/Kontak') }}" class="{{ $page =='Kontak' ? 'nav-link active' : '' }} ">Kontak</a></li>
                    <!-- <li><a href="#blog-section" class="nav-link">Blog</a></li>
                    <li><a href="#contact-section" class="nav-link">Contact</a></li> -->
                    </ul>
                </nav>
            </div>


            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle float-right">
                    <span class="icon-menu h3"></span>
                </a>
            </div>

        </div>
    </div>
      
</header>