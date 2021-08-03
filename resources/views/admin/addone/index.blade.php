@extends('admin.layouts.app')
@section('content')
    @if(isset($adons) && $adons->count() > 0)
        @if(session()->has('success'))
            <div class="alert alert-primary @if(App::isLocale('ar')) text-right @endif" style="width:100%">
                {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <!-- Bordered Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title @if(App::isLocale('ar')) text-right @endif" style="font-size:15px;font-weight:bold">{{__('addone.controladdone')}}</h3>

                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter" @if(App::isLocale('ar'))dir="rtl" @endif>
                        <thead>
                        <tr>
                            <th class="" style="width: 50px;">#</th>
                            <th class="text-center">{{__('addone.addone')}}</th>
                            <th  class="text-center">{{__('addone.price')}}</th>
                            <th class="text-center">{{__('addone.status')}}</th>
                            <th class="text-center">{{__('addone.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($adons as $addone)
                            <tr>
                                <th class="text-center" scope="row">{{ $addone->id }}</th>
                                <td class="font-w600 font-size-sm">
                                    <?php
                                        $name = json_decode($addone->name);
                                        if(App::isLocale('ar')){
                                            $name = $name->ar;
                                        }else{
                                            $name = $name->en;
                                        }
                                    ?>
                                    <a href="{{route('Admin.ShowAddone',['id'=>$addone->id])}}">{{ $name }}</a>
                                </td>
                                <td class="font-w600 font-size-sm">
                                    {{ $addone->price }}
                                </td>
                                <td class="font-w600 font-size-sm">
                                    @if($addone->status)
                                    <h4 style="margin-bottom: 0px"><span  class="badge badge-success">{{__('addone.active')}}</span></h4>
                                    @else
                                    <h4 style="margin-bottom: 0px"><span class="badge badge-danger">{{__('addone.deactive')}}</span></h4>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
{{--                                        <a href="{{route('Admin.ChangeStatus',['id'=>$addone->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="تعديل الحالة">--}}
{{--                                            <i class="fa fa-fw fa-pencil-alt"></i>--}}
{{--                                        </a>--}}
                                        <a href="{{route('Admin.UpdateAddone',['id'=>$addone->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="{{__('addone.edit')}}">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('Admin.DeleteAddone',['id'=>$addone->id])}}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="{{__('addone.delete')}}">
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
        <h5 style="font-size:14px; position:relative;left:40%">{{__('addone.empty')}}</h5>
    @endif
@endsection
