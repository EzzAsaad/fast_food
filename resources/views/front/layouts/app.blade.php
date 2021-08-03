<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php
    $setting_header = \App\Models\Settings::first();
    //dd(json_decode($setting_header->slider));
    ?>
    <meta charset="utf-8">
    <meta name="description" content="{{$setting_header->EnDescription." ".$setting_header->ArDescription}}">
    <meta name="keywords" content="{{str_replace(" ",',',$setting_header->EnMetaKeywords)}}">
    <meta name="keywords" content="{{str_replace(" ",',',$setting_header->ArMetaKeywords)}}">
    <title>@if(App::isLocale('ar')) {{$setting_header->nameAr}} @else{{$setting_header->nameEn}} @endif</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('front_assets/plugins/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/themify/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/video-popup/modal-video.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/date-picker/datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/clock-picker/clockpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.css')}}">
    <link rel="stylesheet" href="{{asset("front_assets/plugins/devices.min.css")}}">

    <!-- Main Stylesheet -->
    <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset($setting_header->favIcon)}}" type="image/x-icon">
    <link rel="icon" href="{{asset($setting_header->favIcon)}}" type="image/x-icon">

    <link
        rel="stylesheet"
        href="https://unpkg.com/polipop/dist/css/polipop.core.min.css"
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/polipop/dist/css/polipop.default.min.css"
    />

</head>

<body>
<div class="preloader">
    <img src="{{asset('front_assets/images/preloader.gif')}}" alt="preloader" class="img-fluid">
</div>

<!-- Header Start -->

<header class="navigation ">
    <nav class="navbar navbar-expand-lg main-nav py-lg-3 position-absolute w-100" id="main-nav">
        <div class="container" @if(App::isLocale('ar'))dir="rtl" @endif>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset($setting_header->logo)}}" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation" @if(App::isLocale('ar')) dir="rtl" @endif >
                <ul class="navbar-nav @if(App::isLocale('ar')) mr-auto @else ml-auto @endif ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">{{__('front.home')}}</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">{{__('front.about')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{__('front.contact')}}</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">{{__('front.lang')}}</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="{{ route('changeSiteLanguage', 'en') }}">{{__('front.english')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('changeSiteLanguage', 'ar') }}">{{__('front.arabic')}}</a></li>
                        </ul>
                    </li>
                    @if(!\Illuminate\Support\Facades\Auth::guard('customer')->check())
                    <li class="nav-item"><a href="{{route('Front.ShowCart')}}" class="mt-3"><i style="color: red!important;" class="fa fa-shopping-cart"></i> <span style="color: red!important;" class="">0</span></a></li>
                    @else
                        <li class="nav-item"><a href="{{route('Front.ShowCart')}}" class="mt-3"><i style="color: red!important;" class="fa fa-shopping-cart"></i> <span style="color: red!important;" class="">{{count(\App\Models\cart::where('user_id',\Illuminate\Support\Facades\Auth::guard('customer')->user()->id)->where('isAddon',0)->get())}}</span></a></li>
                    @endif
                        @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}}</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="text-center" href="{{ url('/customer/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{__('front.logout')}}
                                    </a>

                                    <form id="logout-form" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('Front.loginregister')}}">{{__('front.login')}} / {{__('front.register')}}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Header Close -->

<!--  Banner start -->
<section class="slider-hero hero-slider  hero-style-1 ">
    <div class="swiper-container swiper-container-horizontal">
        <div class="swiper-wrapper">
            <!-- start slide-item -->

            @foreach(json_decode($setting_header->slider) as $slide)
            <div class="swiper-slide slide-item" @if(App::isLocale('ar')) dir="rtl" @endif  @if(App::isLocale('ar')) style="transform: scaleX(-1)!important;"@endif>
                <div class="slide-inner slide-bg-image main-sider-inner" data-background="{{asset($slide)}}">
                    <!-- <div class="overlay"></div> -->
                    <div class="container @if(App::isLocale('ar'))text-right @endif" @if(App::isLocale('ar')) style="transform: scaleX(-1)!important;"@endif>
                        <div class="row">
                            <div class="col-lg-7">
                                <span data-swiper-parallax="300" class="text-primary font-extra font-md">{{__('front.headheader')}}</span>
                                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">{{__('front.headinfo')}}</h1>
                                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">{{__('front.viewmenu')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- end slide-item -->

{{--            <!-- start slide-item -->--}}
{{--            <div class="swiper-slide slide-item">--}}
{{--                <div class="slide-inner slide-bg-image main-sider-inner" data-background="{{asset('front_assets/images/banner/slide-2.jpg')}}">--}}
{{--                    <!-- <div class="overlay"></div> -->--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-7">--}}
{{--                                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Welcome to restuarant</span>--}}
{{--                                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">Good food starts with good ingridients.Have a great time with us</h1>--}}
{{--                                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">View Menu</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- end slide-item -->--}}

{{--            <!-- start slide-item -->--}}
{{--            <div class="swiper-slide slide-item">--}}
{{--                <div class="slide-inner slide-bg-image main-sider-inner" data-background="{{asset('front_assets/images/banner/slide-3.jpg')}}">--}}
{{--                    <!-- <div class="overlay"></div> -->--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-7">--}}
{{--                                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Welcome to restuarant</span>--}}
{{--                                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">We deliver good quality food with great service to our customers</h1>--}}
{{--                                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">View Menu</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- end slide-item -->--}}
        </div>
        <!-- end swiper-wrapper -->
        <!-- swipper controls -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!--  Banner End -->

@yield('content')

<!--Footer start -->
<footer class="section footer" @if(App::isLocale('ar'))dir="rtl" @endif>
    <div class="container @if(App::isLocale('ar')) text-right @endif">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-3 mb-5 mb-lg-0">
                <div class="widget">
                    <h4 class="mb-3">{{__('front.about')}}</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, nam!</p>

                    <ul class="list-inline footer-socials mt-4 @if(App::isLocale('ar')) float-right @endif " @if(App::isLocale('ar')) style="padding-right: 0px" @endif>
                        <?php  $socials = \App\Models\Social::where('status',1)->get();?>
                        @foreach($socials as $social)
                        <li class="list-inline-item"><a href="{{$social->link}}"><img style="width: 50px;height: 50px;" src="{{asset($social->icon)}}"></a></li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="col-lg-4 ml-auto col-md-5 mb-5 mb-lg-0">
                <div class="widget p-0" >
                    <h4 class="mb-3">{{__('front.contactinfo')}}</h4>

                    <ul @if(App::isLocale('ar')) style="padding-right: 0px" @endif class="list-unstyled mb-0 footer-contact">

                        <li><i class="fa fa-mobile-alt @if(App::isLocale('ar')) ml-1 @endif "></i>{{$setting_header->phone}}</li>
                        <li><i class="fa fa-envelope @if(App::isLocale('ar')) ml-1 @endif"></i>{{$setting_header->email}}</li>
                        <li><i class="fa fa-map @if(App::isLocale('ar')) ml-1 @endif"></i>1234 Altschul, New York,NY 10027-0000</li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
                <div class="widget">
                    <h4 class="mb-3">{{__('front.openinghours')}}</h4>

                    <div class="info mb-4">
                        <p class="mb-0">Monday - Thursday</p>
                        <h5>10:00 AM - 11:00 PM</h5>
                    </div>
                    <div class="info">
                        <p class="mb-0">Friday - Sunday</p>
                        <h5>12:00 AM - 03:00 AM</h5>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row justify-content-center mt-5">--}}
{{--            <div class="col-lg-6 text-center">--}}
{{--                <h4 class="text-white-50 mb-3">Get latest food recipe at your inbox</h4>--}}
{{--                <form action="#" class="footer-newsletter">--}}
{{--                    <div class="form-group">--}}
{{--                        <button class="button"><span class="ti-email"></span></button>--}}
{{--                        <input type="email" class="form-control" placeholder="Enter Email">--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</footer>

<section class="footer-btm py-3">
    <div class="container" @if(App::isLocale('ar'))dir="rtl" @endif>
        <div class="row">
            <div class="col-lg-12">
                <div class="d-md-flex justify-content-between align-items-center py-3  text-center">
                    <p class="mb-0"><a href="#" class="text-white">LogApps</a> &copy; 2021 </p>

{{--                    <div class="footer-menu mt-3 mt-lg-0">--}}
{{--                        <ul class="list-inline mb-0">--}}
{{--                            <li class="list-inline-item pl-2"><a href="index.html">Home</a></li>--}}
{{--                            <li class="list-inline-item pl-2"><a href="about.html">About Us</a></li>--}}
{{--                            <li class="list-inline-item pl-2"><a href="gallery.html">Gallery</a></li>--}}
{{--                            <li class="list-inline-item pl-2"><a href="policy.html">Privacy Policy</a></li>--}}
{{--                            <li class="list-inline-item pl-2"><a href="terms.html">Use of terms</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer  End -->

<!-- jQuery -->
<script src="{{asset('front_assets/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('front_assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/aos/aos.js')}}"></script>
<script src="{{asset('front_assets/plugins/shuffle/shuffle.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/date-picker/datepicker.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/clock-picker/clockpicker.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/video-popup/jquery-modal-video.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/swiper/swiper.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/instafeed/instafeed.min.js')}}"></script>
<script src="{{asset('front_assets/plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.js')}}"></script>

<!-- Google Map -->
<script src="{{asset('front_assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ')}}"></script>
<script src="{{asset('front_assets/plugins/google-map/gmap.js')}}"></script>
<!-- Main Script -->
<script src="{{asset('front_assets/js/contact.js')}}"></script>
<script src="{{asset('front_assets/js/script.js')}}"></script>

<script src="https://unpkg.com/polipop/dist/polipop.min.js"></script>


<script>
    var polipop = new Polipop('mypolipop', {
        layout: 'popups',
        insert: 'before',
        pool: 5,
        progressbar: true,
        @if(App::isLocale('ar'))
        position:"bottom-left"
        @else
        position:"bottom-right"
        @endif
    });
    @if($errors->any())
    @foreach($errors->all() as $error)
    polipop.add({
        content: '{{$error}}',
        title: '{{__('alert.titleval')}}',
        type: 'error',
        life: 500
    });
    @endforeach
    @endif
    @if(session()->has('successM'))
    polipop.add({
        content: '{{session()->get('successM')}}',
        title: '{{__('alert.titlesuc')}}',
        type: 'success',
        life: 500
    });
    @endif
</script>

</html>
