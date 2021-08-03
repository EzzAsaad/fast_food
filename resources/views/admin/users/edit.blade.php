@extends('admin.layouts.app')
@section('content')
    <!-- Validation Wizards -->
            <div class="js-wizard-validation block block text-right" style="width:100%;" >
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  data-toggle="tab" style="font-size:17px;">تعديل بيانات المستخدم</a>
                    </li>
                </ul>
                <form class="js-wizard-validation-form" action="{{ route('Admin.UpdateUser', $user->id) }}" method="POST" enctype="multipart/form-data" dir="rtl">
                    @csrf
                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> الأسم</label>
                                <input class="form-control" type="text" id="wizard-validation-firstname" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">العنوان</label>
                                <input class="form-control" type="text" id="wizard-validation-lastname" name="address"value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">رقم الهاتف</label>
                                <input class="form-control" type="text" id="wizard-validation-lastname" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">كلمة السر</label>
                                <input class="form-control" type="password" id="wizard-validation-lastname" name="password" >
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">المنطقة</label>
                                <select class="form-control" type="password" id="wizard-validation-lastname" name="area_id">
                                    @foreach($areas as $a)
                                    <option value="{{$a->id}}" @if($a->id == $user->area_id) selected @endif > {{$a->name}} </option>
                                    @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">المجموعة</label>
                                <select class="form-control" type="password" id="wizard-validation-lastname" name="group_id">
                                    @foreach($groups as $g)
                                    <option value="{{$g->id}}" @if($g->id == $user->gorup_id) selected @endif> {{$g->name}} </option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-email">الإيميل</label>
                                <input class="form-control" type="email" id="wizard-validation-email" name="email"value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-email">الصورة</label> <br>
                                <img src="{{ asset('files/user_images/' . $user->image) }}" style="width:160px;height:180px;" />
                                <input class="form-control" type="file" id="wizard-validation-email" name="image">
                            </div>
                        </div>

                    <!-- Steps Navigation -->
                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-alt-primary text-right" data-wizard="next">
                                    إرسال <i class="fa fa-angle-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                </form>
            </div>
@endsection