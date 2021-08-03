@extends('admin.layouts.app')
@section('content')
<?php
        $c = \App\Models\Employee::checkAuthority('SettingsController');
    ?>
<div class="text-right"dir="{{ App::isLocale('ar')? 'rtl': '' }}">
    <!-- Sign In Block -->
        <div class="block block-rounded block-themed mb-0" >
            <div class="block-header bg-primary-dark">
                <h3 class="block-title {{ App::isLocale('ar')? 'text-right' : 'text-left' }}" >{{trans('sidebar.SiteSettings')}} / {{trans('sidebar.MenuSettings')}}   </h3>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-primary {{App::isLocale('ar')? 'text-right' : 'text-left' }}" style="width:100%">
                    {{ session()->get('success') }}
                    </div>
                @endif

            <div class="block-content">
            <a href="{{ route('Admin.MenusAdd') }}" class="btn btn-primary @if(App::isLocale('ar')) float-left @else float-right @endif ">{{ trans('menu.addNewMenu') }}</a>

            <div class="p-sm-3 px-lg-4 py-lg-5 {{ App::isLocale('ar')? 'text-right' : 'text-left'  }}">

                <h1 class="h2 mb-1 {{ App::isLocale('ar')? 'text-right' : 'text-left'}}">{{trans('menu.list')}} </h1>
                    <div style="width:100%">

                        <!-- Bordered Table -->
                        <div class="block block-rounded">

                            <div class="block-content">
                                @if($menus != null && count($menus) >= 1)
                                <table class="table table-bordered table-vcenter" dir="{{App::isLocale('ar')? 'rtl': ''}}">
                                    <thead>
                                        <tr>
                                            <th class="" style="width: 50px;">#</th>
                                            <th class="text-center">{{ trans('menu.menu_name_ar') }} </th>
                                            <th  class="text-center">{{ trans('menu.menu_name_en') }}</th>
                                            <th class="text-center">{{ trans('menu.menu_link') }}</th>
                                            <th class="text-center">{{ trans('menu.menu') }}</th>
                                            <th class="text-center">{{ trans('menu.status') }}</th>
                                            <th class="text-center">{{ trans('menu.contorl') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        @foreach($menus as $m)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $m->id }}</th>
                                            <td class="font-w600 font-size-sm">
                                                {{ $m->name_ar }}
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                                {{ $m->name_en }}
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                            <span class="badge badge-warning">{{ $m->link }}</span>
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                                {{ $m->menu_id }}
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-primary">{{($m->status == 0) ? __('menu.Off') : __('menu.on')}}</a></span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
{{--                                                    @if(in_array('editeMenu', $c->data))--}}
                                                    <a href="{{ route('Admin.MenusEdit', $m->id) }}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="{{__('menu.edit')}}">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
{{--                                                    @endif--}}
{{--                                                    @if(in_array('DeleteMenu', $c->data))--}}
                                                    <a href="{{route('Admin.DeleteMenu', $m->id)}}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="{{__('menu.delete')}}">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </a>
{{--                                                    @endif--}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <span class="text-center">{{__('menu.empty')}}</span>
                                @endif
                            </div>
                        </div>
                        <!-- END Bordered Table -->
                        </div>



<!-- END All Orders Table -->



                </div>
            </div>
        </div>
    <!-- END Sign In Block -->
</div>

@endsection
