<!doctype html>
<html lang="en">
  <head>
    <title>Selamat Datang &mdash; Di SMA PLUS BAITURAHMAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="{{url('front/images/logo.png') }}" sizes="any" />
    <meta name="description" content="sma plus baiturahman">
    <meta name="keywords"  content="sma plus baiturahman">
    <meta name="keywords"  content="pasantern plus baiturahman">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">
    <link href="{{url('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{url('front/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{url('front/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{url('front/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <link href="{{url('front/css/jquery.fancybox.min.css') }}" rel="stylesheet">

    <link href="{{url('front/css/bootstrap-datepicker.css') }}" rel="stylesheet">

    <link href="{{url('front/fonts/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{url('front/fonts/icomoon/style.css') }}" rel="stylesheet">

    <link href="{{url('front/css/aos.css') }}" rel="stylesheet">

    <link href="{{url('front/css/style.css') }}" rel="stylesheet">
    <style>
          .modal_loding {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 ) 
                        url('http://i.stack.imgur.com/FhHRx.gif') 
                        50% 50% 
                        no-repeat;
        }

        /* When the body has the loading class, we turn
          the scrollbar off with overflow:hidden */
        .modal_loding {
            overflow: hidden;   
        }

        /* Anytime the body has the loading class, our
          modal_loding element will be visible */
            .modal_loding {
            display: block;
        }
        </style>
    @yield('link')
    @yield('script')
    @yield('style')
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="modal_loding" id="modal_loding"><!-- Place at bottom of page --></div>
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        @include('layouts.header')
        
        <!-- view -->
        @yield('content')
        @include('layouts.footer')
    </div> <!-- .site-wrap -->
   
    <script src="{{url('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{url('front/js/jquery-ui.js') }}"></script>
    <script src="{{url('front/js/popper.min.js') }}"></script>
    <script src="{{url('front/js/bootstrap.min.js') }}"></script>
    <script src="{{url('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{url('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{url('front/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{url('front/js/aos.js') }}"></script>
    <script src="{{url('front/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{url('front/js/jquery.sticky.js') }}"></script>
    <script src="{{url('front/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{url('front/js/main.js') }}"></script>
    <script type="text/javascript">
      $('#modal_loding').hide();
  </script> 
  @yield('javascripts')
  </body>
</html>