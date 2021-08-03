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
                <span style="background-color: #272E38;color: white" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('delivery.assignorders')}}</span>
            </li>
        </ul>
        <form class="js-wizard-validation-form" action="{{ route('Admin.AssignOrdersDrivers') }}" method="POST" enctype="multipart/form-data" @if(App::isLocale('ar'))dir="rtl" @endif>
            @csrf
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('delivery.orders')}}</label>
                            <select  class="form-control   @if($errors->has('orders')) is-invalid @endif "  @if(App::isLocale('ar'))dir="rtl" @endif id="wizard-validation-lastname" name="orders[]" MULTIPLE>
                                @foreach($orders as $order)
                                <option value="{{$order->id}}">{{$order->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('delivery.driver_name')}}</label>
                            <select  class="form-control   @if($errors->has('driver_id')) is-invalid @endif "  @if(App::isLocale('ar'))dir="rtl" @endif id="wizard-validation-lastname" name="driver_id" >
                                @foreach($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                {{__('delivery.send')}} <i class="fa fa-angle-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
        </form>
    </div>
@endsection

