@extends('adminlte::page')

@section('title', "User's; Management")

@section('content_header')
    <h1>Create New User</h1>
@stop

@section('content')
    <section class="content">
       <div class="w-100" id="loading" >
         @include('loading')
       </div>
       <div class="w-100" id="page-content" style="display: none">
            <div class="card-body">
                <div class="panel panel-default">
                    @include('message')
                    <form action="/admin/users" class="form-group" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="label">Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="name" id="name" class="form-control" value="">
                                        </div>
                                        <div class="col-md-12">
                                            @error('name')
                                                <div class="text text-danger">{{$errors->first('name')}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="label">Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="email" id="email" class="form-control" value="">
                                        </div>
                                        <div class="col-md-12">
                                            @error('email')
                                                <div class="text text-danger">{{$errors->first('email')}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="label">Username</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="username" id="username" class="form-control" value="">
                                        </div>
                                        <div class="col-md-12">
                                            @error('username')
                                                <div class="text text-danger">{{$errors->first('username')}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="label">Password</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" name="password" id="password" class="form-control" value="">
                                        </div>
                                        <div class="col-md-12">
                                            @error('password')
                                                <div class="text text-danger">{{$errors->first('password')}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 text-center">
                                    <div class="row text-center">
                                        <div class="col-md-4 m-auto">
                                            <button class="btn btn-primary w-100" type="submit">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="line"></div>
                <br>

            </div>
       </div>
    </section>
    {{--  @include('pages.user.modal')  --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('js/loading.js')}}"></script>
    <script src="{{asset('js/user.js')}}"></script>
@stop
