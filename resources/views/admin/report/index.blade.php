@extends('admin.layouts.app')
@section('content')
    @if(isset($done_orders) && $done_orders->count() > 0 )
        @if(session()->has('success'))
            <div class="alert alert-primary text-right" >
                {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <!-- Bordered Table -->
            <div class="block block-rounded">
                <div class="block-header" @if(App::isLocale('ar'))dir="rtl" @endif>
                    <h3 class="block-title @if(App::isLocale('ar'))text-right @endif " style="font-size:15px;font-weight:bold">{{__('order.showallorders')}}</h3>
                    <button class=" btn btn-info"><a style="color: white!important;" href="{{route('Admin.ExportOrders')}}">{{__('report.export')}}</a></button>
                </div>
                <div  class="block-content">
                    <table  class="table table-bordered table-vcenter" @if(App::isLocale('ar')) dir="rtl" @endif>
                        <thead>
                        <tr>
                            <th class="" style="width: 50px;">#</th>
                            <th class="text-center">{{__('order.clientname')}}</th>
                            <th  class="text-center">{{__('order.phone')}}</th>
                            <th class="text-center">{{__('order.price')}}</th>
                            <th class="text-center">{{__('order.address')}}</th>
                            <th class="text-center">{{__('order.shipfees')}}</th>
                            <th class="text-center">{{__('order.status')}}</th>
{{--                            <th class="text-center">{{__('order.actions')}}</th>--}}
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($done_orders as $order)
                            <tr>
                                <th class="text-center" scope="row">{{ $order->id }}</th>
                                @if($order->name !='')
                                    <th class="text-center" scope="row">{{ $order->name }}</th>
                                @else
                                    <th class="text-center" scope="row">{{ $order->customer->name }}</th>
                                @endif
                                @if($order->phone !='')
                                    <th class="text-center" scope="row">{{ $order->phone }}</th>
                                @else
                                    <th class="text-center" scope="row">{{ $order->customer->phone }}</th>
                                @endif
                                <th class="text-center" scope="row">{{ $order->price }}</th>
                                <th class="text-center" scope="row">{{ $order->customer->address  }}</th>
                                <th class="text-center" scope="row">{{ $order->ship_fees }}</th>
                                <td class="font-w600 font-size-sm">
                                    @if($order->status == 1)
                                        <span class="badge badge-warning">{{__('order.neworder')}}</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-primary">{{__('order.inprogressorder')}}</span>
                                    @elseif($order->status == 3)
                                        <span class="badge badge-success">{{__('order.doneorder')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{__('order.canceledorder')}}</span>
                                    @endif
                                </td>

{{--                                <td class="text-center">--}}
{{--                                    <div class="btn-group">--}}
{{--                                        <a href="{{route('Admin.UpdateCategory',['id'=>$order->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="{{__('order.editorder')}}">--}}
{{--                                            <i class="fa fa-fw fa-pencil-alt"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{route('Admin.DeleteOrder',['id'=>$order->id])}}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="{{__('order.deleteorder')}}">--}}
{{--                                            <i class="fa fa-fw fa-times"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
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
