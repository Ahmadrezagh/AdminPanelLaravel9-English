
@extends('layouts.panel')
@section('admins')
    active
@endsection
@section('admins_list')
    active
@endsection
@section('title')
    Admins
@endsection
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin list</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body pl-0">
                                <div class="col-12">
                                    <div class="container">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create Admin</button>
                                        <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create admin</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->

                                                        <form action="{{route('admins.store')}}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Name</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email address</label>
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Password</label>
                                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="exampleInputPassword1" placeholder="Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Retype password</label>
                                                                <input type="password" name="re_password" class="form-control @error('re_password') is-invalid @enderror"  id="exampleInputPassword1" placeholder="Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Select Role</label>
                                                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                                    <option value="0"  selected disabled>Select role</option>
                                                                    @foreach($roles as $role)
                                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Create</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <table id="table" class="table table-bordered table-striped text-center mt-3">
                                            <thead>
                                            <tr>
                                                <th>Profile image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Registered</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @if(Auth::user()->isSuperAdmin())
                                                @foreach (\App\Models\User::where('id','=',Auth::user()->id)->get() as $user)
                                                    <tr>
                                                        <td>
                                                            <img class="rounded-circle" src="{{URL::to('/').$user->profile()}}" alt="" width="50" height="50">
                                                        </td>

                                                        <td>
                                                            {{$user->name}}
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            @foreach ($user->role as $r)
                                                                {{$r->name}}
                                                            @endforeach
                                                        </td>
                                                        <td >
                                                            <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{$user->created_at}}">
                                                                {{$user->created_at->diffForHumans()}}
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-sliders-h"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user->id}}" ><i  class="fas fa-user-edit"></i> Edit</button>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <!-- /.modal -->
                                                    <!-- Change Modal -->
                                                    <div class="modal fade" id="modal-edit{{$user->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit admin</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- form start -->
                                                                    <form  method="POST" action="{{route('admins.update',$user->id)}}"  enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Name</label>
                                                                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Email address</label>
                                                                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="{{$user->email}}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">New Password</label>
                                                                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">Retype password</label>
                                                                                <input type="password" name="re_password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlSelect1">Select Role</label>
                                                                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                                                    <option value="0"  selected disabled>Select role</option>
                                                                                    @foreach($roles as $role)
                                                                                        <option value="{{$role->name}}"
                                                                                                @if($user->role)
                                                                                                {{-- {{dd($user->role->pluck('name')->first())}} --}}
                                                                                                @if($role->name == $user->role->pluck('name')->first())
                                                                                                selected
                                                                                            @endif
                                                                                            @endif
                                                                                        >{{$role->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Profile</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.card-body -->

                                                                        <div class="card-footer">
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                @endforeach
                                            @endif
                                            @foreach ($admins as $user)
                                                <tr>
                                                    <td>
                                                        <img class="rounded-circle" src="{{URL::to('/').$user->profile()}}" alt="" width="50" height="50">
                                                    </td>

                                                    <td>
                                                        {{$user->name}}
                                                    </td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        @foreach ($user->role as $r)
                                                            {{$r->name}}
                                                        @endforeach
                                                    </td>
                                                    <td >
                                                        <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{$user->created_at}}">
                                                            {{$user->created_at->diffForHumans()}}
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user->id}}" ><i  class="fas fa-user-edit"></i> Edit</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$user->id}}" ><i style="color:red" class="fas fa-user-minus"></i> Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$user->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete admin</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$user->name}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('admins.destroy',$user->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                                </form>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                                <!-- /.modal -->
                                                <!-- Change Modal -->
                                                <div class="modal fade" id="modal-edit{{$user->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit admin</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form  method="POST" action="{{route('admins.update',$user->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Name</label>
                                                                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name}}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Email address</label>
                                                                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="{{$user->email}}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">New Password</label>
                                                                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Retype password</label>
                                                                            <input type="password" name="re_password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlSelect1">Select Role</label>
                                                                            <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                                                <option value="0"  selected disabled>Select role</option>
                                                                                @foreach($roles as $role)
                                                                                    <option value="{{$role->name}}"
                                                                                            @if($user->role)
                                                                                            {{-- {{dd($user->role->pluck('name')->first())}} --}}
                                                                                            @if($role->name == $user->role->pluck('name')->first())
                                                                                            selected
                                                                                        @endif
                                                                                        @endif
                                                                                    >{{$role->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputFile">Profile</label>
                                                                            <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-body -->

                                                                    <div class="card-footer">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->


                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div><!-- Row end -->


            </div>
        </div>
    </div>
    </div>






@endsection
