@extends('admin.layouts.app')
@section('content')
    @if( $Prod_Categ!==null && $Prod_Categ->count() > 0)
        @if(session()->has('success'))
            <div class="alert alert-primary text-right" style="width:100%">
                {{ session()->get('success') }}
            </div>
        @endif

        <div>
            <!-- Bordered Table -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title @if(App::isLocale('ar')) text-right @endif" style="font-size:15px;font-weight:bold">{{__('product.control')}}</h3>

                </div>
                <div class="block-content">
                    <table   class="table table-responsive table-bordered table-vcenter" @if(App::isLocale('ar'))dir="rtl" @endif>
                        <thead>
                        <tr>
                            <th class="" style="width: 5%;">#</th>
                            <th class="text-center" style="width: 10%">{{__('product.code')}}</th>
                            <th  class="text-center" style="width: 10%">{{__('product.name')}}</th>
                            <th class="text-center" style="width: 10%">{{__('product.slug')}}</th>
                            <th class="text-center" style="width: 10%">{{__('product.quantity')}}</th>
                            <th class="text-center" style="width: 10%">{{__('product.category')}}</th>
                            <th class="text-center" style="width: 10%">{{__('product.available')}}</th>
                            <th class="text-center" style="width: 10%">{{__('product.status')}}</th>
                            <th class="text-center" style="width: 10%">{{__('product.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($Prod_Categ as $product)
                            <tr>
                                <th class="text-center" scope="row">{{ $product->id }}</th>
                                <td class="font-w600 font-size-sm">
                                    {{ $product->code }}
                                </td>
                                <?php
                                $name = json_decode($product->name);
                                if(App::isLocale('ar')){
                                    $name = $name->ar;
                                }else{
                                    $name = $name->en;
                                }
                                ?>
                                <td class="font-w600 font-size-sm">
                                    <a href="{{route('Admin.ShowProduct',['id'=>$product->id])}}">{{ $name }}</a>
                                </td>
                                <td class="font-w600 font-size-sm">
                                    {{ $product->slug }}
                                </td>
                                <td class="font-w600 font-size-sm">
                                    {{ $product->quantity }}
                                </td>
                                <td class="font-w600 font-size-sm">
                                    <?php
                                    //use Illuminate\Support\Facades\Lang;
                                    $lang = json_decode($product->catName);
                                    if (App::isLocale('en')) {
                                        $lang = $lang->en;
                                    }else{
                                        $lang = $lang->ar;
                                    }
                                    ?>
                                    <span class="badge badge-warning">{{ $lang }}</span>
                                </td>
                                <td class="font-w600 font-size-sm">
                                    @if($product->available)
                                        <span class="badge badge-success">{{__('product.available_true')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{__('product.available_false')}}</span>
                                    @endif
                                </td>
                                <td class="font-w600 font-size-sm">
                                    @if($product->status)
                                        <span class="badge badge-success">{{__('product.active')}}</span>
                                    @else
                                        <span class="badge badge-danger">{{__('product.deactive')}}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        {{--                                        <a href="{{route('Admin.ChangeStatus',['id'=>$product->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="تعديل الحالة">--}}
                                        {{--                                            <i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--                                        </a>--}}
                                        <a href="{{route('Admin.UpdateProduct',['id'=>$product->id])}}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="{{__('product.edit')}}">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('Admin.DeleteProduct',['id'=>$product->id])}}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="{{__('product.delete')}}">
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
        <h5 style="font-size:14px; position:relative;left:40%">{{__('product.empty')}}</h5>
    @endif
@endsection
