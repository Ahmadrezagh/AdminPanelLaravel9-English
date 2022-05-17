<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

    <!-- Favicon -->
    <link rel="icon" href="{{url('panel/assets/img/brand/favicon.ico')}}" type="image/x-icon"/>

    <!-- Title -->
    <title>{{setting('name')}} @if (trim($__env->yieldContent('title'))) | @yield('title')@endif</title>

    <!-- Bootstrap css-->
    <link href="{{url('panel/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="{{url('panel/assets/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
    <link href="{{url('panel/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>

    <!-- Style css-->
    <link href="{{url('panel/assets/css/style/style.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/css/skins.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/css/dark-style.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/css/colors/default.css')}}" rel="stylesheet">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('panel/assets/css/colors/color.css')}}">

    <!-- Select2 css-->
    <link href="{{url('panel/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{url('panel/assets/plugins/multipleselect/multiple-select.css')}}">

    <!-- Sidemenu css-->
    <link href="{{url('panel/assets/css/sidemenu/sidemenu.css')}}" rel="stylesheet">

    <!-- Switcher css-->
    <link href="{{url('panel/assets/switcher/css/switcher.css')}}" rel="stylesheet">
    <link href="{{url('panel/assets/switcher/demo.css')}}" rel="stylesheet">
    <!-- CkEditor -->
    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
    <!-- Include this in your blade layout -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Toastr css -->
    @toastr_css
</head>

<body class="main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="{{url('panel/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

    <!-- Sidemenu -->
    <div class="main-sidebar main-sidebar-sticky side-menu">
        <div class="sidemenu-logo">
            <a class="main-logo" href="{{url('/')}}">
                <img src="{{url(setting('logo'))}}" class="header-brand-img desktop-logo" alt="logo" style="max-height: 52px">
                <img src="{{url(setting('logo'))}}" class="header-brand-img icon-logo" alt="logo" style="max-height: 52px">
                <img src="{{url(setting('logo'))}}" class="header-brand-img desktop-logo theme-logo" alt="logo" style="max-height: 52px">
                <img src="{{url(setting('logo'))}}" class="header-brand-img icon-logo theme-logo" alt="logo" style="max-height: 52px">
            </a>
        </div>
        <div class="main-sidebar-body">
            <ul class="nav">
                <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Home</span></a>
                </li>
                @if ((Auth::user()->isAdmin() && Auth::user()->can('Admin')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-user sidemenu-icon"></i>
                        <span class="sidemenu-label">Admins</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('admins.index')}}">Admin list</a>
                        </li>
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('roles.index')}}">Roles</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if ((Auth::user()->isAdmin() && Auth::user()->can('Category')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-list sidemenu-icon"></i>
                        <span class="sidemenu-label">Categories</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('categories.index')}}">Category list</a>
                        </li>
                    </ul>
                </li>
                @endif

                @if ((Auth::user()->isAdmin() && Auth::user()->can('User')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-user sidemenu-icon"></i>
                        <span class="sidemenu-label">User management</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        <li class="nav-sub-item">
                            <a class="nav-sub-link" href="{{route('users.index')}}">User list</a>
                        </li>
                    </ul>
                </li>
                @endif

                @if ((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() )
                <li class="nav-item">
                    <a class="nav-link with-sub" href="#0">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti-settings sidemenu-icon"></i>
                        <span class="sidemenu-label">Settings</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="nav-sub">
                        @foreach($setting_groups as $group)
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="{{route('settings.show',$group->name)}}">{{$group->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- End Sidemenu -->        <!-- Main Header-->
    <div class="main-header side-header sticky">
        <div class="container-fluid">
            <div class="main-header-left">
                <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
            </div>
            <div class="main-header-center">
                <div class="responsive-logo">
                    <a href="index.html"><img src="{{url('panel/assets/img/brand/logo.png')}}" class="mobile-logo" alt="logo"></a>
                    <a href="index.html"><img src="{{url('panel/assets/img/brand/logo-light.png')}}" class="mobile-logo-dark" alt="logo"></a>
                </div>
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <select class="form-control select2-no-search">
                            <option label="All categories">
                            </option>
                            <option value="IT Projects">
                                IT Projects
                            </option>
                            <option value="Business Case">
                                Business Case
                            </option>
                            <option value="Microsoft Project">
                                Microsoft Project
                            </option>
                            <option value="Risk Management">
                                Risk Management
                            </option>
                            <option value="Team Building">
                                Team Building
                            </option>
                        </select>
                    </div>
                    <input type="search" class="form-control" placeholder="Search for anything...">
                    <button class="btn search-btn"><i class="fe fe-search"></i></button>
                </div>
            </div>
            <div class="main-header-right">
                <div class="dropdown header-search">
                    <a class="nav-link icon header-search">
                        <i class="fe fe-search header-icons"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-form-search p-2">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <select class="form-control select2-no-search">
                                        <option label="All categories">
                                        </option>
                                        <option value="IT Projects">
                                            IT Projects
                                        </option>
                                        <option value="Business Case">
                                            Business Case
                                        </option>
                                        <option value="Microsoft Project">
                                            Microsoft Project
                                        </option>
                                        <option value="Risk Management">
                                            Risk Management
                                        </option>
                                        <option value="Team Building">
                                            Team Building
                                        </option>
                                    </select>
                                </div>
                                <input type="search" class="form-control" placeholder="Search for anything...">
                                <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link" href="#">
                        <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                        <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                    </a>
                </div>
                <div class="dropdown main-header-notification">
                    <a class="nav-link icon" href="#">
                        <i class="fe fe-bell header-icons"></i>
                        <span class="badge badge-danger nav-link-badge">4</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
                        </div>
                        <div class="main-notification-list">
                            <div class="media new">
                                <div class="main-img-user online"><img alt="avatar" src="{{url('panel/assets/img/users/5.jpg')}}"></div>
                                <div class="media-body">
                                    <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user"><img alt="avatar" src="{{url('panel/assets/img/users/2.jpg')}}"></div>
                                <div class="media-body">
                                    <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="main-img-user online"><img alt="avatar" src="{{url('panel/assets/img/users/3.jpg')}}"></div>
                                <div class="media-body">
                                    <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-footer">
                            <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
                <div class="main-header-notification">
                    <a class="nav-link icon" href="#">
                        <i class="fe fe-message-square header-icons"></i>
                        <span class="badge badge-success nav-link-badge">6</span>
                    </a>
                </div>
                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="#">
                        <span class="main-img-user" ><img alt="avatar" src="{{url(auth()->user()->profile())}}"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title">{{auth()->user()->name}}</h6>
                            <p class="main-notification-text">Web Designer</p>
                        </div>
                        <a class="dropdown-item border-top" href="#">
                            <i class="fe fe-user"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fe fe-edit"></i> Edit Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fe fe-settings"></i> Account Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fe fe-settings"></i> Support
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fe fe-compass"></i> Activity
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                        >
                            <i class="fe fe-power"></i> Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="dropdown d-md-flex header-settings">
                    <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="fe fe-align-right header-icons"></i>
                    </a>
                </div>
                <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button><!-- Navresponsive closed -->
            </div>
        </div>
    </div>
    <!-- End Main Header-->		<!-- Mobile-header -->
    <div class="mobile-main-header">
        <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="dropdown header-search">
                        <a class="nav-link icon header-search">
                            <i class="fe fe-search header-icons"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-form-search p-2">
                                <div class="input-group">
                                    <div class="input-group-btn search-panel">
                                        <select class="form-control select2-no-search">
                                            <option label="All categories">
                                            </option>
                                            <option value="IT Projects">
                                                IT Projects
                                            </option>
                                            <option value="Business Case">
                                                Business Case
                                            </option>
                                            <option value="Microsoft Project">
                                                Microsoft Project
                                            </option>
                                            <option value="Risk Management">
                                                Risk Management
                                            </option>
                                            <option value="Team Building">
                                                Team Building
                                            </option>
                                        </select>
                                    </div>
                                    <input type="search" class="form-control" placeholder="Search for anything...">
                                    <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown ">
                        <a class="nav-link icon full-screen-link">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    <div class="dropdown main-header-notification">
                        <a class="nav-link icon" href="#">
                            <i class="fe fe-bell header-icons"></i>
                            <span class="badge badge-danger nav-link-badge">4</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <p class="main-notification-text">You have 1 unread notification<span class="badge badge-pill badge-primary ml-3">View all</span></p>
                            </div>
                            <div class="main-notification-list">
                                <div class="media new">
                                    <div class="main-img-user online"><img alt="avatar" src="{{url('panel/assets/img/users/5.jpg')}}"></div>
                                    <div class="media-body">
                                        <p>Congratulate <strong>Olivia James</strong> for New template start</p><span>Oct 15 12:32pm</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="main-img-user"><img alt="avatar" src="{{url('panel/assets/img/users/2.jpg')}}"></div>
                                    <div class="media-body">
                                        <p><strong>Joshua Gray</strong> New Message Received</p><span>Oct 13 02:56am</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="main-img-user online"><img alt="avatar" src="{{url('panel/assets/img/users/3.jpg')}}"></div>
                                    <div class="media-body">
                                        <p><strong>Elizabeth Lewis</strong> added new schedule realease</p><span>Oct 12 10:40pm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a href="#">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-header-notification mt-2">
                        <a class="nav-link icon" href="#">
                            <i class="fe fe-message-square header-icons"></i>
                            <span class="badge badge-success nav-link-badge">6</span>
                        </a>
                    </div>
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user" ><img alt="avatar" src="{{url('panel/assets/img/users/1.jpg')}}"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title">{{auth()->user()->name}}</h6>
                                <p class="main-notification-text">Web Designer</p>
                            </div>
                            <a class="dropdown-item border-top" href="#">
                                <i class="fe fe-user"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-edit"></i> Edit Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings"></i> Account Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings"></i> Support
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-compass"></i> Activity
                            </a>
                            <a class="dropdown-item" href="signin.html">
                                <i class="fe fe-power"></i> Sign Out
                            </a>
                        </div>
                    </div>
                    <div class="dropdown  header-settings">
                        <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                            <i class="fe fe-align-right header-icons"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-header closed -->
    <!-- Main Content-->
    @yield('content')
    <!-- End Main Content-->

    <!-- Main Footer-->
    <div class="main-footer text-center">
        <div class="container">
            <div class="row row-sm">
                <div class="col-md-12">
                    <span>Copyright © {{date('Y')}} <a href="#">{{setting('name')}}</a>. Designed and developed by <a href="https://www.ultimatesoft.co/">UltimateSoft Co</a> All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer-->				<!-- Sidebar -->
    <div class="sidebar sidebar-right sidebar-animate">
        <div class="sidebar-icon">
            <a href="#" class="text-right float-right text-dark fs-20" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
        </div>
        <div class="sidebar-body">
            <h5>Todo</h5>
            <div class="d-flex p-3">
                <label class="ckbox"><input checked  type="checkbox"><span>Hangout With friends</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input checked type="checkbox"><span>System Updated</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input type="checkbox"><span>Do something more</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input  type="checkbox"><span>System Updated</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top">
                <label class="ckbox"><input  type="checkbox"><span>Find an Idea</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <div class="d-flex p-3 border-top mb-0">
                <label class="ckbox"><input  type="checkbox"><span>Project review</span></label>
                <span class="ml-auto">
							<i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
							<i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
						</span>
            </div>
            <h5>Overview</h5>
            <div class="p-4">
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Founder &amp; CEO</span> <span>24</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>UX Designer</span> <span>1</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15" class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Recruitment</span> <span>87</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Software Engineer</span> <span>32</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Project Manager</span> <span>32</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
                    </div><!-- progress -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
@jquery
@toastr_js
@toastr_render
<!-- Jquery js-->
<script src="{{url('panel/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{url('panel/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{url('panel/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Select2 js-->
<script src="{{url('panel/assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{url('panel/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

<!-- Sidemenu js -->
<script src="{{url('panel/assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- Sidebar js -->
<script src="{{url('panel/assets/plugins/sidebar/sidebar.js')}}"></script>

<!-- Internal Chart.Bundle js-->
<script src="{{url('panel/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Peity js-->
<script src="{{url('panel/assets/plugins/peity/jquery.peity.min.js')}}"></script>

<!-- Internal Morris js -->
<script src="{{url('panel/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{url('panel/assets/plugins/morris.js/morris.min.js')}}"></script>

<!-- Circle Progress js-->
<script src="{{url('panel/assets/js/circle-progress.min.js')}}"></script>
<script src="{{url('panel/assets/js/chart-circle.js')}}"></script>

<!-- Internal Dashboard js-->
<script src="{{url('panel/assets/js/index.js')}}"></script>

<!-- Sticky js -->
<script src="{{url('panel/assets/js/sticky.js')}}"></script>

<!-- Custom js -->
<script src="{{url('panel/assets/js/custom.js')}}"></script>

<!-- Switcher js -->
<script src="{{url('panel/assets/switcher/js/switcher.js')}}"></script>
<!-- REQUIRED SCRIPTS -->

<!-- DataTables -->
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

    $("textarea").each(function(){
        CKEDITOR.replace( this );
    });
</script>
@foreach ($errors->all() as $error)
    <script>
        toastr.error('{{$error}}')
    </script>
    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endforeach
@yield('js')
</body>

</html>
