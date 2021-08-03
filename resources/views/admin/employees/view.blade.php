@extends('admin.layouts.app')
@section('content')
<div class="row" @if(App::isLocale('en')) dir="rtl" @endif>
                        <div class="col-sm-6 @if(App::isLocale('en')) text-left @else text-right @endif" >
                            <!-- Billing Address -->
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">{{__('users.info')}} </h3>
                                </div>
                                <div class="block-content">
                                    <div class="font-size-h4 mb-1">{{ $user->name }}</div>
                                    <address class="font-size-sm">
                                    {{$user->address}} <i class="fas fa-map-marker-alt ml-1" ></i><br><br>
                                         {{ $user->phone }}<i class="fa fa-phone ml-1" ></i><br><br>
                                         <a href="javascript:void(0)">{{$user->email}}</a><i class="far fa-envelope ml-1" ></i><br>
                                        <?php
                                                $area = \App\Models\Area::find($user->area_id)

                                            ?>
                                         <a href="javascript:void(0)">{{ (isset($area) && $area->count() > 0) ? $area->name : __('users.notfound') }}</a><i class="fas fa-map-marked ml-1" ></i><br>
                                         <a href="javascript:void(0)">{{$user->group->name}}</a><i class="fas fa-user-shield ml-1" ></i><br>
                                        <a href="javascript:void(0)">{{$user->email}}</a><i class="far fa-envelope ml-1" ></i>

                                    </address>
                                </div>
                            </div>
                            <!-- END Billing Address -->
                        </div>
                        <div class="col-sm-6 @if(App::isLocale('en')) text-left @else text-right @endif">
                            <!-- Shipping Address -->
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">{{__('users.image')}} </h3>
                                </div>
                                <div class="block-content" style="overflow:hidden">
                                    <div class="font-size-h4 mb-1"> {{$user->name}}</div>
                                    <img src="{{ asset('files/user_images/' . $user->image) }}" style="width:350px;height:400px;margin-bottom:20px"
                                </div>
                            </div>
                            <!-- END Shipping Address -->
                        </div>

                    </div>



@endsection
