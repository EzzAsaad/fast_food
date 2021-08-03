@extends('admin.layouts.app')
@section('content')
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
                        <a class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">إضافة جروب جديد</a>
                    </li>
                </ul>
                <form class="js-wizard-validation-form" action="{{ route('Admin.StoreGroup') }}" method="POST" enctype="multipart/form-data" dir="rtl">
                    @csrf
                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> إسم الجروب</label>
                                <input class="form-control mb-2" type="text" id="wizard-validation-firstname" style="width:400px;"name="name" value="{{isset($group)? $group->name : ''}}" {{isset($group)? 'disabled': ''}}> 
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> وصف الجروب</label>
                                <input class="form-control mb-2" type="text" id="wizard-validation-firstname" style="width:400px;"name="Desc">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> الحالة</label>
                                <select class="form-control mb-2" type="text" id="wizard-validation-firstname" style="width:400px;"name="status">
                                    <option value="0">معطل</option>
                                    <option value="1">مفعل</option>
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

