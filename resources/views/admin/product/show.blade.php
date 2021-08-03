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
                <span  style="background-color: #272E38;color: white;" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('product.productinfo')}}</span>
            </li>
        </ul>
        <div class="js-wizard-validation-form"  @if(App::isLocale('ar')) dir="rtl" @endif>
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    @if($Prod_Categ->image != '')
                        <div class="form-group">
                            {{--                        <input disabledabled type="file" id="image" name="image" >--}}

                            <img class="mx-auto d-block img-thumbnail" src="{{ asset($Prod_Categ->image) }}" style="width:150px;height:150px;" />

                        </div>
                    @endif
                    <?php
                        $name = json_decode($Prod_Categ->name);
                    ?>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.prodar')}}</label>
                            <input disabled value="{{$name->ar}}" class="form-control" type="text" id="wizard-validation-firstname" name="namear">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.proden')}}</label>
                            <input disabled value="{{$name->en}}" class="form-control" type="text" id="wizard-validation-firstname" name="nameen">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('product.code')}}</label>
                            <input disabled value="{{$Prod_Categ->code}}" class="form-control" type="text" id="wizard-validation-firstname" name="code">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('product.slug')}}</label>
                            <input disabled value="{{$Prod_Categ->slug}}" class="form-control" type="text" id="wizard-validation-lastname" name="slug">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('product.price')}}</label>
                            <input disabled value="{{$Prod_Categ->price}}" class="form-control" type="text" id="wizard-validation-firstname" name="code">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('product.new_price')}}</label>
                            <input disabled value="{{$Prod_Categ->new_price}}" class="form-control" type="text" id="wizard-validation-lastname" name="slug">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.quantity')}}</label>
                            <input disabled class="form-control" value="{{$Prod_Categ->quantity}}" type="text" id="wizard-validation-firstname" name="quantity">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="wizard-validation-lastname">{{__('product.status')}}</label>
                            @if($Prod_Categ->status == 1)
                                <h2><span class="badge badge-success">{{__('product.active')}}</span></h2>
                            @else
                                <h2><span class="badge badge-danger">{{__('product.deactive')}}</span></h2>
                            @endif
                        </div>
                        <div class="form-group col-4">
                            <label for="wizard-validation-lastname">{{__('product.available')}}</label>
                            @if($Prod_Categ->available == 1)
                                <h2><span class="badge badge-success">{{__('product.available_true')}}</span></h2>
                            @else
                                <h2><span class="badge badge-danger">{{__('product.available_false')}}</span></h2>
                            @endif
                        </div>
                        <div class="form-group col-4 ">
                            <label for="wizard-validation-lastname">{{__('product.category')}}</label>
                            <?php
                            //use Illuminate\Support\Facades\Lang;
                            $lang = json_decode($Prod_Categ->catName);
                            if (App::isLocale('en')) {
                                $lang = $lang->en;
                            }else{
                                $lang = $lang->ar;
                            }
                            ?>
                            <h2><span class="badge badge-warning">{{$lang}}</span></h2>
                        </div>
                        @if(count($prod_size) > 0)
                            <table @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>{{__('product.prodsizenamear')}}</th>
                                    <th>{{__('product.prodsizenameen')}}</th>
                                    <th>{{__('product.price')}}</th>
                                    <th>{{__('product.quantity')}}</th>
                                </tr>
                                <tr>
                                    @foreach($prod_size as $PS)
                                    <?php
                                        $name = json_decode($PS->size);
                                    ?>
                                    <td><input disabled type="text" value="{{$name->ar}}" name="prodsize[0][namear]"  class="form-control" />
                                    </td>
                                    <td><input disabled type="text" value="{{$name->en}}" name="prodsize[0][nameen]"  class="form-control" />
                                    </td>
                                    <td><input disabled type="text" value="{{$PS->price}}" name="prodsize[0][price]" placeholder="" class="form-control" /></td>
                                    <td><input disabled type="text" value="{{$PS->quantity}}" name="prodsize[0][price]" placeholder="" class="form-control" /></td>

                                </tr>
                                @endforeach
                            </table>
                        @endif

                    </div>
                </div>

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('Admin.ViewAllProducts')}}">
                                <button class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                    {{__('product.back')}} <i class="fa fa-angle-right ml-1"></i>
                                </button></a>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->

        </div>
    </div>
@endsection

