
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
                <span class=" nav-link active"  data-toggle="tab" style="background-color:#272E38 ;color:white ;font-size:17px;margin-top:">{{__('order.addneworder')}}</span>
            </li>
        </ul>
        <form class="js-wizard-validation-form" @if(App::isLocale('ar')) dir="rtl"@endif action="{{ route('Admin.StoreOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                    <div class="form-group row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-lastname">{{__('order.assignuser')}}</label>
                            <select class="form-control"  id="user_id" name="user_id">
                                <option selected disabled value="null">{{__('order.assignuser')}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('order.clientname')}}</label>
                            <input required class="form-control @if($errors->has('name')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('order.clientphone')}}</label>
                            <input required class="form-control @if($errors->has('phone')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="phone">
                        </div>
                        <div class="form-group col-6">
                            <label for="wizard-validation-firstname">{{__('order.shipfees')}}</label>
                            <input required class="form-control @if($errors->has('price')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="ship_fees">
                        </div>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="wizard-validation-firstname">{{__('order.price')}}</label>--}}
{{--                        <input required class="form-control @if($errors->has('price')) is-invalid @endif " type="text" id="wizard-validation-firstname" name="price">--}}
{{--                    </div>--}}


                    <div class="form-group">
                        <label for="notes">{{__('order.notes')}}</label>
                        <textarea class="form-control @if($errors->has('nots')) is-invalid @endif form-control-alt" id="notes" name="nots" rows="7" ></textarea>
                    </div>
                    <div class="form-group" id="address_place">
                        <label for="wizard-validation-lastname">{{__('order.address')}}</label>
                        <select class="form-control col-4"  id="address_list" name="address_id">
                            <option selected disabled value="null">{{__('order.address')}}</option>
                        </select>
                    </div>
                    <button id='new_address_btn' type="button" class="btn btn-success mb-2">{{__('order.addNewAddress')}}</button>

                    <table @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemoveProduct">
                        <tr>
                            <th>{{__('order.productname')}}</th>
                            <th>{{__('order.productsize')}}</th>
                            <th>{{__('order.productquantity')}}</th>
                            <th></th>

                        </tr>
                        <tr>
                            <input type="hidden" name="prod_is_addons" value="1">
                            <td>   <select onchange="return getbroductsize(this,0)" class="form-control" name="products_orders[0][product_id]">
                                    <option selected disabled value="null">{{__('order.assignprod')}}</option>
                                @foreach($products as $prod)
                                    <option  value="{{$prod->id}}">{{$prod->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" id="prodsize0" name="products_orders[0][producsize]">
                                    <option selected disabled value="null">{{__('order.assignprodsize')}}</option>
                                </select>
                            </td>
                            <td><input type="text" name="products_orders[0][quantity]" class="form-control" /></td>

                            <td><button type="button" name="add" id="dynamic_product_btn" class="btn btn-outline-primary">{{__('order.addnewproduct')}}</button></td>

                        </tr>
                    </table>

                    <table @if(App::isLocale('ar'))dir="rtl" @endif class="table table-bordered" id="dynamicAddRemoveAddone">
                        <tr>
                            <th>{{__('order.addonename')}}</th>
                            <th>{{__('order.productquantity')}}</th>
                            <th></th>

                        </tr>
                        <tr>
                            <input type="hidden" name="addone_is_addons" value="1">
                            <td>   <select class="form-control" name="addones_orders[0][addone_id]">
                                    <option selected disabled value="null">{{__('order.assignprod')}}</option>
                                    @foreach($addones as $addone)
                                        <option  value="{{$addone->id}}">{{$addone->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="addones_orders[0][quantity]" class="form-control" /></td>

                            <td><button type="button" name="add" id="dynamic_addone_btn" class="btn btn-outline-primary">{{__('order.addnewaddone')}}</button></td>

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
        $("#dynamic_product_btn").click(function () {
            ++i;
            $("#dynamicAddRemoveProduct").append(`<tr><input type="hidden" name="prod_is_addons" value="1">
                            <td>   <select onchange="return getbroductsize(this,${i})" class="form-control" name="products_orders[${i}][product_id]">
                                    <option selected disabled value="null">{{__('order.assignprod')}}</option>
                                @foreach($products as $prod)
            <option  value="{{$prod->id}}">{{$prod->name}}</option>
                                    @endforeach
            </select>
        </td>
        <td>
            <select class="form-control" id="prodsize${i}" name="products_orders[${i}][producsize]">
                <option selected disabled value="null">{{__('order.assignprodsize')}}</option>
                                </select>
                            </td>
                            <td><input type="text" name="products_orders[${i}][quantity]" class="form-control" /></td>

<td><button type="button" class="btn btn-outline-danger remove-input-field-prod">{{__('order.delete')}}</button></td>
                        </tr>`);
        });
        $(document).on('click', '.remove-input-field-prod', function () {
            $(this).parents('tr').remove();
        });
        $("#dynamic_addone_btn").click(function () {
            ++i;
            $("#dynamicAddRemoveAddone").append(`<tr><input type="hidden" name="prod_is_addons" value="1">
                            <td>   <select class="form-control" name="addones_orders[${i}][addone_id]">
                                    <option selected disabled value="null">{{__('order.assignprod')}}</option>
                                @foreach($addones as $addone)
            <option  value="{{$addone->id}}">{{$addone->name}}</option>
                                    @endforeach
            </select>
        </td>
                            <td><input type="text" name="addones_orders[${i}][quantity]" class="form-control" /></td>

<td><button type="button" class="btn btn-outline-danger remove-input-field-addone">{{__('order.delete')}}</button></td>
                        </tr>`);
        });
        $(document).on('click', '.remove-input-field-addone', function () {
            $(this).parents('tr').remove();
        });
        $('#user_id').change(function (){
            if($(this).val() != null || $(this).val() != ''){
                console.log($(this).val());
                getaddresses($(this).val());
            }

        });
        function getaddresses(id) {
            $.ajax({
                type:'GET',
                url:`/admin/order/getaddress/${id}`,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    console.log(data.addresses);
                    $("#address_list").html('');
                    for(i = 0 ; i< data.addresses.length;i++){
                        $("#address_list").append(`<option value="${data.addresses[i].id}">${data.addresses[i].new_address}</option>`);
                    }

                }
            });
        }
        $('#new_address_btn').click(function (){

            $('#address_list').remove();
            if(!$('#address').length)
             $('#address_place').append(`<input required class="form-control @if($errors->has('address')) is-invalid @endif " type="text" id="address" name="address">`);

        });
        function getbroductsize(obj,val){
            console.log(obj.value);
            $.ajax({
                type:'GET',
                url:`/admin/order/getproductsizes/${obj.value}`,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    //console.log(data.products_sizes);
                    $(`#prodsize${val}`).html('');
                    for(j = 0 ; j<data.products_sizes.length;j++){
                        $(`#prodsize${val}`).append(`<option value="${data.products_sizes[j].id}">${data.products_sizes[j].size}</option>`)
                    }
                }
            });
        }

    </script>
@endsection

