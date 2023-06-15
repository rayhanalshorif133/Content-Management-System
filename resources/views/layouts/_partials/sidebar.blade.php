<!-- Main Sidebar Container -->
@php
    $routeName = Route::currentRouteName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{-- {{ Session::get('user')->name }} --}}
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                    {{-- {{ Auth::user()->name }} --}}
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if ($routeName == 'admin.dashboard') active @endif ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}"
                        class="nav-link @if ($routeName == 'admin.category.index') active @endif ">
                        <i class="nav-icon fa-solid fa-recycle"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-header">
                    Information Section
                </li>

                <li class="nav-item">
                    <a href="{{ route('content-owner.index') }}"
                        class="nav-link @if ($routeName == 'content-owner.index') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Content Owner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('content-type.index') }}"
                        class="nav-link @if ($routeName == 'content-type.index') active @endif ">
                        <i class="nav-icon fa-solid fa-code-compare"></i>
                        <p>
                            Content Type
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('content.index') }}"
                        class="nav-link @if ($routeName == 'content.index') active @endif ">
                        <i class="nav-icon fa-solid fa-layer-group"></i>
                        <p>
                            Contents
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
