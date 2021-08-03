@extends('admin.layouts.app')
@section('content')
    @if(isset($categories) && $categories->count() > 0 )
        @if(session()->has('success'))
            <div class="alert alert-primary text-right" style="width:100%">
                {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <!-- Bordered Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title @if(App::isLocale('ar'))text-right @endif " style="font-size:15px;font-weight:bold">{{__('category.showallcategories')}}</h3>

                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter" @if(App::isLocale('ar')) dir="rtl" @endif>
                        <thead>
                        <tr>
                            <th class="" style="width: 50px;">#</th>
                            <th class="text-center">{{__('category.code')}}</th>
                            <th  class="text-center">{{__('category.name')}}</th>
                            <th class="text-center">{{__('category.status')}}</th>
                            <th class="text-center">{{__('category.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($categories as $category)
                            <tr>
                                <th class="text-center" scope="row">{{ $category->id }}</th>
                                <th class="text-center" scope="row">{{ $category->code }}</th>
                                <td class="font-w600 font-size-sm">
                                    <?php
                                    //use Illuminate\Support\Facades\Lang;
                                    $lang = json_decode($category->name);
                                    if (App::isLocale('en')) {
                                        $lang = $lang->en;
                                    }else{
                                        $lang = $lang->ar;
                                    }
                                    ?>
                                    <a href="{{route('Admin.ShowCategory',['id'=>$category->id])}}">{{ $lang }}</a>
                                </td>
                                <td class="font-w600 font-size-sm">
                                    @if($category->status)
                                        <span class="badge badge-success">{{__('category.active')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{__('category.deactive')}}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('Admin.UpdateCategory',['id'=>$category->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="{{__('category.editcategory')}}">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('Admin.DeleteCategory',['id'=>$category->id])}}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="{{__('category.deletecategory')}}">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END Bordered Table -->
        </div>



        <!-- END All Orders Table -->


    @else
        <h5 style="font-size:14px; position:relative;left:40%">لا يوجد أي بيانات لعرضها</h5>
    @endif
@endsection
