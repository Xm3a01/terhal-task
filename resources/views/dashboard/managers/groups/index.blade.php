@extends('dashboard.metronic')
@section('title', ' الرئيسية ')

@section('content')


    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> تصنيفات المشرفين
            </h1>
        </div>
    </div>
    <div>
        <a data-toggle="modal" href="#add-admin" class="btn btn-info p-2 mb-10">اضافة تصنيف</a>
    </div>
    <div class="row mt-5">
        @foreach ($groups as $group)

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 rounded-sm">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('groups.show', $group->id) }}">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value=""></span>
                        </div>
                        <div class="desc"> {{ $group->name }} </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->


    </div>
    <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

    </div>

    <!-- BEGIN ADD_company MODEL -->
    <div class="modal fade" id="add-admin" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <img
                            src=" {{ asset('vendor/img/remove-icon-small.png') }} " alt="" srcset=""> </button>
                    <h4 class="modal-title">إضافة تصنيف جديد</h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="p-3">
                                <div class="portlet-body form">
                                    <form class="form-horizontal" id="group-form" role="form" method="POST"
                                        action="{{ route('groups.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <input type="hidden" name="select" value="adv"> --}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">التصنيف</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="" name="group">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <h3>الصلاحيات</h3>
                                                <div class="row">
                                                    @foreach ($permissions as $permission)      
                                                    <div class="col-md-4">
                                                        <input type="checkbox" name="permissions[]" value="{{$permission->name}}"> {{$permission->name}}
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn green"
                        onclick="event.preventDefault(); document.getElementById('group-form').submit();">حفظ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    </div>

@endsection
