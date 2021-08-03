@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/customer/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="login" class="col-md-12 mt-2 col-lg-8">
            <div class=" payment-form py-6">
                <h3 class="headline mb-4 font-weight-bold border-bottom pb-3">{{__('front.register')}}</h3>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/login') }}">
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

                    <button type="submit" class="btn btn-main confirm-btn mt-3 mt-lg-0">{{__('front.login')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
