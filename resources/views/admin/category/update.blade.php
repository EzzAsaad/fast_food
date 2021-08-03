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
                <span style="background-color: #272E38;color: white;" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('category.editcategoryinfo')}}</span>
            </li>
        </ul>
        <form class="js-wizard-validation-form" action="{{ route('Admin.EditCategory') }}" method="POST" @if(App::isLocale('ar')) dir="rtl"@endif enctype="multipart/form-data">
            @csrf
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    @if($category->image != '')
                        <div class="form-group">
                            <img class="img-fluid w-50 h-50 d-block mx-auto" src="{{asset($category->image)}}">
                        </div>
                    @endif
                   <input type="hidden" value="{{$category->id}}" name="id">
                   <div class="row">
                       <div class="form-group col-6">
                           <label for="wizard-validation-firstname">{{__('category.categorynamear')}}</label>
                           <?php
                           $name = json_decode($category->name);
                           $namear = $name->ar;
                           $nameen = $name->en;
                           ?>
                           <input required class="form-control" value="{{$namear}} @if($errors->has('nameAr')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="nameAr">
                       </div>
                       <div class="form-group col-6">
                           <label for="wizard-validation-firstname">{{__('category.categorynameen')}}</label>
                           <input required value="{{$nameen}}" class="form-control @if($errors->has('nameEn')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="nameEn">
                       </div>
                   </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.code')}}</label>
                            <input required value="{{$category->code}}" class="form-control @if($errors->has('code')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="code">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('category.status')}}</label>
                            <select class="form-control   @if($errors->has('status')) is-invalid @endif "  @if(App::isLocale('ar'))dir="rtl" @endif id="wizard-validation-lastname" name="status">
                                <option @if($category->status==1) selected @endif value="1">{{__('category.active')}}</option>
                                <option @if($category->status!=1) selected @endif value="0">{{__('category.deactive')}}</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="d-block" for="image">{{__('category.addphoto')}}</label>
                        <input type="file" id="image" name="image" >
                    </div>
                    @if(count($suCategories ) >0)
                    <table @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>{{__('category.code')}}</th>
                            <th>{{__('category.categorynamear')}}</th>
                            <th>{{__('category.categorynameen')}}</th>
                            <th>{{__('category.status')}}</th>
{{--                            <th></th>--}}

                        </tr>

                        @if(count($suCategories ) >0)
                            @for($i = 0; $i < count($suCategories) ;$i++)
                                <tr>
                                    <input type="hidden" value="{{$suCategories[$i]->id}}" name="subCategory_id[{{$i}}]">
                                    <td><input type="text" name="subcode[{{$i}}]" value="{{$suCategories[$i]->code}}"  class="form-control" />
                                    </td>
                                    <?php
                                    $name = json_decode($suCategories[$i]->name);
                                    //dd($name);
                                    ?>
                                    <td><input type="text" name="subnamear[{{$i}}]" value="{{$name->ar}}" class="form-control" />
                                    </td>
                                    <td><input type="text" name="subnameen[{{$i}}]" value="{{$name->en}}" placeholder="" class="form-control" /></td>
                                    <td><select class="form-control @if($errors->has('status')) is-invalid @endif "  id="wizard-validation-lastname" name="substatus[{{$i}}]">
                                            <option value="1">{{__('category.active')}}</option>
                                            <option value="0">{{__('category.deactive')}}</option>
                                        </select></td>
{{--                                    @if($i==0)--}}
{{--                                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">{{__('category.addsubcategory')}}</button></td>--}}
{{--                                    @else--}}
{{--                                    <td><button type="button" class="btn btn-outline-danger remove-input-field">{{__('category.deletecategory')}}</button></td>--}}
{{--                                    @endif--}}
                                </tr>
                            @endfor
                        @else
                            <td colspan="4"><h5 style="font-size:14px; position:relative;left:40%">{{__('category.empty')}}</h5></td>
                        @endif

                    </table>
                    @endif
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
            </div>
        </form>
        {{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
        <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
        <script type="text/javascript">
            var i = parseInt({{count($suCategories)}})-1;
            $("#dynamic-ar").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><input type="text" name="subcode['+i+']"  class="form-control" /><td><input type="text" name="subnamear['+i+']"  class="form-control" /> </td> <td><input type="text" name="subnameen['+i+']" placeholder="" class="form-control" /></td> <td><select class="form-control @if($errors->has('status')) is-invalid @endif "  id="wizard-validation-lastname" name="substatus['+i+']"> <option value="1">{{__('category.active')}}</option> <option value="0">{{__('category.deactive')}}</option> </select></td> <td><button type="button" class="btn btn-outline-danger remove-input-field">{{__('category.deletecategory')}}</button></td></td></tr>');
            });
            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });

        </script>
@endsection

