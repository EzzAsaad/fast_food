@extends('admin.layouts.app')
@section('content')
<?php if(isset($group_id))
{
    $group = \App\Models\Group::find($group_id);
}
?>
@if(isset($group_id))
    <!-- Validation Wizards -->
    @if(session()->has('success'))
    <div class="alert alert-primary text-right" style="width:100%">
        {{session()->get('success')}}
    </div>
    @endif
            <div class="js-wizard-validation block block text-right" style="width:100%;" >
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">تعديل صلاحيات جروب</a>
                    </li>
                </ul>
                <form class="js-wizard-validation-form" action="{{ route('Admin.StorePermissionToGroup') }}" method="POST" enctype="multipart/form-data" dir="rtl">
                    @csrf
                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> إسم الجروب</label>
                                <input type="hidden" name="name" value="{{$group->id}}">
                                <select class="form-control mb-2" type="text" id="wizard-validation-firstname" style="width:400px;"name="" disabled>
                                        <option value="{{$group->id}}"  >{{ $group->name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> صلاحيات الجروب </label>
                                <select class="form-control mb-2" type="text" id="wizard-validation-firstname" style="width:500px; height:300px;"name="No" multiple>
                                    @foreach($group->permissions as $p)
                                            <option value="{{$p->id}}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                             </div>
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> الصلاحية </label>
                                <small>يمكنك إختيار أكثر من صلاحية</small>
                                <select class="form-control mb-2" type="text" id="wizard-validation-firstname" style="width:500px; height:300px;"name="permission[]" multiple>
                                    @foreach($permissions as $p)
                                            <option value="{{$p->id}}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                             </div>


                        </div>
                    <!-- Steps Navigation -->
                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom"> 
                        <div class="row" style="width:400px;>
                            <div class="col-6">
                            </div>
                            <div class="col-6 text-right" >
                            <button type="submit" class="btn btn-alt-primary text-right" data-wizard="next" >
                                    إرسال <i class="fa fa-angle-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                </form>
            </div>
@endsection
@else
لا يوجد بيانات لعرضها
@endif
