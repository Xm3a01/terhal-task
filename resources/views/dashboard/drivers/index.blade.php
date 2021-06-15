@extends('dashboard.metronic')
@section('title', 'السائقين')
    <!-- BEGIN CSS -->
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') }}">
@endsection
<!-- END CSS -->

@section('content')

    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> جدول السائقين
            </h1>
        </div>
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{route('home')}}">الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">جدول السائقين</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->

    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="mt-bootstrap-tables">
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="table-toolbar pull-left">
                            <div class="btn-group">
                            @can('drivers-create')
                                <a data-toggle="modal" href="#add-admin" id="sample_editable_1_new" class="btn green"> أضف
                                    سائق جديده
                                    <i class="fa fa-plus"></i>
                                </a>
                                @endcan
                            </div>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                    <i class="fa fa-share"></i>
                                    <span class="hidden-xs"> الادوات</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true">#</th>
                                        <th data-field="ar_coName" data-align="center" data-sortable="true">الاسم </th>
                                        <th data-field="ar_coName" data-align="center" data-sortable="true">رقم السياره </th>
                                        <th data-field="ar_coName" data-align="center" data-sortable="true">الهاتف </th>
                                        <th data-field="ar_coName" data-align="center" data-sortable="true">الخصم</th>
                                        <th data-field="" data-align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $driver)

                                        <tr>
                                            <td>{{ $driver->id }} </td>
                                            <td> {{ $driver->name }} </td>
                                            <td> {{ $driver->car_number }} </td>
                                            <td> {{ $driver->phone }} </td>
                                            <td> {{ $driver->deduct }} </td>
                                            {{-- <td> {{ $permission->guard }} </td> --}}
                                            <td>
                                                <form action="{{ route('drivers.destroy', $driver->id) }}"
                                                    method="POST">
                                                    @csrf {{ method_field('DELETE') }}
                                                    @can('drivers-update')
                                                    <a class="btn btn-info edit"
                                                        href="{{ route('drivers.edit', $driver->id) }}"> <i
                                                            class="fa fa-edit"></i> </a>
                                                    @endcan
                                                    @can('drivers-delete')
                                                    <button type="submit" class="btn btn-danger delete"> <i
                                                            class="fa fa-trash"></i> </button>
                                                     @endcan
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                {{ $drivers->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->

    <!-- BEGIN ADD_company MODEL -->
    <div class="modal fade" id="add-admin" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <img
                            src=" {{ asset('vendor/img/remove-icon-small.png') }} " alt="" srcset=""> </button>
                    <h4 class="modal-title">إضافة سائق جديده</h4>
                </div>
                <div class="modal-body">
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="p-3">
                                <div class="portlet-body form">
                                    <form class="form-horizontal" id="level-form" role="form" method="POST"
                                        action="{{ route('drivers.store') }}">
                                        @csrf
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">الاسم</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">رقم السياره</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="car_number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">الهاتف</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="phone">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">الخصم</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="deduct">
                                                </div>
                                            </div>

                                                {{-- </div> --}}
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">إلغاء</button>
                            <button type="button" class="btn green"
                                onclick="event.preventDefault(); document.getElementById('level-form').submit();">حفظ</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('vendor/js/datatable.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/js/table-datatables-buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
    <script>
        //Datatable
        $(document).ready(function() {
            $('#users-table').DataTable();
        });

    </script>
@endsection
<!-- END SCRIPTS -->
