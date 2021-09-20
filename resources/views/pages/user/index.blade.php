@extends('adminlte::page')

@section('title', "User's; Management")

@section('content_header')
    <h1>User&rsquo;s Management</h1>
@stop

@section('content')
    <section class="content">
       <div class="w-100" id="loading" >
         @include('loading')
       </div>
       <div class="w-100" id="page-content" style="display: none">
            {{-- @include('message') --}}
            @include('tables.users')
       </div>
    </section>
    @include('toast')
    {{--  @include('pages.user.modal')  --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script>
         console.log('Hi!');
         $(document).ready( function () {
            $('#dataTable').DataTable({
                initComplete:function(){
                    console.log('The data table is successfully!')
                }
            });

        } );
    </script>
    <script src="{{asset('js/loading.js')}}"></script>
    <script src="{{asset('js/user.js')}}"></script>
@stop
