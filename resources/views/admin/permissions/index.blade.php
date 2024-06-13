@extends('layouts.app')

{{--@section('content')
    <section class="content-header">
        <h1 class="pull-left">Permissions</h1>
        <h1 class="pull-right">
           @can('permissions.create')<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.permissions.create') }}">Add New</a>@endcan
           @can('permissions.create') <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-right: 5px" href="{{ route('admin.permissions.create_complex') }}">Create Complex</a>@endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.permissions.table')
            </div>
        </div>
        <div class="text-center">
        </div>
    </div>
@endsection--}}

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                </div>
                <div class="col-4">
                    <div class="row">
                        @can('permissions.create')
                            <a class="btn btn-success mr-4" href="{{ route("admin.permissions.create") }}">
                                Add Permission
                            </a>
                        @endcan
                        @can('permissions.create')
                            <a class="btn btn-primary pull-right" href="{{ route("admin.permissions.create_complex") }}">
                                Add Full Permission
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('admin.permissions.table')
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
