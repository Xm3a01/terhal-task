@extends('dashboard.metronic')
@section('content')
@section('title', 'تعديل السائق')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> تعديل السائق
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
            <span class="active"> تعديل السائق </span>
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
                        <span class="caption-subject font-dark bold uppercase"> تعديل معلومات السائق </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('drivers.update', $driver->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">الاسم</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder=""
                                        name="name" value="{{$driver->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">رقم السياره</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder=""
                                        name="car_number" value="{{$driver->car_number}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">الهاتف</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder=""
                                        name="phone" value="{{$driver->phone}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">الخصم</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder=""
                                        name="deduct" value="{{$driver->deduct}}">
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
