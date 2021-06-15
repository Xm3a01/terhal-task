@extends('dashboard.metronic')
@section('content')
@section('title', 'تعديل الصلاحيه')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> تعديل الصلاحيه
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
            <span class="active"> تعديل الصلاحيه </span>
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
                        action="{{ route('permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">ادخل الصلاحيه</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="e.g posts" name="show" value="{{$permission->show}}">
                                </div>
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
