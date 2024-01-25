@extends('layouts.app')
@section('link')
@endsection
@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(front/images/sma3.jpg);height: 150px;"  data-aos="fade">

      <div class="container" >
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12 mt-lg-12 text-center">
            <div data-aos="fade-up" data-aos-delay="100">
              <h1 class="mb-2" data-aos="fade-up">Video Sekolah</h1>
            </div>
          </div>
            
        </div>
      </div>
      <a href="#ProfilWaka" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
      </a>
      
    </div> 
    
    <!-- video -->
    <section class="site-section" id='beranda' data-aos="fade">
      <div class="container">
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
@endsection
@section('javascript')
@endsection   