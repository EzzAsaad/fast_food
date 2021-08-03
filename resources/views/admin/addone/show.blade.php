@extends('admin.layouts.app')
@section('content')
    <!-- Validation Wizards -->
    @if(session()->has('success'))
        <div class="alert alert-success text-right" style="width:100%">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="js-wizard-validation block block @if(App::isLocale('ar')) text-right @endif" style="width:100%;" >
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
            <li class="nav-item">
                <span style="color:white;background-color: #272E38;" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('addone.show')}}</span>
            </li>
        </ul>
        <div class="js-wizard-validation-form" @if(App::isLocale('ar'))dir="rtl"@endif>
            <input type="hidden" value="{{$addone->id}}" name="id">
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    @if($addone->image != '')
                        <div class="form-group">
                            <img class="mx-auto d-block" src="{{ asset($addone->image) }}" style="width:150px;height:150px;" />
                        </div>
                    @endif
                        <?php
                        $name = json_decode($addone->name);
                        ?>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('addone.addonear')}}</label>
                            <input disabled value="{{$name->ar}}" class="form-control" type="text" id="wizard-validation-firstname" name="name">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('addone.addoneen')}}</label>
                            <input disabled value="{{$name->en}}" class="form-control" type="text" id="wizard-validation-firstname" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wizard-validation-lastname">{{__('addone.price')}}</label>
                        <input disabled value="{{$addone->price}}" class="form-control" type="text" id="wizard-validation-lastname" name="price">
                    </div>
                    <div class="form-group">
                        <label for="wizard-validation-lastname">{{__('addone.status')}}</label>
                        @if($addone->status == 1)
                            <h2><span class="badge badge-success">{{__('addone.active')}}</span></h2>
                        @else
                            <h2><span class="badge badge-danger">{{__('addone.deactive')}}</span></h2>
                        @endif
                    </div>

                </div>

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('Admin.ViewAllAddons')}}">
                            <button class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                {{__('addone.back')}} <i class="fa fa-angle-right ml-1"></i>
                            </button></a>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
        </div>
    </div>
@endsection

