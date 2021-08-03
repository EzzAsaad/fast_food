@extends('admin.layouts.app')
@section('content')
    <!-- Validation Wizards -->
    @if(session()->has('success'))
    <div class="alert alert-success text-right" style="width:100%">
        {{session()->get('success')}}
    </div>
    @endif

        @if(isset($permission))
            <div class="js-wizard-validation block block text-right" style="width:100%;" >
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  data-toggle="tab" style="font-size:17px;margin-top:">تعديل صلاحية جديدة</a>
                    </li>
                </ul>
                <form class="js-wizard-validation-form" action="{{ route('Admin.UpdatePermission', $permission->id) }}" method="POST" enctype="multipart/form-data" dir="rtl">
                    @csrf
                    <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-validation-firstname"> إسم الصلاحية</label>
                                <input class="form-control" type="text" id="wizard-validation-firstname" name="name" value="{{ $permission->name }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">إسم مختصر</label>
                                <input class="form-control" type="text" id="wizard-validation-lastname" name="anotheName" value="{{ $permission->breifName }}">
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">إسم الcontroller</label>
                                <select class="form-control" type="password" id="wizard-validation-lastname" name="controller">
                                    @foreach($controllers as $c)
                                        <option value="{{$c}}"
                                            @if($permission->ControllerName == $c)
                                                selected
                                            @endif
                                        >{{$c}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname"> أسم ال method</label>
                                <select class="form-control"  id="wizard-validation-lastname" name="methods" >
                                @foreach($methods as $c)
                                        <option value="{{$c}}"
                                            @if($permission->MethodName == $c)
                                                selected
                                            @endif
                                        >{{$c}}</option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="wizard-validation-lastname">الحالة</label>
                                <select class="form-control" type="password" id="wizard-validation-lastname" name="status">
                                <option value="1" @if($permission->status == 1 ) selected @endif >مسموح</option>    
                                <option value="0"@if($permission->status == 0 ) selected @endif >غير مسموح</option>    

                                    </select>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('select[name="controller"]').on('change', function(){
               
                var countryId = $(this).val();
                if(countryId) {
                    $.ajax({
                        url:  '/admin/permission/methods/get/'+countryId,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                        },

                        success:function(data) {
                            $('select[name="methods"]').empty();
                            $('select[name="methods"]').prop( "disabled", false );

                            console.log(data)
                            $.each(data, function(value, key){
                                $('select[name="methods"]').append('<option value="'+ key +'">' + key + '</option>');

                            });
                        },
                        complete: function(){

                        }
                    });
                } 
                else 
                {
                    $('select[name="methods"]').empty();
                }

            });

           

        });

    </script>
    @endif
@endsection

