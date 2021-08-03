@extends('front.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div hidden id="verify_sms" class="container mt-5" style="max-width: 550px">

                <div class="alert alert-danger" id="error" style="display: none;"></div>

                <h3>Add Phone Number</h3>

                <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                <form>
                    <label>Phone Number:</label>

                    <input type="text" id="number" class="form-control" placeholder="+91 ********">

                    <div id="recaptcha-container"></div>

                    <button type="button" class="btn btn-primary mt-3" onclick="return sendOTP();">Send OTP</button>
                </form>


                <div class="mb-5 mt-5">
                    <h3>Add verification code</h3>

                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

                    <form>
                        <input type="text" id="verification" class="form-control" placeholder="Verification code">
                        <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
                    </form>
                </div>
            </div>
{{--            <div  id="register" class="col-md-6 col-md-offset-2">--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading">Register</div>--}}
{{--                    <div class="panel-body">--}}
{{--                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/register') }}">--}}
{{--                            {{ csrf_field() }}--}}

{{--                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
{{--                                <label for="name" class="col-md-4 control-label">Name</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>--}}

{{--                                    @if ($errors->has('name'))--}}
{{--                                        <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('name') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">--}}

{{--                                    @if ($errors->has('email'))--}}
{{--                                        <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--                                <label for="password" class="col-md-4 control-label">Password</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control" name="password">--}}

{{--                                    @if ($errors->has('password'))--}}
{{--                                        <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
{{--                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

{{--                                    @if ($errors->has('password_confirmation'))--}}
{{--                                        <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('password_confirmation') }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-6 col-md-offset-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        Register--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div id="register" class="col-md-12 mt-2 col-lg-8">
                        <div class=" payment-form py-6">
                            <h3 class="headline mb-4 font-weight-bold border-bottom pb-3">{{__('front.register')}}</h3>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/register') }}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label {{ $errors->has('name') ? ' has-error' : '' }}">{{__('front.username')}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" placeholder="name">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label {{ $errors->has('password') ? ' has-error' : '' }}">{{__('front.password')}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="password" placeholder="{{__('front.password')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">{{__('front.confirmpassword')}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="password_confirmation" placeholder="{{__('front.password')}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label {{ $errors->has('phone') ? ' has-error' : '' }}">{{__('front.phone')}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="phone" placeholder="{{__('front.phone')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label {{ $errors->has('email') ? ' has-error' : '' }}">{{__('front.email')}}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email" placeholder="{{__('front.email')}}">
                                    </div>
                                </div>


                                <div class="form-group row mt-5 border p-4 align-items-center justify-content-between">
                                    <div class="">
                                        <input required type="checkbox" name="term">
                                        <span class="policy">{{__('front.read_accept')}}
                                      <a href="#">{{__('front.terms')}}</a>.
                                    </span>
                                    </div>

                                    <button type="submit" class="btn btn-main confirm-btn mt-3 mt-lg-0">{{__('front.register')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8 col-md-offset-2">--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading">Login</div>--}}
{{--                    <div class="panel-body">--}}
{{--                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/login') }}">--}}
{{--                            {{ csrf_field() }}--}}

{{--                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>--}}

{{--                                    @if ($errors->has('email'))--}}
{{--                                        <span class="help-block">--}}
{{--                                            <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--                                <label for="password" class="col-md-4 control-label">Password</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control" name="password">--}}

{{--                                    @if ($errors->has('password'))--}}
{{--                                        <span class="help-block">--}}
{{--                                            <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-6 col-md-offset-4">--}}
{{--                                    <div class="checkbox">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" name="remember"> Remember Me--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-8 col-md-offset-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        Login--}}
{{--                                    </button>--}}

{{--                                    <a class="btn btn-link" href="{{ url('/customer/password/reset') }}">--}}
{{--                                        Forgot Your Password?--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- The core Firebase JS SDK is always required and must be listed first -->
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
            alert('sent');
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
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
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
                $("#register").removeAttr('hidden');
                let verifysms = document.querySelector('#verify_sms');
                verifysms.hidden=true;
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>
@endsection
