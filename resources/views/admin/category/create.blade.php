@extends('admin.layouts.app')
@section('content')
    <!-- Validation Wizards -->
    @if(session()->has('success'))
        <div class="alert alert-success text-right" style="width:100%">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="js-wizard-validation block block @if(App::isLocale('ar')) text-right @endif " style="width:100%;" >
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
            <li class="nav-item">
                <span style="background-color: #272E38;color: white;" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('category.addnewcategory')}}</span>
            </li>
        </ul>
        <form class="js-wizard-validation-form" @if(App::isLocale('ar')) dir="rtl"@endif action="{{ route('Admin.StoreCategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.categorynamear')}}</label>
                            <input required class="form-control @if($errors->has('nameAr')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="nameAr">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.categorynameen')}}</label>
                            <input required class="form-control @if($errors->has('nameEn')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="nameEn">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.code')}}</label>
                            <input required class="form-control @if($errors->has('code')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="code">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('category.status')}}</label>
                            <select  class="form-control   @if($errors->has('status')) is-invalid @endif "  @if(App::isLocale('ar'))dir="rtl" @endif id="wizard-validation-lastname" name="status">
                                <option value="1">{{__('category.active')}}</option>
                                <option value="0">{{__('category.deactive')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-block" for="image">{{__('category.addphoto')}}</label>
                        <input type="file" id="image" name="image" >
                    </div>
                    <div class="form-group">
                        <label class="d-block" for="add_sub_cat">{{__('category.addsubcat')}}</label>
                        <input onchange="return showtable()" type="checkbox" id="add_sub_cat" name="add_sub_cat" >
                    </div>

                    <table hidden @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>{{__('category.code')}}</th>
                            <th>{{__('category.categorynamear')}}</th>
                            <th>{{__('category.categorynameen')}}</th>
                            <th>{{__('category.status')}}</th>
{{--                            <th>{{__('category.addphoto')}}</th>--}}
                            <th></th>

                        </tr>
                        <tr>
                            <td><input type="text" name="subcat[0][code]"  class="form-control" />
                            </td>
                            <td><input type="text" name="subcat[0][namear]"  class="form-control" />
                            </td>
                            <td><input type="text" name="subcat[0][nameen]" placeholder="" class="form-control" /></td>
                            <td><select class="form-control @if($errors->has('status')) is-invalid @endif "  id="wizard-validation-lastname" name="subcat[0][status]">
                                    <option value="1">{{__('category.active')}}</option>
                                    <option value="0">{{__('category.deactive')}}</option>
                                </select></td>
{{--                            <td><input type="file" id="image" name="subcat[0][image]" ></td>--}}
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">{{__('category.addsubcategory')}}</button></td>

                        </tr>
                    </table>
                </div>

                <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                {{__('category.send')}} <i class="fa fa-angle-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
        </form>
    </div>
{{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            // <td><input type="file" id="image" name="subcat['+i+'][image]" ></td>
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="subcat['+i+'][code]"  class="form-control" /><td><input type="text" name="subcat['+i+'][namear]"  class="form-control" /> </td> <td><input type="text" name="subcat['+i+'][nameen]" placeholder="" class="form-control" /></td> <td><select class="form-control @if($errors->has('status')) is-invalid @endif "  id="wizard-validation-lastname" name="subcat['+i+'][status]"> <option value="1">{{__('category.active')}}</option> <option value="0">{{__('category.deactive')}}</option> </select></td> <td><button type="button" class="btn btn-outline-danger remove-input-field">{{__('category.delete')}}</button></td></td></tr>');
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
        let showtable = ()=>{
            let table = document.querySelector('#dynamicAddRemove');
            let add_sub_cat = document.querySelector('#add_sub_cat');
            if(table.hasAttribute('hidden') && add_sub_cat){
                table.removeAttribute('hidden');
            }else if(!document.querySelector('#add_sub_cat:checked')){
                table.setAttribute('hidden',true);
            }
        }
    </script>
@endsection

