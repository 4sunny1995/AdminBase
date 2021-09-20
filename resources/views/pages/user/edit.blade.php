@extends('adminlte::page')

@section('title', "User's; Management")

@section('content_header')
    <h1>Edit User</h1>
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
                    <form action="/admin/users/{{$user['id']}}" class="form-group" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="method" value="PATCH">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="label" class="label">ID</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="id" id="id" readonly class="form-control" value="{{$user['id']}}">
                                        </div>
                                        <div class="col-md-12">
                                            @error('id')
                                                <div class="text text-danger">{{$errors->first('id')}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="label">Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="name" id="name" class="form-control" value="{{$user['name']}}">
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
                                            <input type="text" name="email" id="email" class="form-control" value="{{$user['email']}}">
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
                                            <input type="text" name="username" id="username" class="form-control" value="{{$user['username']}}">
                                        </div>
                                        <div class="col-md-12">
                                            @error('username')
                                                <div class="text text-danger">{{$errors->first('username')}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="row text-center">
                                        <div class="col-md-4 m-auto">
                                            <button class="btn btn-primary w-100" type="submit">Update</button>
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
