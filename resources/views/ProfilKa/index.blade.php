@extends('layouts.app')
@section('link')
@endsection
@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(front/images/sma3.jpg);height: 150px;"  data-aos="fade">

      <div class="container" >
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12 mt-lg-12 text-center">
            <div data-aos="fade-up" data-aos-delay="100">
              <h1 class="mb-2" data-aos="fade-up">Jabatan Fungsional: Kepala TU</h1>
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
    
    <section class="site-section border-bottom" id='ProfilWaka' data-aos="fade">
      <div class="container">
        <div class="row">
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
        </div>
      </div>
    </section>
@endsection
@section('javascript')
@endsection   