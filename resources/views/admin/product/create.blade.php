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
                <span style="background-color: #272E38;color: white;" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('product.create')}}</span>
            </li>
        </ul>
        <form class="js-wizard-validation-form" action="{{ route('Admin.StoreProduct') }}" method="POST" enctype="multipart/form-data" @if(App::isLocale('ar'))dir="rtl" @endif >
            @csrf
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.prodar')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-firstname" name="namear">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.proden')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-firstname" name="nameen">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname"> {{__('product.code')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-firstname" name="code">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('product.slug')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-lastname" name="slug">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.price')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-firstname" name="price">
                        </div>
                        <div class="form-group col-6">
                            <label class="d-block" for="image">{{__('product.new_price')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-firstname" name="new_price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('product.quantity')}}</label>
                            <input class="form-control" type="text" id="wizard-validation-firstname" name="quantity">
                        </div>
                        <div class="form-group col-6">
                            <label class="d-block" for="image">{{__('product.image')}}</label>
                            <input type="file" id="image" name="image" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="wizard-validation-lastname">{{__('product.status')}}</label>
                            <select  size="2" class="form-control"  id="wizard-validation-lastname" name="status">
                                <option value="1">{{__('product.active')}}</option>
                                <option value="0">{{__('product.deactive')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="wizard-validation-lastname">{{__('product.available')}}</label>
                            <select size="2" class="form-control"  id="wizard-validation-lastname" name="available">
                                <option value="1">{{__('product.available_true')}}</option>
                                <option value="0">{{__('product.available_false')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label for="wizard-validation-lastname">{{__('product.category')}}</label>
                            <select size="{{count($categories)}}" class="form-control"  id="wizard-validation-lastname" name="category">
                                @foreach($categories as $category)
                                    <?php
                                    //use Illuminate\Support\Facades\Lang;
                                    $lang = json_decode($category->name);
                                    if (App::isLocale('en')) {
                                        $lang = $lang->en;
                                    }else{
                                        $lang = $lang->ar;
                                    }
                                    ?>
                                    {{ $lang }}
                                    <option value="{{$category->id}}">{{$lang}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <table @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>{{__('product.prodsizenamear')}}</th>
                            <th>{{__('product.prodsizenameen')}}</th>
                            <th>{{__('product.price')}}</th>
                            <th>{{__('product.quantity')}}</th>
                            <th></th>

                        </tr>
                        <tr>
                            <td><input required type="text" name="prodsize[0][namear]"  class="form-control" />
                            </td>
                            <td><input required type="text" name="prodsize[0][nameen]"  class="form-control" />
                            </td>
                            <td><input required type="number" name="prodsize[0][price]" placeholder="" class="form-control" /></td>
                            <td><input required type="number" name="prodsize[0][quantity]" placeholder="" class="form-control" /></td>

                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">{{__('product.addprodsize')}}</button></td>

                        </tr>
                    </table>


                </div>

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                {{__('product.send')}} <i class="fa fa-angle-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
        </form>
    </div>
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="prodsize['+i+'][namear]"  class="form-control" /><td><input type="text" name="prodsize['+i+'][nameen]"  class="form-control" /> </td> <td><input type="number" name="prodsize['+i+'][price]" placeholder="" class="form-control" /></td> <td><input required type="number" name="prodsize['+i+'][quantity]" placeholder="" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field">{{__('product.delete_prodsize')}}</button></td></td></tr>');
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endsection

