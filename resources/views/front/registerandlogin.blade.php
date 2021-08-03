@extends('front.layouts.app')

@section('content')
    <div class="container mb-2">
        @if(session()->has('loginrequired'))
            <div class="mx-auto w-50 mt-3 @if(App::isLocale('ar')) text-center @endif alert alert-danger">{{__('alert.loginfirst')}}</div>
        @endif
        <div class="row" @if(App::isLocale('ar'))dir="rtl" @endif>
            <div id="verify_sms" class=" h-50 border border-dark col-md-6 mt-2 col-lg-6 mt-5 @if(App::isLocale('ar'))  text-right @endif"  style="max-width: 550px">
                <div class="alert alert-danger" id="error" style="display: none;"></div>
                <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                <div class=" payment-form py-6">
                    <h3 class="mt-2 headline mb-4 font-weight-bold border-bottom pb-3">{{__('front.register')}}</h3>
                    <h3>{{__('front.enterphonenumber')}}</h3>

                    <form>
                        <input type="text" id="number" class="form-control" placeholder="ex. +20155*******">

                        <div id="recaptcha-container"></div>

                        <button type="button" class="btn btn-primary mt-3" onclick="return sendOTP();">{{__('front.sendsms')}}</button>
                    </form>


                    <div class="mb-5 mt-5">
                        <h3>{{__('front.enterVCode')}}</h3>


                        <form>
                            <input type="text" id="verification" class="form-control" placeholder="{{__('front.VCode')}}">
                            <button type="button" class="btn btn-danger mt-3" onclick="verify()">{{__('front.verify')}}</button>
                        </form>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label {{ $errors->has('name') ? ' has-error' : '' }}">{{__('front.username')}}</label>
                            <div class="col-sm-8">
                                <input type="text" style="{{ $errors->has('name') ? 'border-color:red' : '' }}" class="form-control" name="name" placeholder="{{__('front.username')}}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="col-sm-8">
                                    <label></label>
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label {{ $errors->has('password') ? ' has-error' : '' }}">{{__('front.password')}}</label>
                            <div class="col-sm-8">
                                <input type="password" style="{{ $errors->has('password') ? 'border-color:red' : '' }}" class="form-control" name="password" placeholder="{{__('front.password')}}">
                            </div>
                            @if ($errors->has('password'))
                                <div class="col-sm-8">
                                    <label></label>
                                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('front.confirmpassword')}}</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{__('front.password')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label {{ $errors->has('phone') ? ' has-error' : '' }}">{{__('front.phone')}}</label>
                            <div class="col-sm-8">
                                <input style="{{ $errors->has('phone') ? 'border-color:red' : '' }}" disabled value="" type="text" class="form-control" name="phone" id="phone" placeholder="{{__('front.phone')}}">
                            </div>
                            @if ($errors->has('phone'))
                                <div class="col-sm-8">
                                    <label></label>
                                    <strong style="color: red;">{{ $errors->first('phone') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label {{ $errors->has('email') ? ' has-error' : '' }}">{{__('front.email')}}</label>
                            <div class="col-sm-8">
                                <input style="{{ $errors->has('email') ? 'border-color:red' : '' }}" type="text" class="form-control" name="email" placeholder="{{__('front.email')}}">
                            </div>
                            @if ($errors->has('email'))
                                <div class="col-sm-8">
                                    <label></label>
                                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>


                        <div class="mb-3 form-group row mt-5 border p-4 align-items-center justify-content-between">
                            <div class="">
                                <input required type="checkbox" name="term">
                                <span class="policy">{{__('front.read_accept')}}
                                      <a href="#">{{__('front.terms')}}</a>.
                                    </span>
                            </div>

                            <button disabled id="register" type="submit" class="btn btn-main confirm-btn mt-3 mt-lg-0" title="{{__('front.verifysms')}}">{{__('front.register')}}</button>
                        </div>
                    </form>
                </div>

            </div>
            <div id="login" class="border h-50 border-dark col-md-6 mt-2 col-lg-6 mt-5 @if(App::isLocale('ar')) mr-3 text-right @else ml-3  @endif">
                <div class=" payment-form py-6">
                    <h3 class="mt-2 headline mb-4 font-weight-bold border-bottom pb-3">{{__('front.login')}}</h3>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">{{__('front.email')}}</label>
                            <div class="col-sm-8">
                                <input style="{{ $errors->has('email') ? 'border-color:red' : '' }}" type="text" class="form-control" name="email" placeholder="{{__('front.email')}}">
                            </div>
{{--                            {{dd(App::getLocale())}}--}}
                            @if ($errors->has('email'))
                                <div class="col-sm-8">
                                    <label></label>
                                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label {{ $errors->has('password') ? ' has-error' : '' }}">{{__('front.password')}}</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" placeholder="{{__('front.password')}}">
                            </div>
                        </div>

                        <button type="submit" class="mb-2 btn btn-main confirm-btn mt-3 mt-lg-0">{{__('front.login')}}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyArEtV-6UZhvrW-tanQ2hWLWs58xnWQpYE",
            authDomain: "makka-sandwitch.firebaseapp.com",
            projectId: "makka-sandwitch",
            storageBucket: "makka-sandwitch.appspot.com",
            messagingSenderId: "24019890063",
            appId: "1:24019890063:web:23f6c3c4d50df5db1f65fa",
            measurementId: "G-1E5YXMD1HC"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            // alert('sent');
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("{{__('front.messagesent')}}");
                $("#successAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("{{__('front.authsuccess')}}");
                $("#successOtpAuth").show();
                $("#register").removeAttr('disabled');
                document.getElementById('phone').value = document.getElementById('number').value;
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>
@endsection
