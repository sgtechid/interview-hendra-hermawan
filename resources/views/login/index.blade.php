
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Admin SMA Plus Baiturahman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{url('front/images/logo.png') }}" sizes="any" />
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{url('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{url('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route('login.check_login') }}" id="add_form" method="POST">
                    @csrf
                    <div class="login-form-head">
                        <h3>
                            <img src="{{url('front/images/logo.png') }}" alt="Image" width="50%" height="5%" class="img-fluid"> 
                        </h3>
                        <h4>
                            <br>
                            Login
                        </h4>
                        <p>Sign In to your account</p>
                    </div>
                    <!-- @if (session('gagal'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ session('gagal') }}.
                    </div>
                    @endif -->
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="user">Username <span class="symbol required"></span></label>
                            <input type="text" required id="user" name="user" aria-required="true">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password <span class="symbol required"></span></label>
                            <input type="password" required id="password" name="password" aria-required="true">
                            <i id="show-password" class="fa fa-eye"></i>
                            <!-- <i class="ti-lock"></i> -->
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <!-- <input type="checkbox" class="custom-control-input" id="customControlAutosizing"> -->
                                    <!-- <label class="custom-control-label" for="customControlAutosizing">Remember Me</label> -->
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <!-- jquery latest version -->
    <script src="{{url('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{url('assets/js/popper.min.js') }}"></script>
    <script src="{{url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{url('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{url('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{url('assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{url('assets/js/plugins.js') }}"></script>
    <script src="{{url('assets/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    @if ( $massage = session('gagal'))
        <script type="text/javascript">
            Swal.fire({
                type: 'error',
                title:  "{{ $massage }}",
                text: 'Gagal',
                timer: 4000,
            })
        </script> 
    @endif
    <script type="text/javascript">  
        $('#show-password').click(function() {
        if ($(this).hasClass('fa-eye')) {
            $('#password').attr('type', 'text');
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
        } else {
            $('#password').attr('type', 'password');
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
        }
        })
        $.validator.setDefaults({
            errorElement: "span",
            errorClass: "help-block",
            //	validClass: 'stay',
            highlight: function (element, errorClass, validClass) {
                $(element).addClass(errorClass); //.removeClass(errorClass);
                $(element).closest('.form-gp').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass(errorClass); //.addClass(validClass);
                $(element).closest('.form-gp').removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }  else {
                    error.insertAfter(element);
                }
            }
        });
        $(document).ready(function () {

        var validator = $("#add_form").validate();

        });
    </script>
</body>

</html>