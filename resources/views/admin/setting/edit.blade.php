@extends('admin.layouts.app')
@section('content')
@if(isset($settings) && $settings->count() > 0)

<div class="text-right" dir="{{ App::isLocale('ar')? 'rtl': '' }}">
    <!-- Sign In Block -->
        <div class="block block-rounded block-themed mb-0" >
            <div class="block-header bg-primary-dark">
                <h3 class="block-title {{ App::isLocale('ar')? 'text-right' : 'text-left' }}" >{{trans('sidebar.SiteSettings')}} / {{trans('sidebar.HeaderSettings')}}   </h3>
            </div>
                @if(session()->has('success'))
                <div class="alert alert-primary text-right" >
                    {{ session()->get('success') }}
                    </div>
                @endif


            <div class="block-content">
                <div class="p-sm-3 px-lg-4 py-lg-5 {{ App::isLocale('ar')? 'text-right' : 'text-left'  }}">
                    <h1 class="h2 mb-1">{{trans('sidebar.HeaderSettings')}} </h1>
                    <p class="text-muted" >
                    {{trans('sidebar.HeaderSettingsInfo')}}

                    </p>
                    <form class="js-validation-signin" action="{{ route('Admin.UpdateSettings') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="py-3">
                            <div class="row">
                                <div class="col">
                                    <label for="">{{ trans('header.arTitle') }}</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="nameAr" value="{{ $settings->nameAr }}" > <br>
                                </div>
                                <div class="col">
                                <label for=""> {{ trans('header.enTitle') }} </label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="nameEn" value="{{ $settings->nameEn }}">  <br>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">  {{ trans('header.arDesc') }}</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="ArDesc"  >{{ $settings->ArDescription }}</textarea> <br>
                                </div>
                                <div class="col">
                                    <label for=""> {{ trans('header.arDesc') }}</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="EnDesc" >{{ $settings->EnDescription }}</textarea> <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">{{ trans('header.ArMetaDesc') }}</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="ArMetaDesc" >{{ $settings->ArMetaDescription }}</textarea> <br>
                                </div>
                                <div class="col">
                                    <label for="">{{ trans('header.enMetaDesc') }}</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="EnMetaDesc" >{{ $settings->EnMetaDescription }}</textarea> <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">{{ trans('header.arMeta') }}</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="ArMetaKey" >{{ $settings->ArMetaKeywords }}</textarea> <br>
                                </div>
                                <div class="col">
                                    <label for="">{{ trans('header.enMeta') }} </label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="EnMetaKey"  >{{ $settings->EnMetaKeywords }}</textarea> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">{{ trans('header.phone1') }}</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="phone" value="{{  $settings->phone}}"><br>
                                </div>
                                <div class="col">
                                    <label for="">{{ trans('header.phone2') }}</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="phone2" value="{{  $settings->phone2}}"> <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">{{ trans('header.email') }}</label>
                                <input type="email" class="form-control form-control-alt form-control-lg" id="login-username" name="email" value="{{  $settings->email}}" >
                            </div>
                            <div class="form-group">
                                <label for="">{{ trans('header.logo') }}</label><br>
                                @if(isset($settings->logo) && $settings->logo != '')
                                    <img src="{{ asset($settings->logo) }}" style="width:150px;height:150px;" />
                                @endif
                                <input type="file" class="form-control form-control-alt form-control-lg" id="login-username" name="logo" >
                            </div>
                            <div class="form-group">
                                <label for="">{{ trans('header.slider') }}</label><br>
                                <input type="file" class="form-control form-control-alt form-control-lg" id="login-username" name="slider[]" multiple >
                                @if(isset($settings->slider))
                                <?php  $arr = json_decode($settings->slider); ?>

                                    @foreach($arr as $a)
                                    <img src="{{ asset($a) }}" style="width:150px;height:150px;" />

                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">{{ trans('header.favIcon') }}</label><br>
                                @if(isset($settings->favIcon) && $settings->favIcon != '')
                                    <img src="{{ asset($settings->favIcon) }}" style="width:150px;height:150px;" />
                                @endif
                                <input type="file" class="form-control form-control-alt form-control-lg" id="login-username" name="favIcon" >
                            </div>
                            <div class="form-group">
                                <label for="">{{ trans('header.banner') }}</label><br>
                                @if(isset($settings->banner) && $settings->banner != '')
                                    <img src="{{ asset($settings->banner) }}" style="width:150px;height:150px;" />
                                @endif
                                <input type="file" class="form-control form-control-alt form-control-lg" id="login-username" name="banner" >
                            </div>
                            <div class="form-group">
                            <label for="">{{ trans('header.status') }}</label>

                                <select class="form-control form-control-alt form-control-lg" id="login-username" name="status">
                                    <option value="0" @if($settings->status == 0) selected @endif>{{  trans('header.StatusOn') }}</option>
                                    <option value="1" @if($settings->status == 1) selected @endif>{{  trans('header.StatusOff') }}</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group row justify-content-center" >
                            <div class="col-md-6 col-xl-5">
                                <button type="submit" class="btn mx-auto btn-block btn-alt-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{__('settings.save')}}
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

@endif
@endsection
