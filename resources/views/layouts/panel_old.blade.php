<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{setting('name')}} @if (trim($__env->yieldContent('title'))) | @yield('title')@endif</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{URL::to('/').'/plugins/fontawesome-free/css/all.min.css'}}">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('/').'/dist/css/adminlte.min.css'}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Image_uploader -->
    <link type="text/css" rel="stylesheet" href="{{URL::to('/')}}/image_uploader/image_uploader.min.css">
    <!-- Include this in your blade layout -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

    <!-- Tags input -->
{{--    <link rel="stylesheet" href="{{URL::to('/')}}/tagsinput/dist/bootstrap-tagsinput.css">--}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />

    <style>
        .bootstrap-tagsinput {
            width: 100%;
            line-height: 25px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .bootstrap-tagsinput .tag{
            background-color: rgb(52, 58, 64);
            padding: 4px;
            margin: 5px;
            border-radius: 7px;
            border: none;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
@include('sweet::alert')
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{URL::to('/')}}/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{URL::to('/')}}/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{URL::to('/')}}/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                        class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{URL::to('/').setting('logo')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{setting('name')}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{URL::to('/').Auth::user()->profile()}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
{{--                    {{dd(Auth::user()->hasPermission(\App\Models\Permission::find(2)))}}--}}
                    @if ((Auth::user()->isAdmin() && Auth::user()->can('Admin')) || Auth::user()->isSuperAdmin() )
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link @yield('admins')">
                            <i class="fas fa-user-shield"></i>
                            <p>
                                Admins
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link @yield('admins_list')">
                                    <p>Admins</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('roles.index')}}" class="nav-link @yield('roles')">
                                    <p>Roles</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if ((Auth::user()->isAdmin() && Auth::user()->can('Category')) || Auth::user()->isSuperAdmin() )
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link @yield('Categories')">
                                <i class="fas fa-clipboard-list"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('categories.index')}}" class="nav-link @yield('Category')">
                                            <p>Category list</p>
                                        </a>
                                    </li>
                            </ul>
                        </li>
                    @endif
                    @if ((Auth::user()->isAdmin() && Auth::user()->can('User')) || Auth::user()->isSuperAdmin() )
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link @yield('User')">
                                <i class="fas fa-users"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link @yield('Users')">
                                        <p>Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if ((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() )
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link @yield('Setting')">
                                <i class="fas fa-cogs"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($setting_groups as $group)
                                    <li class="nav-item">
                                        <a href="{{route('settings.show',$group->id)}}" class="nav-link @yield($group->name)">
                                            <p>{{$group->name}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
{{--                        <a href="#" class="nav-link btn btn-danger">--}}
{{--                            <i class="fas fa-sign-out-alt"></i>--}}
{{--                            <i class="nav-icon fas fa-th"></i>--}}
{{--                            <p >--}}
{{--                                Logout--}}
{{--                            </p>--}}
{{--                        </a>--}}
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
           Design and Develope : <a href="https://ahmadrezaghanbari.ir">A.Ghanbari</a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020-{{Date('Y')}} <a href="{{setting('url')}}">{{setting('name')}}</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{URL::to('/').'/plugins/jquery/jquery.min.js'}}"></script>

<!-- Bootstrap 4 -->
<script src="{{URL::to('/').'/plugins/bootstrap/js/bootstrap.bundle.min.js'}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('/').'/dist/js/adminlte.min.js'}}"></script>

<!-- jQuery -->
<script src="{{URL::to('/').'/plugins/datatables/jquery.dataTables.min.js'}}"></script>
<script src="{{URL::to('/').'/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'}}"></script>
<script src="{{URL::to('/').'/plugins/datatables-responsive/js/dataTables.responsive.min.js'}}"></script>
<script src="{{URL::to('/').'/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'}}"></script>
<script>
    $(function () {
      $("#table").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
  </script>

<script src="{{URL::to('/')}}/dist/js/demo.js"></script>
<!-- image uploader -->
<script type="text/javascript" src="{{URL::to('/')}}/image_uploader/image_uploader.min.js"></script>
<!-- Tags input -->
<script src="{{URL::to('/')}}/tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="{{URL::to('/')}}/tagsinput/dist/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>

<!-- Page script -->
@yield('js')
</body>
</html>
