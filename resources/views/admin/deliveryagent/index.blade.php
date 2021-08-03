@extends('admin.layouts.app')
@section('content')
    @if(isset($deliveries) && $deliveries->count() > 0 )
        @if(session()->has('success'))
            <div class="alert alert-primary text-right" style="width:100%">
                {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <!-- Bordered Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title @if(App::isLocale('ar'))text-right @endif " style="font-size:15px;font-weight:bold">{{__('delivery.showallemployees')}}</h3>

                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter" @if(App::isLocale('ar')) dir="rtl" @endif>
                        <thead>
                        <tr>
                            <th class="" style="width: 50px;">#</th>
                            <th class="text-center">{{__('delivery.name')}}</th>
                            <th  class="text-center">{{__('delivery.email')}}</th>
                            <th class="text-center">{{__('delivery.address')}}</th>
                            <th class="text-center">{{__('delivery.phone')}}</th>
                            <th class="text-center">{{__('delivery.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($deliveries as $delivery)
                            <tr>
                                <th class="text-center" scope="row">{{ $delivery->id }}</th>
                                <th class="text-center" scope="row"><a href="{{route('Admin.ShowDriver',['id'=>$delivery->id])}}">{{ $delivery->name }}</a></th>

{{--                                <td class="font-w600 font-size-sm">--}}
{{--                                    <?php--}}
{{--                                    //use Illuminate\Support\Facades\Lang;--}}
{{--                                    $lang = json_decode($delivery->name);--}}
{{--                                    if (App::isLocale('en')) {--}}
{{--                                        $lang = $lang->en;--}}
{{--                                    }else{--}}
{{--                                        $lang = $lang->ar;--}}
{{--                                    }--}}
{{--                                    ?>--}}
{{--                                    <a href="{{route('Admin.ShowCategory',['id'=>$delivery->id])}}">{{ $lang }}</a>--}}
{{--                                </td>--}}
                                <th class="text-center" scope="row">{{ $delivery->email }}</th>
                                <th class="text-center" scope="row">{{ $delivery->address }}</th>
                                <th class="text-center" scope="row">{{ $delivery->phone }}</th>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('Admin.UpdateDriver',['id'=>$delivery->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="{{__('delivery.edit')}}">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('Admin.DeleteDriver',['id'=>$delivery->id])}}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="{{__('delivery.delete')}}">
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
        <h5 style="font-size:14px; position:relative;left:40%">{{__('delivery.empty')}}</h5>
    @endif
@endsection
