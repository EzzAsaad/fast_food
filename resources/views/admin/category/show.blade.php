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
                <span style="background-color: #272E38;color: white;" class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">{{__('category.showcategory')}}</span>
            </li>
        </ul>
        <div class="js-wizard-validation-form" @if(App::isLocale('ar')) dir="rtl"@endif enctype="multipart/form-data">

            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    @if($category->image != '')
                    <div class="form-group">
                        <img class="img-fluid w-50 h-50 d-block mx-auto" src="{{asset($category->image)}}">
                    </div>
                    @endif
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.categorynamear')}}</label>
                            <?php
                            $name = json_decode($category->name);
                            $namear = $name->ar;
                            $nameen = $name->en;
                            ?>
                            <input required class="form-control" disabled value="{{$namear}} @if($errors->has('nameAr')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="nameAr">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.categorynameen')}}</label>
                            <input required disabled value="{{$nameen}}" class="form-control @if($errors->has('nameEn')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="nameEn">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('category.code')}}</label>
                            <input required disabled value="{{$category->code}}" class="form-control @if($errors->has('code')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="code">
                        </div>

                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('category.status')}}</label>
                            @if($category->status == 1)
                                <h2><span class="badge badge-success">{{__('category.active')}}</span></h2>
                            @else
                                <h2><span class="badge badge-danger">{{__('category.deactive')}}</span></h2>
                            @endif
                        </div>
                    </div>
                    @if(count($suCategories ) >0)
                    <table @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>{{__('category.code')}}</th>
                            <th>{{__('category.categorynamear')}}</th>
                            <th>{{__('category.categorynameen')}}</th>
                            <th>{{__('category.status')}}</th>

                        </tr>

                            @if(count($suCategories ) >0)
                            @for($i = 0; $i < count($suCategories) ;$i++)
                            <tr>
                            <td><input disabled type="text" name="subcode[0]" value="{{$suCategories[$i]->code}}"  class="form-control" />
                            </td>
                                <?php
                                    $name = json_decode($suCategories[$i]->name);
                                    //dd($name);
                                ?>
                            <td><input disabled type="text" name="subnamear[0]" value="{{$name->ar}}" class="form-control" />
                            </td>
                            <td><input disabled type="text" name="subnameen[0]" value="{{$name->en}}" placeholder="" class="form-control" /></td>
                            @if($suCategories[$i]->status == 1)
                                <td><h2><span class="badge badge-success">{{__('category.active')}}</span></h2></td>
                            @else
                                <td><h4><span class="badge badge-danger">{{__('category.deactive')}}</span></h4></td>
                            @endif
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
                            <a href="{{route('Admin.ViewAllCategories')}}"><button type="submit" class="btn btn-alt-primary @if(App::isLocale('ar'))text-right @endif mx-auto d-block" data-wizard="next">
                                {{__('category.back')}} <i class="fa fa-angle-right ml-1"></i>
                            </button></a>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
        </div>
    </div>
    {{--    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="subcode['+i+']"  class="form-control" /><td><input type="text" name="subnamear['+i+']"  class="form-control" /> </td> <td><input type="text" name="subnameen['+i+']" placeholder="" class="form-control" /></td> <td><select class="form-control @if($errors->has('status')) is-invalid @endif "  id="wizard-validation-lastname" name="substatus['+i+']"> <option value="1">{{__('category.active')}}</option> <option value="0">{{__('category.deactive')}}</option> </select></td> <td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></td></tr>');
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endsection

