
@extends('layouts.panel')
@section('admins')
    active
@endsection
@section('roles')
    active
@endsection
@section('title')
    Roles
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
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create role</button>
                                        <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Create role</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form  method="POST" action="{{route('roles.store')}}"  enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                                                                </div>
                                                                <div class="row col-md-12">
                                                                    @foreach($permissions as $permission)
                                                                        <div class="form-check col-md-6">
                                                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" id="defaultCheck1">
                                                                            <label class="form-check-label" for="defaultCheck1">
                                                                                {{$permission->name}}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
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
                                        <table id="table" class="table table-bordered table-striped text-center mt-3">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>
                                                        {{$role->name}}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-sliders-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$role->id}}" >Edit</button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$role->id}}" >Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="modal-delete{{$role->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete role</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure to delete `{{$role->name}}` ?</h5>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <form action="{{route('roles.destroy',$role->id)}}" method="POST">
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
                                                <div class="modal fade" id="modal-edit{{$role->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit role</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form  method="POST" action="{{route('roles.update',$role->id)}}"  enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="id" value="{{$role->id}}">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Name</label>
                                                                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$role->name}}" required>
                                                                        </div>
                                                                        <div class="row col-md-12">
                                                                            @foreach($permissions as $permission)
                                                                                <div class="form-check col-md-6">
                                                                                    <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" @if($role->permissions){{ $role->permissions->contains($permission) ? 'checked' : '' }}@endif id="defaultCheck1">
                                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                                        {{$permission->name}}
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
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
