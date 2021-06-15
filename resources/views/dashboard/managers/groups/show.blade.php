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
    <div style="margin-buttom:10px">
        <a data-toggle="modal" href="#add-admin" class="btn btn-info p-2 rounded-sm">تعديل تصنيف</a>
        <a  href="{{route('managers.group' , $group->id)}}" class="btn btn-info p-2 rounded-sm">المشرفين</a>
        <a  href="{{route('groups.delete' , $group->id)}}"  class="btn btn-danger p-2 rounded-sm">
        حذف التصنيف
    </a>
    </div>
    <div class="row mt-5">
        <h3> التصنيف : {{ $group->name }} </h3>

        <div class="col-md-6">

            <h3>الصلاحيات</h3>
            <div class="row">
                @foreach ($permissions as $permission)
                    @if ($group->hasPermissionTo($permission))
                        <div class="col-md-4">
                            {{ $permission->name }}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

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
                    <h4 class="modal-title">تعديل التصنيف</h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="p-3">
                                <div class="portlet-body form">
                                    <form class="form-horizontal" id="group-form" role="form" method="POST"
                                        action="{{ route('groups.update', $group->id) }}">
                                        @csrf
                                        @method('PUT')
                                        {{-- <input type="hidden" name="select" value="adv"> --}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">التصنيف</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="" name="group"
                                                        value="{{ $group->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <h3>الصلاحيات</h3>
                                                <div class="row">
                                                    @foreach ($permissions as $permission)
                                                        <div class="col-md-4">
                                                            <input type="checkbox" value="{{ $permission->id }}"
                                                                name="permissions[]"
                                                                {{ $group->hasPermissionTo($permission) ? 'checked' : '' }}>
                                                            {{ $permission->name }}
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

    {{-- <form action="{{route('groups.destroy' , $group->id)}}" method="post" id="delete-form">
    @csrf
    @method('PUT')
    </form> --}}

@endsection
