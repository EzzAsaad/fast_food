@extends('admin.layouts.app')
@section('content')
@if(isset($users) && $users->count() > 0)
    @if(session()->has('success'))
    <div class="alert alert-success text-right" style="width:100%">
           {{ session()->get('success') }}
        </div>
    @endif
<div class="block block-rounded">
    <div class="block-header">
        <h4 class="block-title @if(App::isLocale('ar'))text-left@else text-right @endif ">{{__('users.control')}}</h4>
    </div>
    <div class="block-content">
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter" @if(App::isLocale('ar'))dir="rtl" @endif>
                <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">#</th>
                    <th class="d-none d-sm-table-cell text-center">{{__('users.name')}}</th>
                    <th class="d-none d-sm-table-cell text-center">{{__('users.address')}}</th>
                    <th class="d-none d-xl-table-cell text-center">ا{{__('users.phone')}}</th>
                    <th class="d-none d-xl-table-cell text-center">{{__('users.zone')}}</th>
                    <th class="d-none d-xl-table-cell text-center">{{__('users.group')}}</th>
                    <th class="d-none d-xl-table-cell text-center">{{__('users.actions')}}</th>


                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($users as $user)
                    <tr>
                        <td class="text-center font-size-sm">
                            <span class="font-w600">
                                <strong>{{ $user->id }}</strong>
                            </span>
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td class="d-none d-xl-table-cell font-size-sm">
                            <span class="font-w600" >{{ $user->address }}</span>
                        </td>
                        <td class="d-none d-xl-table-cell text-center font-size-sm">
                            {{ $user->phone }}
                        </td>

                        <td class="d-none d-sm-table-cell font-size-sm">
                            <?php
                            $area = \App\Models\Area::find($user->area_id)

                            ?>
                            <strong>{{ (isset($area) && $area->count() > 0) ? $area->name : 'لم يتم التحديد' }}</strong>
                        </td>
                        <td class="d-none d-xl-table-cell text-center font-size-sm">
                           <h4 style="padding-bottom: 0;margin-bottom: 0;"><span class="badge badge-warning">{{ $user->group->name }}</span></h4>
                        </td>
                        <?php
                        $edit = 0;
                        $delete = 0;
                        $delete1 = 0;
//                         dd(Auth::user());
                        foreach(Auth::user()->group->permissions as $a){
                            if(session()->has('flag') && session()->get('flag') == '1'){

                                if($a->MethodName == 'ViewEditForm' && $a->status == 1)
                                {
                                    $edit = 1;
                                }
                                if($a->MethodName == 'destroyEmployee' && $a->status == 1)
                                {
                                    $delete = 1;
                                }
                            }else{
                                if($a->MethodName == 'ViewEditForm' && $a->status == 1)
                                {
                                    $edit = 1;
                                }
                                if($a->MethodName == 'destroyUser' && $a->status == 1)
                                {
                                    $delete1 = 1;
                                }
                            }

                        }
                        ?>

                        <td class="text-center">
                            @if(session()->has('flag') && session()->get('flag') == '1')
                                <a style="background-color: #D7DDE2;padding: 10px;" class="btn btn-sm btn-alt-secondary" href="{{ route('Admin.ViewEmployee', $user->id) }}" data-toggle="tooltip" title="{{__('users.view')}}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                @if($delete==1)
                                    <a style="background-color:#f44336;padding:10px;" class="btn btn-sm btn-light js-tooltip-enabled" href="{{ route('Admin.deleteEmployee', $user->id) }}" data-toggle="tooltip" title="{{__('users.delete')}}">
                                        <i class="fa fa-fw fa-times"></i>
                                    </a>
                                @endif
                                @if($edit==1)
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('Admin.EditUser', $user->id) }}" data-toggle="tooltip" title="{{__('users.edit')}}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                @endif
                            @else
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('Admin.ViewUser', $user->id) }}" data-toggle="tooltip" title="{{__('users.view')}}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>

                                @if($delete1==1)
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('Admin.deleteUser', $user->id) }}" data-toggle="tooltip" title="{{__('users.delete')}}">
                                        <i class="fa fa-fw fa-times"></i>
                                    </a>
                                @endif

                                @if($edit==1)
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('Admin.EditUser', $user->id) }}" data-toggle="tooltip" title="{{__('users.edit')}}">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                @endif
                            @endif

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div @if(App::isLocale('ar'))dir="rtl" @endif>
            {{ $users->links('pagination::bootstrap-4') }}</div>
        </div>
    </div>
</div>
<!-- END All Orders Table -->


@else
<h5 style="font-size:14px; position:relative;left:40%">{{__('users.empty')}}</h5>
@endif
@endsection
