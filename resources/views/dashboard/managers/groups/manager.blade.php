@extends('dashboard.metronic')
@section('title', 'المشرفون')
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
            <h1> جدول المشرفين
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
            <span class="active">جدول المشرفين</span>
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
                                        <th data-field="ar_coName" data-align="center" data-sortable="true">البريد </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->id }} </td>
                                                <td> {{ $admin->name }} </td>
                                                <td> {{ $admin->email }} </td>
                                            </tr>
                                    @endforeach

                                </tbody>
                                {{ $admins->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->

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
