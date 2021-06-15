@extends('dashboard.metronic')
@section('content')
@section('title', 'تعديل المشرف')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> تعديل المشرف
            </h1>
        </div>
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.html">الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"> تعديل المشرف </span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-green hide"></i>
                        <span class="caption-subject font-dark bold uppercase"> تعديل معلومات المشرف </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('admins.update', $admin->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">الاسم</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="name" value="{{$admin->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> البريد اللاكتروني </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="" name="email" value="{{$admin->email}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> كلمة المرور </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" placeholder="" name="password">
                                </div>
                            </div>

                            <div class="form-group m-2">
                                {{-- <div class="col-md-6"> --}}

                                {{-- <h3>اختر تصنيفا</h3> --}}
                                <label class="col-md-3 control-label">اختار تصنيفا</label>

                                <div class="col-md-6">
                                    @foreach ($groups as $group)
                                        <div class="col-md-4">
                                            <input type="checkbox" name="groups[]" {{$admin->hasRole($group) ? 'checked' : ''}} value="{{ $group->name }}">
                                            {{ $group->name }}
                                        </div>
                                    @endforeach
                                </div>

                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn green">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
