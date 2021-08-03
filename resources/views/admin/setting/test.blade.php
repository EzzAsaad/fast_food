@extends('admin.layouts.app')
@section('content')
<div class="col-md-8 col-lg-6 col-xl-4 text-right" dir="rtl">
    <!-- Sign In Block -->
        <div class="block block-rounded block-themed mb-0" style="width:1300px" >
            <div class="block-header bg-primary-dark">
                <h3 class="block-title text-right" >بيانات الموقع</h3>
            </div>
            <div class="block-content">
                <div class="p-sm-3 px-lg-4 py-lg-5">
                    <h1 class="h2 mb-1">بيانات الموقع</h1>
                    <p class="text-muted">
                        تعديل البيانات الخاصة بالموقع
                    </p>
                    <form class="js-validation-signin" action="be_pages_auth_all.html" method="POST">
                    
                        <div class="py-3">
                            <div class="row">
                                <div class="col">
                                    <label for="">العنوان باللغة العربية</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="nameAr" value="{{ $settings->nameAr }}" > <br>
                                </div>
                                <div class="col">
                                <label for="">العنوان باللغة الإنجليزية</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="nameEn" value="{{ $settings->nameEn }}">  <br>    
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">الوصف باللغة العربية</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="ArDesc"  >{{ $settings->ArDescription }}</textarea> <br>
                                </div>
                                <div class="col">
                                    <label for="">العنوان باللغة الإنجليزية</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="EnDesc" >{{ $settings->EnDescription }}</textarea> <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">وصف ال meta Description باللغة العربية</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="ArMetaDesc" >{{ $settings->ArMetaDescription }}</textarea> <br>
                                </div>
                                <div class="col">
                                    <label for="">وصف الmeta Description باللغة الإنجليزية</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="EnMetaDesc" >{{ $settings->EnMetaDescription }}</textarea> <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">وصف ال meta keyword باللغة العربية</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="ArMetaKey" >{{ $settings->ArMetaKeywords }}</textarea> <br>
                                </div>
                                <div class="col">
                                    <label for="">وصف ال meta keyword باللغة الإنجليزية</label>
                                    <textarea type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="EnMetaKey"  >{{ $settings->EnMetaKeywords }}</textarea> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">رقم الهاتف</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="phone" value="{{  $settings->phone}}"><br>
                                </div>
                                <div class="col">
                                    <label for="">رقم هاتف أخر</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="phone2" value="{{  $settings->phone2}}"> <br>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="">الإيميل</label>
                                <input type="email" class="form-control form-control-alt form-control-lg" id="login-username" name="email" value="{{  $settings->email}}" >
                            </div>
                            <div class="form-group">
                                <label for="">الشعار</label>
                                @if(isset($settings->logo) && $settings->logo != '')
                                    <img src="{{ asset($settings->logo) }}" style="width:150px;height:150px;" />
                                @endif
                                <input type="file" class="form-control form-control-alt form-control-lg" id="login-username" name="logo" >
                            </div>
                            <div class="form-group">
                            <label for="">الحالة</label>

                            <select class="form-control form-control-alt form-control-lg" id="login-username" name="status">
                                    <option value="0" @if($settings->status == 0) selected @endif>معطل</option>
                                    <option value="1" @if($settings->status == 1) selected @endif>مفعل</option>

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