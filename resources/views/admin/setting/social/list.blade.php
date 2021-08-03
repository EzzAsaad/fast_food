@extends('admin.layouts.app')
@section('content')
@if(isset($socials) && $socials->count() > 0)
    @if(session()->has('success'))
    <div class="alert alert-primary text-right" >
           {{ session()->get('success') }}
        </div>
    @endif

     <div >
                        <!-- Bordered Table -->
                        <div class="block block-rounded">
                            <div class="block-header" @if(App::isLocale('ar')) dir="rtl" @endif>
                                <h3 class="block-title @if(App::isLocale('ar'))  text-right @endif" style="font-size:15px;font-weight:bold">{{__('settings.showallsocialmedia')}}</h3>
                                <a href="{{route('Admin.AddSocialMedia')}}" class="btn btn-primary">{{__('settings.addnew')}}</a>

                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-vcenter"@if(App::isLocale('ar'))  dir="rtl" @endif>
                                    <thead>
                                        <tr>
                                            <th class="" style="width: 50px;">#</th>
                                            <th class="text-center">{{__('settings.name')}}</th>
                                            <th  class="text-center">{{__('settings.link')}}</th>
                                            <th  class="text-center">{{__('settings.image')}}</th>
                                            <th class="text-center">{{__('settings.status')}}</th>
                                            <th class="text-center">{{__('settings.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach($socials as $s)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $s->id }}</th>
                                            <td class="font-w600 font-size-sm">
                                                {{ $s->name }}
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                                {{ $s->link }}
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                            <span class="badge badge-warning"><img src="{{ asset($s->icon) }}"  style="width:25px;height:25px"/></span>
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                                @if($s->status == 0)
                                                    <h3 style="padding-bottom: 0;margin-bottom: 0;"><span class="badge badge-danger">{{__('settings.deactive')}}</span></h3>
                                                @else
                                                   <h3 style="padding-bottom: 0;margin-bottom: 0;"><span class="badge badge-success">{{__('settings.active')}}</span></h3>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                <a href="{{ route('Admin.EditSocialMedia', $s->id) }}" style="background-color: #008CBA;padding:10px;" class="btn btn-sm btn-light" data-toggle="tooltip" title="{{__('settings.edit')}}">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ route('Admin.DeleteSocialMedia', $s->id) }}" style="background-color:#f44336;padding:10px;" class="btn btn-sm btn-light" data-toggle="tooltip" title="{{__('settings.delete')}}">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div @if(App::isLocale('ar'))dir="rtl" @endif>
                                    {{ $socials->links('pagination::bootstrap-4') }}</div>

                            </div>
                        </div>
                        <!-- END Bordered Table -->
                        </div>



<!-- END All Orders Table -->


@else
<h5 style="font-size:14px; position:relative;left:40%">{{__('settings.empty')}}</h5>
@endif
@endsection
