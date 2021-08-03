@extends('admin.layouts.app')
@section('content')
<div class=" @if(App::isLocale('ar')) text-right @endif" @if(App::isLocale('ar')) dir="rtl" @endif>
    <!-- Sign In Block -->
        <div class="block block-rounded block-themed mb-0" >
            <div class="block-header bg-primary-dark">
                <h3 class="block-title @if(App::isLocale('ar')) text-right @endif" >إعدادات المستخدمين / إضافة مستخدم جديد</h3>
            </div>
            <div class="block-content">
                <div class="p-sm-3 px-lg-4 py-lg-5">
                    <h1 class="h2 mb-1"> إضافة مستخدم</h1>
                    <p class="text-muted">
                    إضافة بيانات مستخدم جديد
                    </p>
                    <form class="js-validation-signin" action="{{ route('Admin.UserStore') }}" method="POST" @if(App::isLocale('ar')) dir="rtl" @endif>
                        @csrf
                        <div class="py-3">
                            <div class="row">
                                <div class="col">
                                    <label for="">أسم المستخدم</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="name"  > <br>
                                </div>
                                <div class="col">
                                <label for="">الإيميل</label>
                                    <input type="email" class="form-control form-control-alt form-control-lg" id="login-username" name="email" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">كلمة السر</label>
                                    <input type="password" class="form-control form-control-alt form-control-lg" id="login-username" name="password"  > <br>
                                </div>
                                <div class="col">
                                    <label for="">الهاتف</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="phone" > <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">المنطقة</label>
                                    <select class="form-control form-control-alt form-control-lg" id="login-username" name="area" >
                                        @foreach($areas as $a)
                                            <option value="{{$a->id}}"> {{ $a->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">الجروب</label>
                                    <select class="form-control form-control-alt form-control-lg" id="login-username" name="group" >
                                        @foreach($groups as $g)
                                            <option value="{{$g->id}}"> {{ $g->name }} </option>
                                        @endforeach
                                    </select>                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">العنوان </label>
                                <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="address" >  <br>
                            </div>
                            <div class="form-group">
                            <label for="">الحالة</label>

                                <select class="form-control form-control-alt form-control-lg" id="login-username" name="status">
                                    <option value="0" >معطل</option>
                                    <option value="1" >مفعل</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group row jus">
                            <div class="col-md-6 col-xl-5">
                                <button type="submit" class="btn btn-block btn-alt-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> حفظ
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- END Sign In Form -->
                </div>
            </div>
        </div>
    <!-- END Sign In Block -->
</div>


@endsection
