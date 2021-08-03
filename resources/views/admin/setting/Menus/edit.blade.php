@extends('admin.layouts.app')
@section('content')

<div class=" text-right"  dir="{{ App::isLocale('ar')? 'rtl': '' }}">
    <!-- Sign In Block -->
        <div class="block block-rounded block-themed mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title {{ App::isLocale('ar')? 'text-right' : 'text-left' }}" >{{trans('sidebar.SiteSettings')}} / {{trans('sidebar.MenuSettings')}}   </h3>
            </div>
                @if(session()->has('success'))
                <div class="alert alert-primary {{App::isLocale('ar')? 'text-right' : 'text-left' }}" >
                    {{ session()->get('success') }}
                    </div>
                @endif

            <div class="block-content">
                <div class="p-sm-3 px-lg-4 py-lg-5 {{ App::isLocale('ar')? 'text-right' : 'text-left'  }}">
                    <h1 class="h2 mb-1">{{trans('sidebar.MenuSettings')}} </h1>
                    <p class="text-muted" >
                    {{trans('menu.updatemenuinfo')}}

                    </p>
                    <form class="js-validation-signin { App::isLocale('ar')? 'text-right' : 'text-left'  }}" action="{{ route('Admin.storeMenuEdit', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="py-3">
                            <div class="row">
                                <div class="col">
                                    <label for="">{{ trans('menu.arTitle') }}</label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="nameAr" value="{{ $menu->name_ar }}" required> <br>
                                </div>
                                <div class="col">
                                <label for=""> {{ trans('menu.enTitle') }} </label>
                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="nameEn" value="{{ $menu->name_en }}" required>  <br>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                        <label for=""> {{ trans('menu.RealMenu') }}</label>
                                        <select type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="menu"  required>
                                            <option value="1">Menu1</option>
                                            <option value="2">Menu2</option>
                                            <option value="3">Menu3</option>
                                        </select> <br>
                                    </div>
                                <div class="col">
                                        <label for="">{{ trans('menu.link') }}</label>
                                        <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="link" value="{{ $menu->link }}" required> <br>
                                    </div>

                            </div>
                            <div class="row">

                                <div class="col">
                                    <label for="">{{ trans('menu.status') }}</label>
                                    <select type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="status" required >
                                        <option value="1" @if($menu->status == 1 ) ? 'selected' : '' @endif>{{trans('menu.statusOn')}}</option>
                                        <option value="0" @if($menu->status == 0) ? 'selected' : '' @endif>{{trans('menu.statusOff')}}</option>
                                    </select>                                </div>
                            </div>

                        <div class="form-group row" style="margin-top:15px;" >
                            <div class="col-md-6 col-xl-5">
                                <button type="submit" class="btn btn-block btn-alt-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{trans('menu.save')}}
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
