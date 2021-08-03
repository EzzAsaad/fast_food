@extends('front.layouts.app')
@section('content')
    <form action='{{ url('/booking',['prod_id'=>$product->id])}}' method='POST'>
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
                            <tr id="abId0.888403729209045">
                                <th scope="row" class="text-center">
                                    <img src="{{$product->image}}" alt="" class="img-fluid w-25 mr-3">
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
                                    <select required name="prod_size" onchange="return changeprice(this)" class="form-control">
                                        <option disabled selected value="null">{{__('front.selectprodsize')}}</option>
                                        @foreach($prod_size as $prodsize)
                                            <?php
                                            $name = json_decode($prodsize->size);
                                            $name = App::isLocale('ar')? $name->ar: $name->en;
                                            ?>
                                        <option value="{{$prodsize->id}}">{{$name}}</option>
                                        @endforeach
                                        @foreach($prod_size as $prodsize)
                                            <input hidden id="prod_size_price{{$prodsize->id}}" value="{{$prodsize->price}}">
                                        @endforeach
                                    </select>
                                </td>
                                <?php
                                    if($product->new_price != 0){
                                        $price = $product->new_price;
                                    }else{
                                        $price = $product->price;
                                    }
                                ?>
                                <td><span id="price_prod">{{$price}}</span>L.E</td>
                                <input type="hidden" value="{{$price}}" name="price_prod_hidden" id="price_prod_hidden">
                                <td id="abId0.23615714133168164"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected" id="abId0.49351435537941546" abineguid="3D39D7E4A0064F348811E69E6EB65DF1"><span class="input-group-btn input-group-prepend"></span><input onchange="return changetotalprice()" class="quantity form-control form-control-sm" type="text" value="1" id="qty" name="quantity"><span class="input-group-btn input-group-append"></span></div></td>
                                <td><span id="subtotal">{{$price}}</span>L.E</td>
{{--                                <td class="text-right"><i class="ti-close close"></i></td>--}}
                            </tr>
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
                                <td><input name="addon[{{$addon->id}}][status]"  type="checkbox"></td>
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

                                <td><span id="price_addon{{$addon->id}}">{{$addon->price}}</span>L.E</td>
                                <td id="abId0.23615714133168164"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected" id="abId0.49351435537941546" abineguid="3D39D7E4A0064F348811E69E6EB65DF1"><span class="input-group-btn input-group-prepend"></span><input onchange="return changetotalpriceaddon({{$addon->id}})" class="quantity form-control form-control-sm" type="text" value="1" id="qty_addon{{$addon->id}}" name="quantity_addon" ><span class="input-group-btn input-group-append"></span></div></td>
                                <input  type="hidden" id="addon[{{$addon->id}}][qty]" name="addon[{{$addon->id}}][qty]" value="1">
                                <input  type="hidden" id="addon[{{$addon->id}}][subtotal]" name="addon[{{$addon->id}}][subtotal]" value="{{$addon->price}}">
                                <td><span id="subtotaladdon{{$addon->id}}">{{$addon->price}}</span>L.E</td>
{{--                                <td class="text-right"><i class="ti-close close"></i></td>--}}
                                <?php //$i += 1?>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                            <button type="submit" class="@if(App::isLocale('en')) float-right @endif btn" style="background-color: red; color: white">{{__('front.send')}}</button>
                    </div>
                </div>
            </div>
            </div>
    </div>
        </div>
    </section>
    </form>
    <script>
        let changeprice = (obj)=>{
            //alert('jaja');
            let price_prod = document.querySelector('#price_prod');
            let quantity = document.querySelector('#qty');
            //alert(price_prod.innerHTML+" "+quantity.value);
            //alert(document.querySelector(`#prod_size_price${obj.value}`).value);
            price_prod.innerHTML = document.querySelector(`#prod_size_price${obj.value}`).value;
            document.querySelector('#subtotal').innerHTML = parseInt(quantity.value)*parseInt(document.querySelector(`#prod_size_price${obj.value}`).value);
            document.querySelector('#price_prod_hidden').value = parseInt(quantity.value)*parseInt(document.querySelector(`#prod_size_price${obj.value}`).value);

        }
        let changetotalprice = ()=>{
            let price_prod = document.querySelector('#price_prod');
            let quantity = document.querySelector('#qty');
            document.querySelector('#subtotal').innerHTML = parseInt(quantity.value)*parseInt(price_prod.innerHTML);
            document.querySelector('#price_prod_hidden').value = parseInt(quantity.value)*parseInt(price_prod.innerHTML);

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
