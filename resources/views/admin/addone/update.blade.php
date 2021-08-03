@extends('admin.layouts.app')
@section('content')
    <!-- Validation Wizards -->
    @if(session()->has('success'))
        <div class="alert alert-success text-right" style="width:100%">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="js-wizard-validation block block @if(App::isLocale('ar'))text-right @endif" style="width:100%;" >
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
            <li class="nav-item">
                <span class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('addone.updateaddon')}}</span>
            </li>
        </ul>
        <form class="js-wizard-validation-form" action="{{ route('Admin.editAddone') }}" method="POST" enctype="multipart/form-data" @if(App::isLocale('ar')) dir="rtl" @endif>
            @csrf
            <input type="hidden" value="{{$addone->id}}" name="id">
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    @if($addone->image != '')
                        <div class="form-group">
                            <img style="height: 150px;width: 150px" class="img-fluid  d-block mx-auto" src="{{asset($addone->image)}}">
                        </div>
                    @endif
                        <?php
                        $name = json_decode($addone->name);
                        ?>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('addone.addonear')}}</label>
                            <input value="{{$name->ar}}" class="form-control" type="text" id="wizard-validation-firstname" name="namear">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('addone.addoneen')}}</label>
                            <input value="{{$name->en}}" class="form-control" type="text" id="wizard-validation-firstname" name="nameen">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wizard-validation-lastname">{{__('addone.price')}}</label>
                        <input value="{{$addone->price}}" class="form-control" type="text" id="wizard-validation-lastname" name="price">
                    </div>
                    <div class="form-group">
                        <label for="wizard-validation-lastname">{{__('addone.status')}}</label>
                        <select class="form-control"  id="wizard-validation-lastname" name="status">
                            <option @if($addone->status == 1) selected @endif value="1">{{__('addone.active')}}</option>
                            <option @if($addone->status == 2) selected @endif value="0">{{__('addone.deactive')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="d-block" for="image">{{__('addone.addimage')}}</label>
                        <input type="file" id="image" name="image" >
                    </div>

                </div>

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                {{__('addone.send')}} <i class="fa fa-angle-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
        </form>
    </div>
@endsection

