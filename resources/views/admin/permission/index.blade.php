@extends('admin.layouts.app')
@section('content')
@if(isset($permissions) && $permissions->count() > 0)
    @if(session()->has('success'))
    <div class="alert alert-primary text-right" style="width:100%">
           {{ session()->get('success') }}
        </div>
    @endif

     <div @if(App::isLocale('ar')) dir="rtl" @endif>
                        <!-- Bordered Table -->
                        <div class="block block-rounded">
                            <div class="block-header">
                                <h3 class="block-title  @if(App::isLocale('ar')) text-right @endif" style="font-size:15px;font-weight:bold">عرض جميع الصلاحيات</h3>

                            </div>
                            <div class="block-content">
                                <table class="table table-bordered table-vcenter" @if(App::isLocale('ar')) dir="rtl" @endif>
                                    <thead>
                                        <tr>
                                            <th class="" style="width: 50px;">#</th>
                                            <th class="text-center">الصلاحية</th>
                                            <th  class="text-center">أسم مختصر</th>
                                            <th class="text-center">controller</th>
                                            <th class="text-center">method</th>
                                            <th class="text-center">الحالة</th>
                                            <th class="text-center">التحكم</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach($permissions as $permission)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $permission->id }}</th>
                                            <td class="font-w600 font-size-sm">
                                                {{ $permission->name }}
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                                {{ $permission->breifName }}
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                            <span class="badge badge-warning">{{ $permission->ControllerName }}</span>
                                            </td>
                                            <td class="font-w600 font-size-sm">
                                                {{ $permission->MethodName }}
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-primary">{{($permission->status == 0) ? 'غير مسموح' : 'مسموح'}}</a></span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('Admin.EditPermission', $permission->id) }}" class="btn btn-sm btn-light" style="background-color: #008CBA;padding:10px;" data-toggle="tooltip" title="تعديل الصلاحية">
                                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ route('Admin.DeletePermission', $permission->id) }}" class="btn btn-sm btn-light" style="background-color:#f44336;padding:10px;" data-toggle="tooltip" title="حذف الصلاحية">
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
<h5 style="font-size:14px; position:relative;left:40%">لا يوجد أي بيانات لعرضها</h5>
@endif
@endsection
