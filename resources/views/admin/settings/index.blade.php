
@extends('layouts.panel')
@section('Setting')
    active
@endsection
@section( $group->name )
    active
@endsection
@section('title')
{{$group->name}}
@endsection
@section('content')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$group->name}}</li>
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

                                        <form role="form" action="{{route('settings.update',$group->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="card-body">
                                                @foreach($group->settings as $setting)
                                                    @if($setting->type == 'string')
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">{{$setting->description}}</label>
                                                            <input type="text" name="{{$setting->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$setting->value}}">
                                                        </div>
                                                    @elseif($setting->type == 'email')
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">{{$setting->description}}</label>
                                                            <input type="email" name="{{$setting->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$setting->value}}">
                                                        </div>
                                                    @elseif($setting->type == 'number')
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">{{$setting->description}}</label>
                                                            <input type="number" name="{{$setting->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$setting->value}}">
                                                        </div>
                                                    @elseif($setting->type == 'textarea')
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">{{$setting->description}}</label>
                                                            <textarea name="{{$setting->id}}">{{$setting->value}}</textarea>
                                                            <script>
                                                                CKEDITOR.replace( '{{$setting->id}}' );
                                                            </script>
                                                        </div>
                                                    @elseif($setting->type == 'file')
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">{{$setting->description}}</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="{{$setting->id}}" class="custom-file-input" id="exampleInputFile">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>


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
