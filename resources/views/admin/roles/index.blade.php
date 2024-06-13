@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="row">
                <div class="col-3">
                    <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="col-9">
                    @can('roles.create')
                        <a class="btn btn-success fa-pull-right" href="{{ route("admin.roles.create") }}">
                            Add Role
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('admin.roles.table')
            </div>
        </div>
    </div>
@endsection
