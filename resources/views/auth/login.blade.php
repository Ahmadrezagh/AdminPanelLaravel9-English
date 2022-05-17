@extends('layouts.auth')
@section('title')
Login
@endsection
@section('content')

    <!-- Page -->
    <div class="page main-signin-wrapper">

        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                            <div class="mt-5 pt-4 p-2 pos-absolute">
                                <div class="clearfix"></div>
                                <img src="{{url('panel/assets/img/svgs/user.svg')}}" class="ht-100 mb-0" alt="user">
                                <h5 class="mt-4 text-white">Create Your Account</h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <img src="{{url('panel/assets/img/brand/logo.png')}}" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
                                        <div class="clearfix"></div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <h5 class="text-left mb-2">Signin to Your Account</h5>
                                            <p class="mb-4 text-muted tx-13 ml-0 text-left">Signin to create, discover and connect with the global community</p>
                                            <div class="form-group text-left">
                                                <label>Email</label>
                                                <input class="form-control" placeholder="Enter your email" type="text" name="email">
                                            </div>
                                            <div class="form-group text-left">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Enter your password" type="password" name="password">
                                            </div>
                                            <button class="btn ripple btn-main-primary btn-block">Sign In</button>
                                        </form>
                                        <div class="text-left mt-5 ml-0">
{{--                                            <div class="mb-1"><a href="{{ route('password.request') }}">Forgot password?</a></div>--}}
                                            <div>Don't have an account? <a href="{{route('register')}}">Register Here</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Page -->




@endsection
