@extends('front.layouts.app')
@section('content')
    <form action='{{url('/create/order')}}' method='POST'>
        @csrf
        <div class="section cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table text-center table-cart" @if(App::isLocale('ar'))dir="rtl" @endif>
                                <thead>
                                <tr>
                                    <th scope="col" >{{__('front.prodname')}}</th>
                                    <th scope="col">{{__('front.prodsize')}}</th>
                                    <th scope="col">{{__('front.price')}}</th>
                                    <th scope="col">{{__('front.quantity')}}</th>
                                    <th scope="col">{{__('front.subtotal')}}</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $product)
                                <tr id="abId0.888403729209045">
                                    <th scope="row" class="text-center">

                                        <img src="" alt="" class="img-fluid w-25 mr-3">
                                        <input type="hidden" value="{{$product->id}}" name="prods[{{$product->id}}][id]">

                                        <?php
                                        $name = json_decode($product->name);
                                        if(App::isLocale('ar')){
                                            $name = $name->ar;
                                        }else{
                                            $name = $name->en;
                                        }
                                        ?>
                                        {{$name}}
                                    </th>
                                    <td>
                                        <select name="prods[{{$product->id}}][prod_size]" onchange="return changeprice(this,{{$product->id}})" class="form-control">
                                            <option disabled selected value="null">{{__('front.selectprodsize')}}</option>
                                            <?php $prod_size = \App\Models\Products_size::where('product_id',$product->product_id)->get()?>
                                            @foreach($prod_size as $prodsize)
                                                <?php
                                                $name = json_decode($prodsize->size);
                                                $name = App::isLocale('ar')? $name->ar: $name->en;
                                                ?>
                                                <option @if($prodsize->id == $product->products_size) selected @endif value="{{$prodsize->id}}">{{$name}}</option>
                                            @endforeach
                                            @foreach($prod_size as $prodsize)
                                                <input hidden id="prod{{$product->id}}_size_price{{$prodsize->id}}" value="{{$prodsize->price}}">
                                            @endforeach
                                        </select>
                                    </td>
                                    <?php $prod_size = \App\Models\Products_size::where('product_id',$product->product_id)->where('id',$product->products_size)->first()?>
                                    <input type="hidden" value="{{$product->product_id}}" name="prods[{{$product->id}}][prod_id]" >

                                    <td><span id="price_prod{{$product->id}}">{{$prod_size->price}}</span>L.E</td>
                                    <input type="hidden" value="{{$product->price}}" name="prods[{{$product->id}}][price_prod_hidden]" id="price_prod_hidden{{$product->id}}">
                                    <td id="abId0.23615714133168164"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected" id="abId0.49351435537941546" abineguid="3D39D7E4A0064F348811E69E6EB65DF1"><span class="input-group-btn input-group-prepend"></span><input  onchange="return changetotalprice({{$product->id}})" class="quantity form-control form-control-sm" type="text" value="{{$product->quantity}}" id="qty{{$product->id }}" name="quantity"><span class="input-group-btn input-group-append"></span></div></td>
                                    <input  type="hidden" id="prods[{{$product->id}}][qty]" name="prods[{{$product->id}}][qty]"  value="{{$product->quantity}}">
                                    <td><span id="subtotal{{$product->id}}">{{$product->price}}</span>L.E</td>
                                    <td class="text-right"><a href="{{url('/cart/delete',['id'=>$product->id])}}"><i class="ti-close close"></i></a></td>

                                    {{--                                <td class="text-right"><i class="ti-close close"></i></td>--}}
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-12">
                        <div class="table-responsive">

                            @if(count($addons) > 0)
                                <table class="table text-center table-cart" @if(App::isLocale('ar'))dir="rtl" @endif>
                                    <thead>
                                    <tr>
                                        <th scope="col" colspan="3">{{__('front.addonname')}}</th>
                                        <th scope="col">{{__('front.price')}}</th>
                                        <th scope="col">{{__('front.quantity')}}</th>
                                        <th scope="col">{{__('front.subtotal')}}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php //$i = 0?>
                                    @foreach($addons as $addon)
                                        <tr id="abId0.888403729209045">
                                            <td><input checked  name="addon[{{$addon->id}}][status]"  type="checkbox"></td>
                                            <input name="addon[{{$addon->id}}][prod_id]"  value="{{$addon->product_id}}" type="hidden">
                                            <input name="addon[{{$addon->id}}][id]"  value="{{$addon->id}}" type="hidden">

                                            <th scope="row" class="text-center">
                                                {{--                                    <img src="{{$product->image}}" alt="" class="img-fluid w-25 mr-3">--}}
                                                <?php
                                                $name = json_decode($addon->name);
                                                if(App::isLocale('ar')){
                                                    $name = $name->ar;
                                                }else{
                                                    $name = $name->en;
                                                }
                                                ?>
                                                {{$name}}
                                            </th>
                                            <td> </td>
                                            <?php $addon_price = \App\Models\addones::where('id',$addon->product_id)->first()->price ?>
                                            <td><span id="price_addon{{$addon->id}}">{{$addon_price}}</span>L.E</td>
                                            <td id="abId0.23615714133168164"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected" id="abId0.49351435537941546" abineguid="3D39D7E4A0064F348811E69E6EB65DF1"><span class="input-group-btn input-group-prepend"></span><input  onchange="return changetotalpriceaddon({{$addon->id}})" class="quantity form-control form-control-sm" type="text" value="{{$addon->quantity}}" id="qty_addon{{$addon->id}}" name="quantity_addon" ><span class="input-group-btn input-group-append"></span></div></td>
                                            <input  type="hidden" id="addon[{{$addon->id}}][qty]" name="addon[{{$addon->id}}][qty]" value="{{$addon->quantity}}">
                                            <input  type="hidden" id="addon[{{$addon->id}}][subtotal]" name="addon[{{$addon->id}}][subtotal]" value="{{$addon->price}}">
                                            <td><span id="subtotaladdon{{$addon->id}}">{{$addon->price}}</span>L.E</td>
                                            {{--                                <td class="text-right"><i class="ti-close close"></i></td>--}}
                                            <?php //$i += 1?>
                                            <td class="text-right"><a href="{{url('/cart/delete',['id'=>$addon->id])}}"><i class="ti-close close"></i></a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
{{--                                <button type="submit" class="@if(App::isLocale('en')) float-right @endif btn" style="background-color: red; color: white">{{__('front.send')}}</button>--}}

                        </div>
                    </div>
                </div>

                <div class="row mt-4   @if(App::isLocale('ar')) text-right @else justify-content-end @endif " @if(App::isLocale('ar')) dir="rtl" @endif>
                    <div class="col-6 px-xl-5 py-4 card border-0  ">
                        <div class="">
                            <h4 class="text-dark font-size-20">{{__('front.ordersummary')}}</h4>
                            <hr>
                            <p>{{__('front.ordersummaryinfo')}}.</p>
                        </div>

                        <div class="media align-items-center border-bottom font-weight-medium py-3">
                            <div class="media-body">
                                <span class="text-black">{{__('front.prodsubtotal')}}</span>
                            </div>
                            <span class="text-dark">237.00<span>L.E</span></span>
                        </div>

                        <div class="media align-items-center border-bottom font-weight-medium py-3">
                            <div class="media-body">
                                <span class="text-black">{{__('front.addonsubtotal')}}</span>
                            </div>
                            <span class="text-dark">237.00<span>L.E</span></span>
                        </div>

                        <div class="media justify-content-between align-items-center py-3">
                            <span class="text-dark ">{{__('front.total')}}</span>
                            <span class="text-dark font-weight-bold">237.00<span>L.E</span></span>
                        </div>

                        <button type="submit" class="btn btn-main mt-4">
                            {{__('front.checkout')}}
                        </button>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </section>
    </form>
    <script>
        let changeprice = (obj,id)=>{
            //alert('jaja');
            let price_prod = document.querySelector(`#price_prod${id}`);
            let quantity = document.querySelector(`#qty${id}`);
            //alert(price_prod.innerHTML+" "+quantity.value);
            //alert(document.querySelector(`#prod_size_price${obj.value}`).value);
            price_prod.innerHTML = document.querySelector(`#prod${id}_size_price${obj.value}`).value;
            document.querySelector(`#subtotal${id}`).innerHTML = parseInt(quantity.value)*parseInt(document.querySelector(`#prod${id}_size_price${obj.value}`).value);
            document.getElementById(`price_prod_hidden${id}`).value = parseInt(quantity.value)*parseInt(document.querySelector(`#prod${id}_size_price${obj.value}`).value);
            document.getElementById(`prods[${id}][qty]`).value = parseInt(quantity.value);
        }
        let changetotalprice = (id)=>{
            let price_prod = document.querySelector(`#price_prod${id}`);
            let quantity = document.querySelector(`#qty${id}`);
            //alert(price_prod +" " + quantity);
            document.getElementById(`subtotal${id}`).innerHTML = parseInt(quantity.value)*parseInt(price_prod.innerHTML);
            document.getElementById(`price_prod_hidden${id}`).value = parseInt(quantity.value)*parseInt(price_prod.innerHTML);
            document.getElementById(`prods[${id}][qty]`).value = parseInt(quantity.value);
            //alert(document.getElementById(`prods[${id}][qty]`).value);

        }


        let changetotalpriceaddon = (id)=>{
            let price_addon = document.querySelector(`#price_addon${id}`);
            let quantity_addon = document.querySelector(`#qty_addon${id}`);
            document.querySelector(`#subtotaladdon${id}`).innerHTML = parseInt(quantity_addon.value)*parseInt(price_addon.innerHTML);
            document.getElementById(`addon[${id}][subtotal]`).value = parseInt(quantity_addon.value)*parseInt(price_addon.innerHTML);
            document.getElementById(`addon[${id}][qty]`).value = quantity_addon.value;
        }
    </script>
@endsection
