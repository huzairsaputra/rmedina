@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header ">
            <div class="row">
                <div class="col-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="col-9">
                    @can('users.create')
                        <a class="btn btn-success fa-pull-right" href="{{ route("admin.users.create") }}">
                            Add User
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('admin.users.table')
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
