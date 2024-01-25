@extends('layouts.app')
@section('link')
@endsection
@section('content')
    <div class="site-blocks-cover overlay" style="background-image: url(front/images/sma3.jpg);" data-aos="fade">

      <div class="container" >
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mt-lg-5 text-center">
            <div data-aos="fade-up" data-aos-delay="100">
              <!-- <h1 class="text-uppercase mb-5" data-aos="fade-up">Selamat Datang <br> di <br> SMA PLUS BAITURAHMAN</h1> -->
              <a href="{{ url('/DafarPpdb_user') }}" class="btn smoothscroll btn-light mr-2 mb-2" style="color:#009B4C;">PPDB SMA PLUS BAITURAHMAN</a>
            </div>
          </div>
            
        </div>
      </div>
      <a href="#beranda" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
      </a>
      
    </div>  
        <!-- PPDB -->
    <section class="site-section border-bottom" id='beranda' data-aos="fade">
      <div class="slide-one-item home-slider owl-carousel" align="center">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="testimonial" data-aos-delay="100">
            <img src="{{url('front/images/ppdb1.jpeg') }}" alt="Image"> 
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="testimonial" data-aos-delay="100">
            <img src="{{url('front/images/ppdb2.jpeg') }}" alt="Image">
          </div>
        </div>
      </div>
    </section>

    <!-- sambutan kepala sekolah -->
    
    <div class="site-section cta-big-image" id='beranda'>
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3" style="color:#009B4C;">SAMBUTAN KEPALA SEKOLAH</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="mb-4">
              <h3 class="h3 mb-4 text-black">KEPALA SEKOLAH SMA PLUS BAITURAHMAN</h3>
              <p>MUKADIMAH</p>
              
            </div>
            <div class="mb-4">
              <p align="justify" data-aos-delay="200">
              &nbsp; &nbsp; Peningkatan kualitas Moral dan Skill manusia Indonesia saat ini mutlak diperlukan mengingat kita berada dalam zaman persaingan sains dan teknologi yang begitu pesat. Kesempatan dan peluang karir begitu luas terbuka terutama bagi mereka yang memiliki kualitas Intelektual dan kecakapan hidup ( Life Skill). Namun sebaliknya bagi generasi yang lemah tak berpendidikan akan menghadapi kehidupan yang kelam tertindas zaman bersandar pada kepiluan dan penderitaan.
              </p>
              <p align="justify" data-aos-delay="300">
              &nbsp; &nbsp; Kehadiran SMA Plus Baiturrahman di tengah- tengah persaingan budaya dan teknologi diharapkan menjadi solusi untuk bangkitnya kemajuan pola pikir anak Bangsa dalam menyongsong kehidupan yang bermartabat. SMA Plus Baiturrahman dirancang sebagai pendidikan yang beroreantasi pada upaya perkembangan potensi anak didik untuk mempersiapkan diri dalam mengahadapai jenjang pendidikan yang lebih tinggi. Selain itu untuk memiliki sikap berfikir kritis dan daya nalar yang tinggi dan dilandasi dengan moral serta dasar agama yang kuat.
              </p>
              <br>
              <p>
                <u>Abdurrahim Hasan M.Pd.I</u>
                <br>
                Kepala Sekolah SMA PLUS BAITURAHMAN BANDUNG
              </p>
            </div>
          </div>
          <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="400">
            <figure class="circle-bg">
              <img src="{{url('front/images/kapsek.jpg') }}" width="100%" height="100%" alt="Image" class="img-fluid">
            </figure>
            <!-- <p><a href="#contact-section" class="smoothscroll btn btn-light" style="color:#009B4C;">Get In Touch</a></p> -->
          </div>
        </div>
      </div>  
    </div>
    
    <!-- Quotes -->
    <section class="site-section testimonial-wrap" id='beranda' data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3" style="color:#009B4C;">Quotes</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          
          <div>
            <div class="testimonial" data-aos-delay="100">

              <blockquote class="mb-5">
                <p>&ldquo; Berfisik Syuhada dan Berkepribadian Indonesia &rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="{{url('front/images/buya.jpeg') }}" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Prof.Dr.Buya KH. Salimuddin,MA</p>
              </figure>
              
            </div>
          </div>

          <div>
            <div class="testimonial" data-aos-delay="200">
              
              <blockquote class="mb-5">
                <p>&ldquo;
                          "...Dengan Ilmu Kita Menuju Kemuliaan...." 
                &rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="{{url('front/images/person_3.jpg') }}" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Oleh Ki Hajar Dewantara</p>
              </figure>
            </div>
          </div>

        </div>
    </section>

    <!-- PROFIL GURU -->
    <section class="site-section border-bottom" id='beranda' data-aos="fade">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="100" style="color:#009B4C;">PROFIL GURU</h2>
            <!-- <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p> -->
          </div>
        </div>
        <div class="row">
          

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/rofi.jpg') }}" width="100%" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Kaiara Spencer</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/nikmat.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Dave Simpson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/fadillah.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Ben Thompson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/anam.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Kyla Stewart</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/sutini.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Kaiara Spencer</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="600">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/dian.jpeg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Dave Simpson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="700">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/sma5.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Ben Thompson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="800">
            <div class="team-member">
              <figure>
                <ul class="social" style="background:#009B4C;">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="{{url('front/images/sma5.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Chris Stewart</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>


          
        </div>
      </div>
    </section>

    <!-- Kegiatan Sekolah -->
    <section class="site-section border-bottom" id='beranda' data-aos="fade">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="100" style="color:#009B4C;">Kegiatan Sekolah</h2>
            <!-- <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p> -->
          </div>
        </div>
        <div class="row">
          

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/sma1.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Kaiara Spencer</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/lomba.jpeg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Dave Simpson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/prakuir.jpeg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Ben Thompson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/sma2.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Kyla Stewart</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/sma1.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Kaiara Spencer</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="600">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/sma2.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
              <h3 style="color:#009B4C;">Dave Simpson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="700">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/sma2.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Ben Thompson</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="800">
            <div class="team-member">
              <figure>
                
                <img src="{{url('front/images/sma3.jpg') }}" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3">
                <h3 style="color:#009B4C;">Chris Stewart</h3>
                <span class="position">Product Manager</span>
              </div>
            </div>
          </div>


          
        </div>
      </div>
    </section>

    <!-- video -->
    <section class="site-section" id='beranda' data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3" style="color:#009B4C;">Video</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="h-entry">
              <iframe class="img-fluid" src="https://www.youtube.com/embed/1A-kTjXxTus" title="YouTube video player" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
              </iframe>
              <h2 class="font-size-regular" style="color:#009B4C;"><a href="#">SIMULASI PTM SMA PLUS BAITURRAHMAN BANDUNG</a></h2>
              <!-- <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p> -->
            </div> 
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="h-entry">
              <iframe class="img-fluid" src="https://www.youtube.com/embed/amesBD-5Igc" title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
              </iframe>
              <h2 class="font-size-regular" style="color:#009B4C;"><a href="#">Profil SMA PLUS BAITURRAHMAN</a></h2>
              <!-- <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div> -->
              <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p> -->
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="h-entry">
              <iframe class="img-fluid" src="https://www.youtube.com/embed/wsDk6Ns4PBg" title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
              </iframe>
              <h2 class="font-size-regular" style="color:#009B4C;"><a href="#">Hyemne BAITURRAHMAN</a></h2>
              <!-- <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
              <p><a href="#">Continue Reading...</a></p> -->
            </div> 
          </div>
          
        </div>
      </div>
    </section>

    <section class="site-section bg-light" id='beranda' data-aos="fade">
      <div class="container" data-aos-delay="100">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3" style="color:#009B4C;">HUBUNGI KAMI
            <br> Kontak</h2>
          </div>
        </div>
        <div div class="col-md-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.701208784661!2d107.705982!3d-6.908461!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4f65ee31d736cc3e!2sSMP%20%26%20SMA%20Plus%20Baiturrahman!5e0!3m2!1sid!2sid!4v1673755596700!5m2!1sid!2sid" width="100%" height="500"
           style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    @endsection
@section('javascript')
@endsection   