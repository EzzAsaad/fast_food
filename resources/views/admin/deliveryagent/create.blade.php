@extends('admin.layouts.app')
@section('content')
    <div class=" @if(App::isLocale('ar')) text-right @endif" @if(App::isLocale('ar')) dir="rtl" @endif>
        <!-- Sign In Block -->
        <div class="block block-rounded block-themed mb-0" >
            <div class="block-header bg-primary-dark">
                <h3 class="block-title @if(App::isLocale('ar')) text-right @endif" >{{__('delivery.create')}}</h3>
            </div>
            <div class="block-content">
                <div class="p-sm-3 px-lg-4 py-lg-5">
                    <h1 class="h2 mb-1"> {{__('delivery.adduser')}}</h1>
                    <p class="text-muted">
                        {{__('delivery.userinfo')}}
                    </p>
                    <form class="js-validation-signin" action="{{ route('Admin.StoreDriver') }}" method="POST" @if(App::isLocale('ar')) dir="rtl" @endif>
                        @csrf
                        <div class="py-3">
                            <div class="row">
                                <div class="col">
                                    <label for="">{{__('delivery.name')}}</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="name"  > <br>
                                </div>
                                <div class="col">
                                    <label for="">{{__('delivery.email')}}</label>
                                    <input type="email" class="form-control form-control-alt form-control-lg" id="login-username" name="email" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">{{__('delivery.password')}}</label>
                                    <input type="password" class="form-control form-control-alt form-control-lg" id="login-username" name="password"  > <br>
                                </div>
                                <div class="col">
                                    <label for="">{{__('delivery.phone')}}</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="phone" > <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">{{__('delivery.area')}}</label>
                                    <select class="form-control form-control-alt form-control-lg" id="login-username" name="area" >
                                        @foreach($areas as $a)
                                            <option value="{{$a->id}}"> {{ $a->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('delivery.address')}} </label>
                                <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="address" >  <br>
                            </div>
                            <div class="form-group">
                                <label for="">{{__('delivery.status')}}</label>

                                <select class="form-control form-control-alt form-control-lg" id="login-username" name="status">
                                    <option value="0" >{{__('delivery.active')}}</option>
                                    <option value="1" >{{__('delivery.deactive')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="d-block" for="image">{{__('delivery.image')}}</label>
                                <input type="file" id="image" name="image" >
                            </div>


                        </div>
                        <div class="form-group row">
                            <div class="mx-auto w-25">
                                <button type="submit" class="btn mx-auto btn-block btn-alt-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i>{{__('delivery.save')}}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- END Sign In Form -->
                </div>
            </div>
        </div>
        <!-- END Sign In Block -->
    </div>


@endsection
