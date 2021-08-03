@extends('admin.layouts.app')
@section('content')
    <!-- Validation Wizards -->
    @if(session()->has('success'))
    <div class="alert alert-success text-right" style="width:100%">
        {{session()->get('success')}}
    </div>
    @endif
            <div class="js-wizard-validation block block @if(App::isLocale('ar'))text-right @endif" >
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  data-toggle="tab" style="font-size:17px;">{{ isset($social)? __('settings.editsocial') : __('settings.addsocial') }}</a>
                    </li>
                </ul>
                <form class="js-wizard-validation-form" action="{{ isset($social)? route('Admin.updateSocialMedia', $social->id) : route('Admin.storeSocialMedia') }}" method="POST" enctype="multipart/form-data" @if(App::isLocale('ar')) dir="rtl" @endif >
                    @csrf
                    <div class="block-content block-content-full tab-content px-md-5">
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-firstname">{{__('settings.name')}} </label>
                                <input class="form-control" type="text" id="wizard-validation-firstname" name="name" value="{{ isset($social)? $social->name : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">{{__('settings.link')}}</label>
                                <input class="form-control" type="text" id="wizard-validation-lastname" name="link" value="{{ isset($social)? $social->link : ''}}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">{{__('settings.image')}}</label> <br>
                                @if(isset($social))
                                    <img src="{{ asset($social->icon) }}" style="width:50px;height:50px" /> <br>
                                @endif
                                <input class="form-control" type="file" id="wizard-validation-lastname" name="icon" >
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">{{__('settings.status')}}</label>
                                <select class="form-control" type="password" id="wizard-validation-lastname" name="status">
                                    <option value="1" @if(isset($social) && $social->status == 1) selected @endif>{{__('settings.active')}}</option>
                                    <option value="0" @if(isset($social) && $social->status == 0) selected @endif>{{__('settings.deactive')}} </option>
                                </select>
                            </div>
                        </div>

                    <!-- Steps Navigation -->
                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                        <div class="row">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-alt-primary text-right" data-wizard="next">
                                    {{__('settings.send')}} <i class="fa fa-angle-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                </form>
            </div>
@endsection
