@extends('front.layouts.app')
@section('content')


    <!--  Intro start -->
    <section class="intro">
        <div class="container">
            <div class="intro-wrap bg-white w-100" @if(App::isLocale('ar'))dir="rtl" @endif>
                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-4 @if(App::isLocale('ar')) text-right @endif">
                        <div class="intro-item" data-aos="fade-up">
                            <i class="icofont-soup-bowl text-center"></i>
                            <h3 class="mt-3">{{__('front.featureOne')}}</h3>
                            <p>{{__('front.featureOneInfo')}}.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 @if(App::isLocale('ar')) text-right @endif">
                        <div class="intro-item bg-gray " data-aos="fade-up" data-aos-delay="300">
                            <i class="icofont-tasks"></i>
                            <h3 class="mt-3">{{__('front.featureTwo')}}</h3>
                            <p>{{__('front.featureTwoInfo')}}. </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 @if(App::isLocale('ar')) text-right @endif">
                        <div class="intro-item" data-aos="fade-up" data-aos-delay="600">
                            <i class="icofont-map-pins"></i>
                            <h3 class="mt-3">{{__('front.featureThree')}}</h3>
                            <p>{{__('front.featureThreeInfo')}}. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Intro End -->

    <!-- About start -->
    <section class="section about">
        <div class="container">
            <div class="row  justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="text-primary font-extra font-md">{{__('front.lastproducts')}}</span>
                    <h2 class="mt-3 mb-4">{{__('front.lastproductinfo')}} </h2>
                </div>
            </div>

            <div class="row" @if(App::isLocale('ar'))dir="rtl" @endif>
                <?php $products = \Illuminate\Support\Facades\DB::table('products')->where('status',1)->latest('created_at')->paginate(6) ?>
                @foreach($products as $_prod)
                <div class="col-lg-4 col-md-4 mb-5 mb-lg-0 @if(App::isLocale('ar')) text-right @endif " data-aos="fade-up">
                    <img style="width: 350px;height: 246px" src="{{$_prod->image}}" alt="" class="img-fluid">
                    <div class="mt-3">
                        <?php
                        $name = json_decode($_prod->name);
                        if(App::isLocale('ar')){
                            $name = $name->ar;
                        }else{
                            $name = $name->en;
                        }
                        ?>
                        <h3>{{$name}}</h3>
                        <p>{{$_prod->details}}</p>
                        <a href="{{route('Front.Booknow',['prod_id'=>$_prod->id])}}" class="mb-2 btn btn-white border-danger">{{__('front.booknow')}}</a>
                    </div>
                </div>
                @endforeach


{{--                <div class="col-lg-4 col-md-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">--}}
{{--                    <img src="images/about/img-2.jpg" alt="" class="img-fluid">--}}
{{--                    <div class="mt-3">--}}
{{--                        <h3>Friendly place</h3>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.impedit maiores fugit illo deserunt!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="600">--}}
{{--                    <img src="images/about/img-3.jpg" alt="" class="img-fluid">--}}
{{--                    <div class="mt-3">--}}
{{--                        <h3>Affordable price</h3>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.impedit maiores fugit illo deserunt!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- About  End -->

    <!-- CTA start -->
    <section class="section cta">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <span class="font-extra text-md-2 text-white-70">Prepare The Best Dishes</span>
                    <h2 class="mt-3 text-white mb-4">Come & Experience Our Best of World Class Cousine</h2>

                    <a href="#" class="btn btn-white border-danger" >{{__('front.booknow')}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA  End -->

    <!-- DISHES start -->
    <section class="section menu">
        <div class="container" @if(App::isLocale('ar')) dir="rtl" @endif>
            <div class="row  justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="text-primary font-extra font-md">{{__('front.menumaka')}}</span>
                    <h2 class="mt-3 mb-4">{{__('front.menuinfo')}} </h2>
                </div>
            </div>

            <div class="col-12 text-center mb-5">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
{{--                    <label class="btn active">--}}
{{--                        <input type="radio" name="shuffle-filter" value="all" checked="checked"/>All--}}
{{--                    </label>--}}
                    <label class="btn cat active">
                        <input type="radio" name="shuffle-filter" value="categories" checked="checked"/>{{__('front.categories')}}
                    </label>
                    <label class="btn">
                        <input type="radio" name="shuffle-filter" value="products"/>{{__('front.products')}}
                    </label>
                    <label class="btn">
                        <input type="radio" name="shuffle-filter" value="addons"/>{{__('front.addons')}}
                    </label>
                </div>
            </div>

            <div class="row shuffle-wrapper food-gallery">
                <?php
                    $categories = \App\Models\Categorie::where('main_category',0)->where('status',1)->paginate(6);
                    $products = \Illuminate\Support\Facades\DB::table('products')->where('status',1)->paginate(6);
                    $addons = \Illuminate\Support\Facades\DB::table('addones')->where('status',1)->paginate(6);
                ?>
                @foreach($categories as $cat)
                    <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups='["categories"]'>
                        <div class="menu-item position-relative ">
                            <div class="d-flex align-items-center">
                                <img style="width: 150px;height: 100px" src="{{asset($cat->image)}}" alt="" class="img-fluid mb-3 mb-lg-0">
                                <div>
                                    <?php  $name = json_decode($cat->name); $name = App::isLocale('ar')?$name->ar:$name->en; ?>
                                    <h4>{{$name}}</h4>
                                        <a href="#" class="mt-2"><i class="ti-shopping-cart mr-2 text-primary"></i>{{__('front.booknow')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                <span id="addon" hidden>--}}
                @foreach($addons as $addon)
                    <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups='["addons"]'>
                        <div class="menu-item position-relative ">
                            <div class="d-flex align-items-center">
                                <img style="width: 150px;height: 100px"  src="{{asset($addon->image)}}" alt="" class="img-fluid mb-3 mb-lg-0">
                                <div>
                                    <?php  $name = json_decode($addon->name); $name = App::isLocale('ar')?$name->ar:$name->en; ?>
                                    <h4>{{$name}}</h4>
                                        <a href="#" class="mt-2"><i class="ti-shopping-cart mr-2 text-primary"></i>{{__('front.booknow')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                </span>--}}
{{--                <span id="prod" hidden>--}}
                @foreach($products as $product)
                    <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups='["products"]'>
                        <div class="menu-item position-relative ">
                            <div class="d-flex align-items-center">
                                <img style="width: 150px;height: 100px"  src="{{asset($product->image)}}" alt="" class="img-fluid mb-3 mb-lg-0">
                                <div>
                                    <?php  $name = json_decode($product->name); $name = App::isLocale('ar')?$name->ar:$name->en; ?>
                                    <h4>{{$name}}</h4>
                                        <a href="{{route('Front.Booknow',['prod_id'=>$product->id])}}" class="mt-2"><i class="ti-shopping-cart mr-2 text-primary"></i>{{__('front.booknow')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                </span>--}}
{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;,&quot;illustration&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-1.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Vitello Tonato - <span>23$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;branding&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-2.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Crema di Pomodoro - <span>34$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;illustration&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-3.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Oatmeal Cookie - <span>13$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;,&quot;branding&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex  align-items-center">--}}
{{--                            <img src="images/menu/menu-4.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Seasonal Soup - <span>10$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;illustration&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-5.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Pizza Pane - <span>28$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-6.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Carpacio - <span>20$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;branding&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-7.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Insalata Rucola - <span>15$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6 col-md-6 mb-4 shuffle-item"--}}
{{--                     data-groups="[&quot;design&quot;,&quot;illustration&quot;,&quot;branding&quot;]">--}}
{{--                    <div class="menu-item position-relative ">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <img src="images/menu/menu-8.jpg" alt="" class="img-fluid mb-3 mb-lg-0">--}}
{{--                            <div>--}}
{{--                                <h4>Carpacio - <span>13$</span></h4>--}}
{{--                                <p>Chinese mustard/Chipotle aiol</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="row">
                <div class="col-lg-12 text-center mt-5">
                    <a href="#" class="btn btn-black ">{{__('front.viewmenu')}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- DISHES  End -->

    <!--App start -->
    <section class="section download">
        <div class="container" @if(App::isLocale('ar'))dir="rtl" @endif>
            <div class="row ">
                <div class="col-lg-10 col-md-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <!-- <img src="images/about/2-mbl.png" alt="" class="img-fluid"> -->


                            <!-- for change phone model follow this link: https://marvelapp.github.io/devices.css/ -->
                            <div class="marvel-device iphone-x">
                                <div class="notch">
                                    <div class="camera"></div>
                                    <div class="speaker"></div>
                                </div>
                                <div class="top-bar"></div>
                                <div class="sleep"></div>
                                <div class="bottom-bar"></div>
                                <div class="volume"></div>
                                <div class="overflow">
                                    <div class="shadow shadow--tr"></div>
                                    <div class="shadow shadow--tl"></div>
                                    <div class="shadow shadow--br"></div>
                                    <div class="shadow shadow--bl"></div>
                                </div>
                                <div class="inner-shadow"></div>
                                <div class="screen">
                                    <img src="images/CafeDine.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 @if(App::isLocale('ar')) text-right @endif">
                            <span class="text-primary font-md font-extra">{{__('front.makeiteasy')}}</span>
                            <h2 class="mt-3">{{__('front.getapp')}}</h2>
                            <p class="mt-4">{{__('front.appinfo')}} </p>

                            <div class="mt-5">
                                <a href="#" target="_blank" class="btn-download active mb-2">
                                    <i class="ti ti-android"></i>
                                    <div class="btn-text">
                                        <span>{{__('front.getit')}}</span>
                                        Google Play
                                    </div>
                                </a>
                                <a href="#" target="_blank" class="btn-download">
                                    <i class="ti ti-apple"></i>
                                    <div class="btn-text">
                                        <span>{{__('front.getit')}}</span>
                                        app store
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- App  End -->



    <!-- Slider main container -->
    <section class="instgram position-relative">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <h3 class="insta-title">@Makka Sandwitch</h3>

                <div class="swiper-container" id="gallery-slider">
                    <!-- for instagram post remove comments from bottom line and replace your user id and access token -->
                    <!-- <div class="swiper-wrapper" id="instafeed" data-userId="4044026246" data-accessToken="4044026246.1677ed0.8896752506ed4402a0519d23b8f50a17"></div> -->

                    <!-- this is static images. after setup instagram, remove this bottom code to the end -->
                    <div class="swiper-wrapper" id="instafeed">
                        <!-- Slides -->
                        <?php $products = \Illuminate\Support\Facades\DB::table('products')->where('status',1)->orderBy('created_at')->paginate(6); ?>
                        @foreach($products as $product)
                        <div class="swiper-slide">
                            <a class="popup-gallery" href="{{route('Front.Booknow',['prod_id'=>$product->id])}}">
                                <img style="width: 225px;height:300px" src="{{asset($product->image)}}" alt="" class="img-fluid">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </section>
@endsection
