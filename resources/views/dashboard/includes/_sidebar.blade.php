<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start  {{ Request::is('dashboard') ? 'active open' : '' }}">
                <a href="{{ route('home') }}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسية</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('*drivers*') || Request::is('*users*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title"> المستخدمين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  {{ Request::is('*drivers*') ? 'active' : '' }}">
                        <a href="{{ route('drivers.index') }}" class="nav-link">
                            <span class="title">السائقين</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('*users*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <span class="title">المستخدمين</span>
                        </a>
                    </li>

                </ul>
            </li>

            @role('super-admin')
            <li class="nav-item  {{ Request::is('*groups*') || Request::is('*admins*') ? 'active Open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">المشرفون</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::is('*groups*') ? 'active' : ''}}">
                        <a href="{{ route('groups.index') }}" class="nav-link ">
                            <span class="title">تصنيفات المشرفين</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('*admins*') ? 'active' : '' }}">
                        <a href="{{ route('admins.index') }}" class="nav-link ">
                            <span class="title"> المشرفين</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  {{ Request::is('*permissions*') ? 'active Open' : '' }}">
                <a href="{{route('permissions.index')}}" class="nav-link nav-toggle">
                    {{-- <i class="icon-briefcase"></i> --}}
                    <span class="title">الصلاحيات</span>
                    {{-- <span class="arrow"></span> --}}
                </a>
             </li>
            @endrole

        </ul>
        </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
